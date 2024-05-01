<?php

namespace App\Controller;

use App\Entity\Marche;
use App\Entity\Stock;
use App\Form\MarcheType;
use App\Repository\MarcheRepository;
use App\Repository\StockRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/marche')]
class MarcheController extends AbstractController
{
    #[Route('/', name: 'app_marche_index', methods: ['GET'])]
    public function index(MarcheRepository $marcheRepository,StockRepository $stockRepository): Response
    {
        return $this->render('marche/index.html.twig', [
            'stocks' => $stockRepository->findAll(),
            'marches' => $marcheRepository->findAll(),
            'stocksCountByCompany' => $marcheRepository->getStocksCountByEntreprise()
        ]);
    }


    #[Route('/{id}/new', name: 'app_marche_new', methods: ['GET', 'POST'])]
    public function new(Stock $stock, Request $request, EntityManagerInterface $entityManager,MailerInterface $mailer): Response
    {


        $marche = new Marche();
        $marche->setStock($stock);
$quantity= $stock->getQuantite();
        $form = $this->createForm(MarcheType::class, $marche);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $currentlydate = new \DateTime('now');
            $marche->setDateAchat($currentlydate);
            $quantity = $form->get('quantite')->getData();
            $marche->setTotal($quantity*$stock->getPrix());
            $entityManager->persist($marche);
            $entityManager->flush();
            $email = (new Email())
                ->from('azizbelfaidi.aziz@gmail.com')
                ->to('essayehmalek@gmail.com')
                ->subject('Test Email')
                ->html('<p>This is a test email</p>');

            $mailer->send($email);
            return $this->redirectToRoute('app_marche_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('marche/new.html.twig', [
            'marche' => $marche,
            'form' => $form,
            'quantity' =>$quantity,


        ]);
    }

    #[Route('/{id}', name: 'app_marche_show', methods: ['GET'])]
    public function show(Marche $marche): Response
    {
        return $this->render('marche/show.html.twig', [
            'marche' => $marche,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_marche_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Marche $marche, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MarcheType::class, $marche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_marche_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('marche/edit.html.twig', [
            'marche' => $marche,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/d', name: 'app_marche_delete', methods: ['GET'])]
    public function delete(Request $request, Marche $marche, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$marche->getId(), $request->request->get('_token'))) {
            $entityManager->remove($marche);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_marche_index', [], Response::HTTP_SEE_OTHER);
    }

}
