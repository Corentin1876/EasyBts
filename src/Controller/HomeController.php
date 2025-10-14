<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Dto\ContactFormData;
use App\Message\ContactMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
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

            $errors = $validator->validate($message); // double sécurité
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
            // Collecte explicite des erreurs pour debug
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
    public function sitemap(): Response
    {
        return $this->render('legal/sitemap.html.twig');
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
}