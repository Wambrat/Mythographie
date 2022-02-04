<?php

namespace App\Controller;

use App\Entity\StripBoxe;
use App\Form\StripBoxeType;
use App\Repository\StripBoxeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/strip/boxe")
 */
class StripBoxeController extends AbstractController
{
    /**
     * @Route("/", name="strip_boxe_index", methods={"GET"})
     */
    public function index(StripBoxeRepository $stripBoxeRepository): Response
    {
        return $this->render('strip_boxe/index.html.twig', [
            'strip_boxes' => $stripBoxeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="strip_boxe_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $stripBoxe = new StripBoxe();
        $form = $this->createForm(StripBoxeType::class, $stripBoxe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($stripBoxe);
            $entityManager->flush();

            return $this->redirectToRoute('mythologie', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('strip_boxe/new.html.twig', [
            'strip_boxe' => $stripBoxe,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="strip_boxe_show", methods={"GET"})
     */
    public function show(StripBoxe $stripBoxe): Response
    {
        return $this->render('strip_boxe/show.html.twig', [
            'strip_boxe' => $stripBoxe,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="strip_boxe_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, StripBoxe $stripBoxe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StripBoxeType::class, $stripBoxe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('strip_boxe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('strip_boxe/edit.html.twig', [
            'strip_boxe' => $stripBoxe,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="strip_boxe_delete", methods={"POST"})
     */
    public function delete(Request $request, StripBoxe $stripBoxe, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stripBoxe->getId(), $request->request->get('_token'))) {
            $entityManager->remove($stripBoxe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('strip_boxe_index', [], Response::HTTP_SEE_OTHER);
    }
}
