<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
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
    public function contact(Request $request, ContactRepository $contactRepository, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Sauvegarder le message en base de données
            $contactRepository->save($contact, true);

            // Envoyer l'email de notification
            try {
                $email = (new TemplatedEmail())
                    ->from('noreply@inscription-bts.gouv.fr')
                    ->to('contact@inscription-bts.gouv.fr')
                    ->replyTo($contact->getEmail())
                    ->subject('Nouveau message de contact - ' . $contact->getSujet())
                    ->htmlTemplate('emails/contact.html.twig')
                    ->context([
                        'contact' => $contact,
                    ]);

                $mailer->send($email);

                // Message de confirmation
                $this->addFlash('success', 'Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.');
            } catch (\Exception $e) {
                // En cas d'erreur d'envoi, le message est quand même sauvegardé
                $this->addFlash('warning', 'Votre message a été enregistré mais l\'envoi de l\'email de notification a échoué. Nous traiterons votre demande dès que possible.');
            }

            return $this->redirectToRoute('app_contact');
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
}