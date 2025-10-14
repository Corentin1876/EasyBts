<?php

namespace App\MessageHandler;

use App\Message\ContactMessage;
use Symfony\Component\Mailer\MailerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Mime\Address;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class ContactMessageHandler
{
    public function __construct(
        private MailerInterface $mailer,
        private LoggerInterface $logger,
        #[Autowire(env: 'CONTACT_RECIPIENT')] private string $to,
        #[Autowire(env: 'CONTACT_RECIPIENT_BCC')] private ?string $bcc = null,
    )
    {
    }

    public function __invoke(ContactMessage $message): void
    {
        try {
            $from = new Address('yousri.bchk@gmail.com', 'Inscription BTS - Formulaire');
            $email = (new TemplatedEmail())
                ->from($from)
                ->to($this->to)
                ->replyTo($message->getEmail())
                ->subject('Nouveau message de contact - ' . $message->getSujet())
                ->htmlTemplate('emails/contact.html.twig')
                ->context([
                    'contact' => $message,
                ]);
            $email->getHeaders()->addTextHeader('X-Entity-Type', 'contact-form');

            if ($this->bcc) {
                $email->bcc($this->bcc);
            }

            $this->mailer->send($email);
            $this->logger->info('Email de contact envoyé', [
                'channel' => 'contact_email',
                'sujet' => $message->getSujet(),
                'from_user' => $message->getEmail(),
                'to' => $this->to,
                'bcc' => $this->bcc,
                'created_at' => $message->getCreatedAt()->format(DATE_ATOM),
            ]);
            // Journal brut pour audit (optionnel)
            $logLine = sprintf("%s\t%s\t%s %s\t%s\n", date(DATE_ATOM), $message->getSujet(), $message->getCivilite(), $message->getNom(), substr($message->getMessage(),0,200));
            @file_put_contents(dirname(__DIR__,2).'/var/log/contact_emails_raw.log', $logLine, FILE_APPEND);
        } catch (\Throwable $e) {
            $this->logger->error('Echec envoi email contact', [
                'exception' => $e->getMessage(),
                'channel' => 'contact_email',
            ]);
            // Option : relancer une exception pour retry Messenger
            throw $e; // permettra retry selon stratégie si configuré
        }
    }
}