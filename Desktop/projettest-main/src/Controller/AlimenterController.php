<?php

namespace App\Controller;

use App\Form\AlimenterType;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

#[Route('/transaction')]
class AlimenterController extends AbstractController
{
/* ------------------------------------------------------------- STRIPE ------------------------------------------------------------------------- */
    #[Route('/alimenter', name: 'app_alimenter', methods: ['GET', 'POST'])]
    public function alimenter(Request $request): Response
    {
        $form = $this->createForm(AlimenterType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $formData = $form->getData();

            try {
                Stripe::setApiKey($_ENV['STRIPE_SECRET']);
                $paymentIntent = PaymentIntent::create([
                    "amount" => $formData['amount'] * 100, // Convert amount to cents
                    "currency" => "usd",
                    "payment_method" => 'pm_card_visa', // Use a test card for demonstration
                    "confirmation_method" => "automatic",
                    "confirm" => true,
                    "description" => "Compte alimenter",
                    "return_url" => $this->generateUrl('payment_complete', [], UrlGeneratorInterface::ABSOLUTE_URL),
                ]);

                return $this->redirectToRoute('payment_complete', [], Response::HTTP_SEE_OTHER);
            } catch (ApiErrorException $e) {
                $this->addFlash('error', 'Payment Failed. Please try again later.');
            }
        }

        return $this->render('alimenter/index.html.twig', [
            'stripe_key' => $_ENV['STRIPE_KEY'],
            'form' => $form->createView(),
        ]);
    }
/* ------------------------------------------------------------- PAYMENT COMPLETE ------------------------------------------------------------------------- */
    #[Route('/payment-complete', name: 'payment_complete')]
    public function paymentComplete(): Response
    {
        return $this->render('transaction/complete.html.twig');
    }

}