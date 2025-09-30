<?php

namespace App\Controller;

use App\Entity\FormulaireInscription;
use App\Form\FormulaireInscriptionType;
use App\Repository\FormulaireInscriptionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/FormulaireInscription')]
final class FormulaireInscriptionController extends AbstractController
{
    #[Route(name: 'app_formulaire_inscription_index', methods: ['GET'])]
    public function index(FormulaireInscriptionRepository $formulaireInscriptionRepository): Response
    {
        return $this->render('formulaire_inscription/index.html.twig', [
            'formulaire_inscriptions' => $formulaireInscriptionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_formulaire_inscription_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $formulaireInscription = new FormulaireInscription();
        $form = $this->createForm(FormulaireInscriptionType::class, $formulaireInscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($formulaireInscription);
            $entityManager->flush();

            return $this->redirectToRoute('app_formulaire_inscription_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('formulaire_inscription/new.html.twig', [
            'formulaire_inscription' => $formulaireInscription,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_formulaire_inscription_show', methods: ['GET'])]
    public function show(FormulaireInscription $formulaireInscription): Response
    {
        return $this->render('formulaire_inscription/show.html.twig', [
            'formulaire_inscription' => $formulaireInscription,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_formulaire_inscription_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FormulaireInscription $formulaireInscription, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FormulaireInscriptionType::class, $formulaireInscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_formulaire_inscription_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('formulaire_inscription/edit.html.twig', [
            'formulaire_inscription' => $formulaireInscription,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_formulaire_inscription_delete', methods: ['POST'])]
    public function delete(Request $request, FormulaireInscription $formulaireInscription, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formulaireInscription->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($formulaireInscription);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_formulaire_inscription_index', [], Response::HTTP_SEE_OTHER);
    }
}
