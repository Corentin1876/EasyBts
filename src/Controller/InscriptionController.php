<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

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
        EntityManagerInterface $entityManager
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

            // Log pour debug
            error_log("Tentative d'inscription - Email: $email, Nom: $nom, Prénom: $prenom");

            // Validation basique
            if (empty($email) || empty($password) || empty($nom) || empty($prenom)) {
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
            $this->addFlash('success', 'Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter.');
            return $this->redirectToRoute('app_inscription');
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
}
