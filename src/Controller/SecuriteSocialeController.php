<?php

namespace App\Controller;

use App\Entity\SecuriteSociale;
use App\Form\SecuriteSocialeType;
use App\Repository\SecuriteSocialeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/SecuriteSociale')]
final class SecuriteSocialeController extends AbstractController
{
    #[Route(name: 'app_securite_sociale_index', methods: ['GET'])]
    public function index(SecuriteSocialeRepository $securiteSocialeRepository): Response
    {
        return $this->render('securite_sociale/index.html.twig', [
            'securite_sociales' => $securiteSocialeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_securite_sociale_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $securiteSociale = new SecuriteSociale();
        $form = $this->createForm(SecuriteSocialeType::class, $securiteSociale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($securiteSociale);
            $entityManager->flush();

            return $this->redirectToRoute('app_securite_sociale_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('securite_sociale/new.html.twig', [
            'securite_sociale' => $securiteSociale,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_securite_sociale_show', methods: ['GET'])]
    public function show(SecuriteSociale $securiteSociale): Response
    {
        return $this->render('securite_sociale/show.html.twig', [
            'securite_sociale' => $securiteSociale,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_securite_sociale_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SecuriteSociale $securiteSociale, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SecuriteSocialeType::class, $securiteSociale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_securite_sociale_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('securite_sociale/edit.html.twig', [
            'securite_sociale' => $securiteSociale,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_securite_sociale_delete', methods: ['POST'])]
    public function delete(Request $request, SecuriteSociale $securiteSociale, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$securiteSociale->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($securiteSociale);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_securite_sociale_index', [], Response::HTTP_SEE_OTHER);
    }
}
