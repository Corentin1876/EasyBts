<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

#[AsCommand(name: 'app:test-email', description: 'Envoie un email de test pour diagnostiquer la configuration mailer')]
class TestEmailCommand extends Command
{
    public function __construct(private MailerInterface $mailer)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>Envoi email de test...</info>');
        try {
            $email = (new TemplatedEmail())
                ->from('noreply@inscription-bts.gouv.fr')
                ->to('elwnne1302@gmail.com')
                ->subject('TEST MAILER - '.date('Y-m-d H:i:s'))
                ->html('<p>Ceci est un test direct du mailer Symfony.</p>');
            $this->mailer->send($email);
            $output->writeln('<info>Succès: email envoyé (vérifier la boîte de réception / spam).</info>');
        } catch (\Throwable $e) {
            $output->writeln('<error>Echec envoi: '.$e->getMessage().'</error>');
            return Command::FAILURE;
        }
        return Command::SUCCESS;
    }
}