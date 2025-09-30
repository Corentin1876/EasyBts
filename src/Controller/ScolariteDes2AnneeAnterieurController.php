<?php

namespace App\Controller;

use App\Entity\ScolariteDes2AnneeAnterieur;
use App\Form\ScolariteDes2AnneeAnterieurType;
use App\Repository\ScolariteDes2AnneeAnterieurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ScolariteDes2AnneeAnterieur')]
final class ScolariteDes2AnneeAnterieurController extends AbstractController
{
    #[Route(name: 'app_scolarite_des2_annee_anterieur_index', methods: ['GET'])]
    public function index(ScolariteDes2AnneeAnterieurRepository $scolariteDes2AnneeAnterieurRepository): Response
    {
        return $this->render('scolarite_des2_annee_anterieur/index.html.twig', [
            'scolarite_des2_annee_anterieurs' => $scolariteDes2AnneeAnterieurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_scolarite_des2_annee_anterieur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $scolariteDes2AnneeAnterieur = new ScolariteDes2AnneeAnterieur();
        $form = $this->createForm(ScolariteDes2AnneeAnterieurType::class, $scolariteDes2AnneeAnterieur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($scolariteDes2AnneeAnterieur);
            $entityManager->flush();

            return $this->redirectToRoute('app_scolarite_des2_annee_anterieur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('scolarite_des2_annee_anterieur/new.html.twig', [
            'scolarite_des2_annee_anterieur' => $scolariteDes2AnneeAnterieur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_scolarite_des2_annee_anterieur_show', methods: ['GET'])]
    public function show(ScolariteDes2AnneeAnterieur $scolariteDes2AnneeAnterieur): Response
    {
        return $this->render('scolarite_des2_annee_anterieur/show.html.twig', [
            'scolarite_des2_annee_anterieur' => $scolariteDes2AnneeAnterieur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_scolarite_des2_annee_anterieur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ScolariteDes2AnneeAnterieur $scolariteDes2AnneeAnterieur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ScolariteDes2AnneeAnterieurType::class, $scolariteDes2AnneeAnterieur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_scolarite_des2_annee_anterieur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('scolarite_des2_annee_anterieur/edit.html.twig', [
            'scolarite_des2_annee_anterieur' => $scolariteDes2AnneeAnterieur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_scolarite_des2_annee_anterieur_delete', methods: ['POST'])]
    public function delete(Request $request, ScolariteDes2AnneeAnterieur $scolariteDes2AnneeAnterieur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scolariteDes2AnneeAnterieur->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($scolariteDes2AnneeAnterieur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_scolarite_des2_annee_anterieur_index', [], Response::HTTP_SEE_OTHER);
    }
}
