<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Entity\PasswordResetToken;
use App\Repository\UtilisateurRepository;
use App\Repository\PasswordResetTokenRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('inscription/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/register', name: 'app_register', methods: ['POST'])]
    public function register(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager,
        TokenStorageInterface $tokenStorage
    ): Response {
        try {
            // Récupération des données du formulaire
            $email = $request->request->get('email');
            $password = $request->request->get('password');
            $passwordConfirm = $request->request->get('password_confirm');
            $nom = $request->request->get('nom');
            $prenom = $request->request->get('prenom');
            $dateNaissance = $request->request->get('date_naissance');
            $civilite = $request->request->get('civilite');
            $telephone = $request->request->get('telephone');
            $adresse = $request->request->get('adresse');
            $departement = $request->request->get('departement');

            // Log pour debug
            error_log("Tentative d'inscription - Email: $email, Nom: $nom, Prénom: $prenom");

            // Validation basique
            if (empty($email) || empty($password) || empty($nom) || empty($prenom) || empty($telephone) || empty($adresse) || empty($departement)) {
                $this->addFlash('error', 'Tous les champs obligatoires doivent être remplis.');
                return $this->redirectToRoute('app_inscription');
            }

            if ($password !== $passwordConfirm) {
                $this->addFlash('error', 'Les mots de passe ne correspondent pas.');
                return $this->redirectToRoute('app_inscription');
            }

            // Vérifier si l'email existe déjà
            $existingUser = $entityManager->getRepository(Utilisateur::class)->findOneBy(['email' => $email]);
            if ($existingUser) {
                $this->addFlash('error', 'Un compte existe déjà avec cette adresse email.');
                return $this->redirectToRoute('app_inscription');
            }

            // Créer le nouvel utilisateur
            $utilisateur = new Utilisateur();
            $utilisateur->setEmail($email);
            $utilisateur->setNom($nom);
            $utilisateur->setPrenom($prenom);
            $utilisateur->setUser($civilite);
            $utilisateur->setTelephone($telephone);
            $utilisateur->setAdresse($adresse);
            $utilisateur->setDepartement($departement);

            // Convertir la date de naissance
            if (!empty($dateNaissance)) {
                $dateNaissanceObj = \DateTime::createFromFormat('Y-m-d', $dateNaissance);
                if ($dateNaissanceObj) {
                    $utilisateur->setDateNaissance($dateNaissanceObj);
                }
            }

            $utilisateur->setDateCreation(new \DateTime());

            // Hash le mot de passe
            $hashedPassword = $passwordHasher->hashPassword($utilisateur, $password);
            $utilisateur->setMotDePasse($hashedPassword);

            // Définir les rôles par défaut
            $utilisateur->setRoles(['ROLE_USER']);

            // Sauvegarder en base de données
            $entityManager->persist($utilisateur);
            $entityManager->flush();

            error_log("Inscription réussie pour: $email");
            $this->addFlash('success', 'Votre compte a été créé avec succès. Vous êtes maintenant connecté.');
            
            // Connecter automatiquement l'utilisateur
            $token = new UsernamePasswordToken($utilisateur, 'main', $utilisateur->getRoles());
            $tokenStorage->setToken($token);
            $request->getSession()->set('_security_main', serialize($token));
            
            return $this->redirectToRoute('app_home');
        } catch (\Exception $e) {
            error_log("Erreur lors de l'inscription: " . $e->getMessage());
            $this->addFlash('error', 'Une erreur est survenue lors de la création de votre compte : ' . $e->getMessage());
            return $this->redirectToRoute('app_inscription');
        }
    }

    #[Route('/login', name: 'app_login', methods: ['POST'])]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // Ce contrôleur ne sera pas vraiment appelé car Symfony intercepte la requête
        // Mais il est nécessaire pour la route
        return $this->redirectToRoute('app_inscription');
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        // Ce contrôleur peut rester vide - il sera intercepté par la clé logout de votre firewall
    }

    #[Route('/forgot-password', name: 'app_forgot_password')]
    public function forgotPassword(): Response
    {
        return $this->render('inscription/forgot_password.html.twig');
    }

    #[Route('/forgot-password/request', name: 'app_forgot_password_request', methods: ['POST'])]
    public function forgotPasswordRequest(
        Request $request,
        EntityManagerInterface $entityManager,
        MailerInterface $mailer
    ): Response {
        $email = $request->request->get('email');

        if (empty($email)) {
            $this->addFlash('error', 'Veuillez saisir votre adresse email.');
            return $this->redirectToRoute('app_forgot_password');
        }

        $utilisateur = $entityManager->getRepository(Utilisateur::class)->findOneBy(['email' => $email]);

        // Ne pas révéler si l'email existe ou non pour des raisons de sécurité
        if ($utilisateur) {
            // Supprimer les anciens tokens non utilisés pour cet utilisateur
            $oldTokens = $entityManager->getRepository(PasswordResetToken::class)
                ->createQueryBuilder('p')
                ->andWhere('p.utilisateur = :user')
                ->andWhere('p.used = false')
                ->setParameter('user', $utilisateur)
                ->getQuery()
                ->getResult();

            foreach ($oldTokens as $oldToken) {
                $entityManager->remove($oldToken);
            }

            // Créer un nouveau token
            $token = bin2hex(random_bytes(32));
            $resetToken = new PasswordResetToken();
            $resetToken->setUtilisateur($utilisateur);
            $resetToken->setToken($token);
            $resetToken->setExpiresAt(new \DateTime('+1 hour'));

            $entityManager->persist($resetToken);
            $entityManager->flush();

            // Envoyer l'email
            try {
                $resetUrl = $this->generateUrl('app_reset_password', ['token' => $token], \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL);
                
                $email = (new \Symfony\Component\Mime\Email())
                    ->from('noreply@easybts.fr')
                    ->to($utilisateur->getEmail())
                    ->subject('Réinitialisation de votre mot de passe')
                    ->html($this->renderView('emails/reset_password.html.twig', [
                        'resetUrl' => $resetUrl,
                        'utilisateur' => $utilisateur,
                    ]));

                $mailer->send($email);
            } catch (\Exception $e) {
                error_log("Erreur envoi email: " . $e->getMessage());
            }
        }

        $this->addFlash('success', 'Si votre adresse email est enregistrée, vous recevrez un lien de réinitialisation dans quelques instants.');
        return $this->redirectToRoute('app_inscription');
    }

    #[Route('/reset-password/{token}', name: 'app_reset_password')]
    public function resetPassword(
        string $token,
        PasswordResetTokenRepository $tokenRepository
    ): Response {
        $resetToken = $tokenRepository->findValidToken($token);

        if (!$resetToken) {
            $this->addFlash('error', 'Ce lien de réinitialisation est invalide ou a expiré.');
            return $this->redirectToRoute('app_inscription');
        }

        return $this->render('inscription/reset_password.html.twig', [
            'token' => $token,
        ]);
    }

    #[Route('/reset-password/update', name: 'app_reset_password_update', methods: ['POST'])]
    public function resetPasswordUpdate(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher,
        PasswordResetTokenRepository $tokenRepository
    ): Response {
        $token = $request->request->get('token');
        $password = $request->request->get('password');
        $passwordConfirm = $request->request->get('password_confirm');

        if (empty($token) || empty($password) || empty($passwordConfirm)) {
            $this->addFlash('error', 'Tous les champs sont obligatoires.');
            return $this->redirectToRoute('app_reset_password', ['token' => $token]);
        }

        if ($password !== $passwordConfirm) {
            $this->addFlash('error', 'Les mots de passe ne correspondent pas.');
            return $this->redirectToRoute('app_reset_password', ['token' => $token]);
        }

        $resetToken = $tokenRepository->findValidToken($token);

        if (!$resetToken) {
            $this->addFlash('error', 'Ce lien de réinitialisation est invalide ou a expiré.');
            return $this->redirectToRoute('app_inscription');
        }

        // Mettre à jour le mot de passe
        $utilisateur = $resetToken->getUtilisateur();
        $hashedPassword = $passwordHasher->hashPassword($utilisateur, $password);
        $utilisateur->setMotDePasse($hashedPassword);

        // Marquer le token comme utilisé
        $resetToken->setUsed(true);

        $entityManager->flush();

        $this->addFlash('success', 'Votre mot de passe a été réinitialisé avec succès. Vous pouvez maintenant vous connecter.');
        return $this->redirectToRoute('app_inscription');
    }
}
