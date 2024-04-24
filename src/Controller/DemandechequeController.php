<?php

namespace App\Controller;

use App\Entity\Demandecheque;
use App\Form\DemandechequeType;
use App\Repository\ChequeRepository;
use App\Repository\DemandechequeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/demandecheque')]
class DemandechequeController extends AbstractController
{
    #[Route('/', name: 'app_demandecheque_index', methods: ['GET'])]
    public function index(DemandechequeRepository $demandechequeRepository): Response
    {
        return $this->render('demandecheque/index.html.twig', [
            'demandecheques' => $demandechequeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_demandecheque_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {   $dateActuelle = new \DateTime();




        $demandecheque = new Demandecheque();
        $form = $this->createForm(DemandechequeType::class, $demandecheque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dateFormatee = $dateActuelle->format('Y-m-d'); // ou le format que vous préférez

            $demandecheque->setStatutDemande('en attente');
            $demandecheque->setDateDemande($dateFormatee);
            $entityManager->persist($demandecheque);
            $entityManager->flush();

            return $this->redirectToRoute('app_demandecheque_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demandecheque/new.html.twig', [
            'demandecheque' => $demandecheque,
            'form' => $form,
        ]);
    }

    #[Route('/{numerocompte}', name: 'app_demandecheque_show', methods: ['GET'])]
    public function show(Demandecheque $demandecheque,ChequeRepository $chequeRepository): Response
    {

        return $this->render('demandecheque/show.html.twig', [
            'demandecheque' => $demandecheque
        ]);
    }

    #[Route('/{numerocompte}/edit', name: 'app_demandecheque_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Demandecheque $demandecheque, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DemandechequeType::class, $demandecheque,[
            // Ajoutez le champ statut_demande uniquement pour la modification
        'show_statut_demande' => true,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_demandecheque_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demandecheque/edit.html.twig', [
            'demandecheque' => $demandecheque,
            'form' => $form,
        ]);
    }

    #[Route('/{numerocompte}', name: 'app_demandecheque_delete', methods: ['POST'])]
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

        return $this->redirectToRoute('app_demandecheque_index', [], Response::HTTP_SEE_OTHER);
    }
}
