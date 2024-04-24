<?php

namespace App\Controller;

use App\Entity\Cheque;
use App\Form\Cheque1Type;
use App\Repository\ChequeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cheque/admin')]
class ChequeAdminController extends AbstractController
{
    #[Route('/', name: 'app_cheque_admin_index', methods: ['GET'])]
    public function index(ChequeRepository $chequeRepository): Response
    {
        return $this->render('cheque_admin/index.html.twig', [
            'cheques' => $chequeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_cheque_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {   $dateActuelle = new \DateTime();
        $cheque = new Cheque();
        $form = $this->createForm(Cheque1Type::class, $cheque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cheque->setDateEmission($dateActuelle);

            $entityManager->persist($cheque);
            $entityManager->flush();

            return $this->redirectToRoute('app_cheque_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cheque_admin/new.html.twig', [
            'cheque' => $cheque,
            'form' => $form,
        ]);
    }

    #[Route('/{numero_de_cheque}', name: 'app_cheque_admin_show', methods: ['GET'])]
    public function show(Cheque $cheque): Response
    {
        return $this->render('cheque_admin/show.html.twig', [
            'cheque' => $cheque,
        ]);
    }

    #[Route('/{numero_de_cheque}/edit', name: 'app_cheque_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cheque $cheque, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Cheque1Type::class, $cheque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_cheque_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cheque_admin/edit.html.twig', [
            'cheque' => $cheque,
            'form' => $form,
        ]);
    }

    #[Route('/{numero_de_cheque}', name: 'app_cheque_admin_delete', methods: ['POST'])]
    public function delete(Request $request, Cheque $cheque, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cheque->getNumero_de_cheque(), $request->request->get('_token'))) {
            $entityManager->remove($cheque);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_cheque_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
