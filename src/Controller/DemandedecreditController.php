<?php

namespace App\Controller;

use App\Entity\Demandedecredit;
use App\Form\DemandedecreditType;
use App\Repository\DemandedecreditRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/demandedecredit')]
class DemandedecreditController extends AbstractController
{
    #[Route('/', name: 'app_demandedecredit_index', methods: ['GET'])]
    public function index(DemandedecreditRepository $demandedecreditRepository): Response
    {
        return $this->render('demandedecredit/index.html.twig', [
            'demandedecredits' => $demandedecreditRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_demandedecredit_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $demandedecredit = new Demandedecredit();
        $form = $this->createForm(DemandedecreditType::class, $demandedecredit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($demandedecredit);
            $entityManager->flush();

            return $this->redirectToRoute('app_demandedecredit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('demandedecredit/new.html.twig', [
            'demandedecredit' => $demandedecredit,
            'form' => $form->createView(), // Pass the form view to the template
        ]);
    }
    #[Route('/{cin}', name: 'app_demandedecredit_show', methods: ['GET'])]
    public function show(Demandedecredit $demandedecredit): Response
    {
        return $this->render('demandedecredit/show.html.twig', [
            'demandedecredit' => $demandedecredit,
        ]);
    }

    #[Route('/{cin}/edit', name: 'app_demandedecredit_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Demandedecredit $demandedecredit, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DemandedecreditType::class, $demandedecredit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_demandedecredit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('demandedecredit/edit.html.twig', [
            'demandedecredit' => $demandedecredit,
            'form' => $form->createView(), // Pass the form view to the template
        ]);
    }


    #[Route('/{cin}', name: 'app_demandedecredit_delete', methods: ['POST'])]
    public function delete(Request $request, Demandedecredit $demandedecredit, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demandedecredit->getCin(), $request->request->get('_token'))) {
            $entityManager->remove($demandedecredit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_demandedecredit_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/n/simulate', name: 'app_demandedecredit_simulate', methods: ['GET'])]
    public function simulate(): Response
    {
        return $this->render('demandedecredit/simulate.html.twig');
    }

}
