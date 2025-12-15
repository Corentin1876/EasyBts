<?php

namespace App\Controller;

use App\Entity\Specialisation;
use App\Form\ContactType;
use App\Dto\ContactFormData;
use App\Message\ContactMessage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\FormulaireInscription;
use App\Entity\Contact;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $specialisations = $entityManager->getRepository(Specialisation::class)->findAll();
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'specialisations' => $specialisations,
        ]);
    }

    #[Route('/specialisation/{id}', name: 'app_specialisation_detail')]
    public function specialisationDetail(Specialisation $specialisation, Request $request): Response
    {
        // Vérifier si on vient de la page d'inscription BTS
        $showInscription = $request->query->get('inscription', false);
        
        return $this->render('home/specialisation_detail.html.twig', [
            'specialisation' => $specialisation,
            'showInscription' => $showInscription,
        ]);
    }

    #[Route('/inscription', name: 'app_inscription')]
    public function inscription(): Response
    {
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

    #[Route('/contact', name: 'app_contact', methods: ['GET', 'POST'])]
    public function contact(Request $request, MessageBusInterface $bus, ValidatorInterface $validator, LoggerInterface $logger): Response
    {
        $formData = new ContactFormData();
        $form = $this->createForm(ContactType::class, $formData);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Normalisation téléphone (retirer espaces)
            if ($formData->telephone) {
                $formData->telephone = preg_replace('/\s+/', '', $formData->telephone);
            }
            $logger->info('Contact form valid submission received', ['civilite' => $formData->civilite, 'email' => $formData->email]);
            $message = new ContactMessage(
                $formData->civilite,
                $formData->nom,
                $formData->prenom,
                $formData->email,
                $formData->telephone,
                $formData->sujet,
                $formData->message,
                $formData->consent ?? false
            );

            $errors = $validator->validate($message);
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    $this->addFlash('error', $error->getPropertyPath() . ': ' . $error->getMessage());
                }
                $logger->warning('Validation errors on ContactMessage', ['count' => count($errors)]);
            } else {
                try {
                    $bus->dispatch($message);
                    $logger->info('ContactMessage dispatched');
                    $this->addFlash('success', 'Votre message a été soumis et sera traité.');
                } catch (\Throwable $e) {
                    $logger->error('Dispatch failed', ['exception' => $e]);
                    $this->addFlash('error', 'Une erreur est survenue lors de l\'envoi du message.');
                }
                return $this->redirectToRoute('app_contact');
            }
        } elseif ($form->isSubmitted()) {
            $allErrors = [];
            foreach ($form->getErrors(true) as $err) {
                $allErrors[] = ($err->getOrigin()?->getName() ?: 'form') . ' : ' . $err->getMessage();
            }
            if (empty($allErrors)) {
                $this->addFlash('error', 'Le formulaire contient des erreurs, veuillez vérifier vos saisies.');
            } else {
                foreach ($allErrors as $e) {
                    $this->addFlash('error', $e);
                }
            }
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/plan-du-site', name: 'app_sitemap')]
    public function sitemap(EntityManagerInterface $entityManager): Response
    {
        $specialisations = $entityManager->getRepository(Specialisation::class)->findAll();
        
        return $this->render('legal/sitemap.html.twig', [
            'specialisations' => $specialisations,
        ]);
    }

    #[Route('/accessibilite', name: 'app_accessibility')]
    public function accessibility(): Response
    {
        return $this->render('legal/accessibility.html.twig');
    }

    #[Route('/mentions-legales', name: 'app_legal')]
    public function legal(): Response
    {
        return $this->render('legal/legal.html.twig');
    }

    #[Route('/donnees-personnelles', name: 'app_privacy')]
    public function privacy(): Response
    {
        return $this->render('legal/privacy.html.twig');
    }

    #[Route('/gestion-des-cookies', name: 'app_cookies')]
    public function cookies(): Response
    {
        return $this->render('legal/cookies.html.twig');
    }

    #[Route('/faq', name: 'app_faq')]
    public function faq(): Response
    {
        return $this->render('faq/index.html.twig');
    }

    #[Route('/mon-compte', name: 'app_mon_compte')]
    public function monCompte(EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        $user = $this->getUser();
        
        // Utiliser le nom correct de la propriété
        $dossiers = $entityManager->getRepository(FormulaireInscription::class)
            ->findBy(['remplit_formulaire' => $user], ['date_soumission' => 'DESC']);
        
        $messages = $entityManager->getRepository(Contact::class)
            ->findBy(['utilisateur' => $user], ['id' => 'DESC']);
        
        return $this->render('utilisateur/mon_compte.html.twig', [
            'dossiers' => $dossiers,
            'messages' => $messages,
        ]);
    }

    #[Route('/mes-dossiers', name: 'app_mes_dossiers')]
    public function mesDossiers(EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        $user = $this->getUser();
        
        // Récupérer tous les dossiers de l'utilisateur
        $dossiers = $entityManager->getRepository(FormulaireInscription::class)
            ->findBy(['remplit_formulaire' => $user], ['date_soumission' => 'DESC']);
        
        return $this->render('bts/mes_dossiers.html.twig', [
            'dossiers' => $dossiers,
        ]);
    }

    #[Route('/guide-inscription', name: 'app_guide')]
    public function guide(): Response
    {
        return $this->render('ressources/guide.html.twig');
    }

    #[Route('/calendrier-inscriptions', name: 'app_calendrier')]
    public function calendrier(): Response
    {
        return $this->render('ressources/calendrier.html.twig');
    }

    #[Route('/aide-technique', name: 'app_aide_technique')]
    public function aideTechnique(): Response
    {
        return $this->render('ressources/aide_technique.html.twig');
    }

    #[Route('/etablissements', name: 'app_etablissements')]
    public function etablissements(): Response
    {
        return $this->render('etablissements/liste.html.twig');
    }

    #[Route('/formations', name: 'app_formations')]
    public function formations(EntityManagerInterface $entityManager): Response
    {
        $specialisations = $entityManager->getRepository(Specialisation::class)->findAll();
        
        return $this->render('etablissements/formations.html.twig', [
            'specialisations' => $specialisations,
        ]);
    }

    #[Route('/carte-etablissements', name: 'app_carte')]
    public function carteEtablissements(): Response
    {
        return $this->render('etablissements/carte.html.twig');
    }

    #[Route('/taux-reussite', name: 'app_taux_reussite')]
    public function tauxReussite(): Response
    {
        return $this->render('etablissements/taux_reussite.html.twig');
    }
}

