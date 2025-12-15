<?php

namespace App\EventSubscriber;

use App\Entity\FormulaireInscription;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Bundle\SecurityBundle\Security;
use Twig\Environment;

class TwigGlobalSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private Security $security,
        private Environment $twig
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }

    public function onKernelController(ControllerEvent $event): void
    {
        $user = $this->security->getUser();
        
        $hasValidatedDossier = false;
        
        if ($user) {
            $count = $this->entityManager->createQueryBuilder()
                ->select('COUNT(f.id)')
                ->from(FormulaireInscription::class, 'f')
                ->where('f.remplit_formulaire = :user')
                ->andWhere('f.statut = :statut')
                ->setParameter('user', $user)
                ->setParameter('statut', 'validé')
                ->getQuery()
                ->getSingleScalarResult();
            
            $hasValidatedDossier = $count > 0;
        }
        
        $this->twig->addGlobal('has_validated_dossier', $hasValidatedDossier);
    }
}
