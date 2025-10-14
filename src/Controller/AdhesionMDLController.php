<?php

namespace App\Controller;

use App\Entity\AdhesionMDL;
use App\Form\AdhesionMDLType;
use App\Repository\AdhesionMDLRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/AdhesionMDL')]
final class AdhesionMDLController extends AbstractController
{
    #[Route(name: 'app_adhesion_m_d_l_index', methods: ['GET'])]
    public function index(AdhesionMDLRepository $adhesionMDLRepository): Response
    {
        return $this->render('adhesion_mdl/index.html.twig', [
            'adhesion_m_d_ls' => $adhesionMDLRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_adhesion_m_d_l_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $adhesionMDL = new AdhesionMDL();
        $form = $this->createForm(AdhesionMDLType::class, $adhesionMDL);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($adhesionMDL);
            $entityManager->flush();

            return $this->redirectToRoute('app_adhesion_m_d_l_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('adhesion_mdl/new.html.twig', [
            'adhesion_m_d_l' => $adhesionMDL,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_adhesion_m_d_l_show', methods: ['GET'])]
    public function show(AdhesionMDL $adhesionMDL): Response
    {
        return $this->render('adhesion_mdl/show.html.twig', [
            'adhesion_m_d_l' => $adhesionMDL,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_adhesion_m_d_l_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AdhesionMDL $adhesionMDL, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AdhesionMDLType::class, $adhesionMDL);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_adhesion_m_d_l_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('adhesion_mdl/edit.html.twig', [
            'adhesion_m_d_l' => $adhesionMDL,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_adhesion_m_d_l_delete', methods: ['POST'])]
    public function delete(Request $request, AdhesionMDL $adhesionMDL, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adhesionMDL->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($adhesionMDL);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_adhesion_m_d_l_index', [], Response::HTTP_SEE_OTHER);
    }
}
