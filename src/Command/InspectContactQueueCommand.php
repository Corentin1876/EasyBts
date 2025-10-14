<?php

namespace App\Command;

use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:contact-queue:inspect', description: 'Affiche les messages ContactMessage en attente dans messenger_messages')]
class InspectContactQueueCommand extends Command
{
    public function __construct(private Connection $connection)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Vérifier existence table
        $sm = $this->connection->createSchemaManager();
        if (!$sm->tablesExist(['messenger_messages'])) {
            $output->writeln('<error>Table messenger_messages inexistante.</error>');
            return Command::FAILURE;
        }

        $sql = "SELECT id, queue_name, created_at, available_at, delivered_at, body FROM messenger_messages ORDER BY created_at DESC LIMIT 20";
        $rows = $this->connection->fetchAllAssociative($sql);
        if (!$rows) {
            $output->writeln('<info>Aucun message en attente.</info>');
            return Command::SUCCESS;
        }
        $output->writeln('<info>Messages récents:</info>');
        foreach ($rows as $r) {
            $class = null;
            // corps JSON sérialisé (Symfony Messenger encode en base64 + enveloppe) => on fait une extraction simple
            if (preg_match('/"type":"([^"]+)"/', $r['body'] ?? '', $m)) {
                $class = $m[1];
            }
            $output->writeln(sprintf('- id=%s queue=%s type=%s created=%s delivered=%s', $r['id'], $r['queue_name'], $class, $r['created_at'], $r['delivered_at'] ?: 'NULL'));
        }
        return Command::SUCCESS;
    }
}