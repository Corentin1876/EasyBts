<?php

namespace App\DataFixtures;

use App\Entity\AnneeScolaire;
use App\Entity\InformationEleve;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class InformationEleveFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 3; $i++) {
            $info = new InformationEleve();
            $info->setNiveauClasse("Terminale S");
            $info->setSexe($i % 2 == 0 ? "F" : "M");
            $info->setNumeroSecuriterSocial(123456789012345 + $i);
            $info->setDateEntree(new \DateTime('2024-09-01'));
            $info->setNationalite("Française");
            $info->setNaissanceDepartement("75");
            $info->setNaissanceCommune("Paris");
            $info->setRedoublement(false);
            $info->setTransport(true);
            $info->setTypeTransport("Métro");
            $info->setNumeroImmatriculationVehicule(123456789);
            $info->setSpecialiter("Mathématiques");
            $info->setLangues("Anglais, Espagnol");
            $info->setDernierDiplome("Baccalauréat S");
            $info->setRegimeChoisi("Externe");
            $info->setDateChoixRegime(new \DateTime('2024-08-01'));
            $info->setAutorisationDroitImage(true);
            $info->setPosibiliteDeChangementFinTrimestre(true);
            $info->setAcceptationSMS(true);
            $info->setAutorisationCommunication(true);
            $info->setEstMajeur(true);

            $manager->persist($info);
            $this->addReference("info_eleve_{$i}", $info);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [UtilisateurFixtures::class];
    }
}
