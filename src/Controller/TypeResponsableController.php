<?php

namespace App\Controller;

use App\Entity\TypeResponsable;
use App\Form\TypeResponsableType;
use App\Repository\TypeResponsableRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/TypeResponsable')]
final class TypeResponsableController extends AbstractController
{
    #[Route(name: 'app_type_responsable_index', methods: ['GET'])]
    public function index(TypeResponsableRepository $typeResponsableRepository): Response
    {
        return $this->render('type_responsable/index.html.twig', [
            'type_responsables' => $typeResponsableRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_type_responsable_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $typeResponsable = new TypeResponsable();
        $form = $this->createForm(TypeResponsableType::class, $typeResponsable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($typeResponsable);
            $entityManager->flush();

            return $this->redirectToRoute('app_type_responsable_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_responsable/new.html.twig', [
            'type_responsable' => $typeResponsable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_responsable_show', methods: ['GET'])]
    public function show(TypeResponsable $typeResponsable): Response
    {
        return $this->render('type_responsable/show.html.twig', [
            'type_responsable' => $typeResponsable,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_responsable_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeResponsable $typeResponsable, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TypeResponsableType::class, $typeResponsable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_type_responsable_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_responsable/edit.html.twig', [
            'type_responsable' => $typeResponsable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_responsable_delete', methods: ['POST'])]
    public function delete(Request $request, TypeResponsable $typeResponsable, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeResponsable->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($typeResponsable);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_type_responsable_index', [], Response::HTTP_SEE_OTHER);
    }
}
