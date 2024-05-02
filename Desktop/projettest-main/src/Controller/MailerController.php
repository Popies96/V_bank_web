<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use DateTime;
use DateTimeInterface;

class MailerController extends AbstractController
{
    #[Route('/mailer', name: 'app_mailer')]
    public function sendEmail(MailerInterface $mailer)
    {
        $now = new DateTime();
        $formattedDateTime = $now->format('Y-m-d H:i');

        $email = (new Email())

        ->from('mailtrap@example.com')
        ->to('mahmoud.chouchane@gmail.com')
            ->html('<p style="color:#193B68;"><b>Dear ' . $idCompte . ',</b></p>' .
                '<p>Thank you for your transaction. Here is your receipt:</p>' .
                '<p><b>Transaction Details :</b></p>' .
                '<p>Amount: ' . $montant . 'DT<br>' .
                'Date & Time: ' . $formattedDateTime . '</p>' .
                '<p style="color:#193B68;"><b>Thank you,</b></p><p style="color:#193B68;"><b>V-Bank Team</b></p>' .
                '<img src="https://example.com/path/to/image.jpg" alt="Image Description">');

        $mailer->send($email);

        return new Response(
            'Email was sent'
        );
    }
}
