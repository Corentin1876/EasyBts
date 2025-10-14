<?php

namespace App\Controller;

use App\Entity\InformationEleve;
use App\Form\InformationEleveType;
use App\Repository\InformationEleveRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/InformationEleve')]
final class InformationEleveController extends AbstractController
{
    #[Route(name: 'app_information_eleve_index', methods: ['GET'])]
    public function index(InformationEleveRepository $informationEleveRepository): Response
    {
        return $this->render('information_eleve/index.html.twig', [
            'information_eleves' => $informationEleveRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_information_eleve_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $informationEleve = new InformationEleve();
        $form = $this->createForm(InformationEleveType::class, $informationEleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($informationEleve);
            $entityManager->flush();

            return $this->redirectToRoute('app_information_eleve_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('information_eleve/new.html.twig', [
            'information_eleve' => $informationEleve,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_information_eleve_show', methods: ['GET'])]
    public function show(InformationEleve $informationEleve): Response
    {
        return $this->render('information_eleve/show.html.twig', [
            'information_eleve' => $informationEleve,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_information_eleve_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, InformationEleve $informationEleve, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(InformationEleveType::class, $informationEleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_information_eleve_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('information_eleve/edit.html.twig', [
            'information_eleve' => $informationEleve,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_information_eleve_delete', methods: ['POST'])]
    public function delete(Request $request, InformationEleve $informationEleve, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$informationEleve->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($informationEleve);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_information_eleve_index', [], Response::HTTP_SEE_OTHER);
    }
}
