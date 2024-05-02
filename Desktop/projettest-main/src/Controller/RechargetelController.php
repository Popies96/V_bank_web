<?php

namespace App\Controller;

use App\Entity\Rechargetel;
use App\Form\RechargetelType;
use App\Repository\RechargetelRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/rechargetel')]
class RechargetelController extends AbstractController
{
    #[Route('/', name: 'app_rechargetel_index', methods: ['GET'])]
    public function index(RechargetelRepository $rechargetelRepository): Response
    {
        return $this->render('rechargetel/index.html.twig', [
            'rechargetels' => $rechargetelRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_rechargetel_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $rechargetel = new Rechargetel();
        $form = $this->createForm(RechargetelType::class, $rechargetel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $now = new DateTime();
            $formattedDateTime = $now->format('Y-m-d H:i');
            $rechargetel->setDatetemps($formattedDateTime);

            $entityManager->persist($rechargetel);
            $entityManager->flush();

            return $this->redirectToRoute('app_rechargetel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rechargetel/new.html.twig', [
            'rechargetel' => $rechargetel,
            'form' => $form,
        ]);
    }

    #[Route('/{idRech}', name: 'app_rechargetel_show', methods: ['GET'])]
    public function show(Rechargetel $rechargetel): Response
    {
        return $this->render('rechargetel/show.html.twig', [
            'rechargetel' => $rechargetel,
        ]);
    }

    #[Route('/{idRech}/edit', name: 'app_rechargetel_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Rechargetel $rechargetel, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RechargetelType::class, $rechargetel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_rechargetel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rechargetel/edit.html.twig', [
            'rechargetel' => $rechargetel,
            'form' => $form,
        ]);
    }

    #[Route('/{idRech}', name: 'app_rechargetel_delete', methods: ['POST'])]
    public function delete(Request $request, Rechargetel $rechargetel, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rechargetel->getIdRech(), $request->request->get('_token'))) {
            $entityManager->remove($rechargetel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_rechargetel_index', [], Response::HTTP_SEE_OTHER);
    }
}
