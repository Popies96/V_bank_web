<?php

namespace App\Controller;

use App\Entity\Demandecheque;
use App\Form\Demandecheque1Type;
use App\Repository\ChequeRepository;
use App\Repository\DemandechequeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/demandecheque/admin')]
class DemandechequeAdminController extends AbstractController
{

    #[Route('/Test', name: 'app_demandecheque_admin_test', methods: ['GET'])]
    public function test(): Response
    {
        return $this->render('Adminbase.html.twig');
    }



    #[Route('/', name: 'app_demandecheque_admin_index', methods: ['GET'])]
    public function index(DemandechequeRepository $demandechequeRepository): Response
    {
        return $this->render('demandecheque_admin/index.html.twig', [
            'demandecheques' => $demandechequeRepository->findAll(),
        ]);
    }



    #[Route('/new', name: 'app_demandecheque_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {$dateActuelle = new \DateTime();
        $demandecheque = new Demandecheque();
        $form = $this->createForm(Demandecheque1Type::class, $demandecheque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $dateFormatee = $dateActuelle->format('Y-m-d'); // ou le format que vous préférez

            $demandecheque->setStatutDemande('en attente');
            $demandecheque->setDateDemande($dateFormatee);
            $entityManager->persist($demandecheque);
            $entityManager->flush();

            return $this->redirectToRoute('app_demandecheque_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demandecheque_admin/new.html.twig', [
            'demandecheque' => $demandecheque,
            'form' => $form,
        ]);
    }

    #[Route('/{numerocompte}', name: 'app_demandecheque_admin_show', methods: ['GET'])]
    public function show(Demandecheque $demandecheque,ChequeRepository $chequeRepository): Response
    {
        $cheques=$chequeRepository->findBy(['numerocompte'=>$demandecheque->getNumerocompte()]);
        return $this->render('demandecheque_admin/show.html.twig', [
            'demandecheque' => $demandecheque,'cheques'=>$cheques
        ]);
    }

    #[Route('/{numerocompte}/edit', name: 'app_demandecheque_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Demandecheque $demandecheque, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Demandecheque1Type::class, $demandecheque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_demandecheque_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demandecheque_admin/edit.html.twig', [
            'demandecheque' => $demandecheque,
            'form' => $form,
        ]);
    }

    #[Route('/{numerocompte}', name: 'app_demandecheque_admin_delete', methods: ['POST'])]
    public function delete(Request $request, Demandecheque $demandecheque, EntityManagerInterface $entityManager,ChequeRepository $chequeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demandecheque->getNumerocompte(), $request->request->get('_token'))) {
            $cheques=$chequeRepository->findBy(['numerocompte'=>$demandecheque->getNumerocompte()]);

            foreach ($cheques as $cheque ){
                printf($cheque->getNumero_de_cheque());
                $entityManager->remove($cheque);
                $entityManager->flush();
            }

            $entityManager->remove($demandecheque);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_demandecheque_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
