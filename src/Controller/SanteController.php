<?php

namespace App\Controller;

use App\Entity\Sante;
use App\Form\SanteType;
use App\Repository\SanteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/Sante')]
final class SanteController extends AbstractController
{
    #[Route(name: 'app_sante_index', methods: ['GET'])]
    public function index(SanteRepository $santeRepository): Response
    {
        return $this->render('sante/index.html.twig', [
            'santes' => $santeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_sante_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sante = new Sante();
        $form = $this->createForm(SanteType::class, $sante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($sante);
            $entityManager->flush();

            return $this->redirectToRoute('app_sante_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('sante/new.html.twig', [
            'sante' => $sante,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sante_show', methods: ['GET'])]
    public function show(Sante $sante): Response
    {
        return $this->render('sante/show.html.twig', [
            'sante' => $sante,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sante_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Sante $sante, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SanteType::class, $sante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_sante_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('sante/edit.html.twig', [
            'sante' => $sante,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sante_delete', methods: ['POST'])]
    public function delete(Request $request, Sante $sante, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sante->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($sante);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_sante_index', [], Response::HTTP_SEE_OTHER);
    }
}
