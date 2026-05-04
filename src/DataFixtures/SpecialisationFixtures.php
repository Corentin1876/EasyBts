<?php

namespace App\DataFixtures;

use App\Entity\Specialisation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SpecialisationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $specialisations = [
            [
                'nom' => 'BTS SIO SLAM',
                'description' => 'Solutions Logicielles et Applications Métier - Spécialité SLAM',
                'duree' => '2 ans',
                'niveau' => 'Bac+2',
                'debouches' => 'Développeur, Architecte logiciel, Chef de projet IT',
                'conditions' => 'Baccalauréat scientifique ou STI2D'
            ],
            [
                'nom' => 'BTS SIO SISR',
                'description' => 'Solutions Logicielles et Applications Métier - Spécialité SISR',
                'duree' => '2 ans',
                'niveau' => 'Bac+2',
                'debouches' => 'Administrateur système, Technicien réseau, Support informatique',
                'conditions' => 'Baccalauréat scientifique ou STI2D'
            ],
            [
                'nom' => 'BTS Gestion de la PME',
                'description' => 'Formation en gestion et administration des petites et moyennes entreprises',
                'duree' => '2 ans',
                'niveau' => 'Bac+2',
                'debouches' => 'Gestionnaire administratif, Responsable RH, Assistant de direction',
                'conditions' => 'Baccalauréat ES, L ou STMG'
            ],
            [
                'nom' => 'BTS NRC',
                'description' => 'Négociation et Digitalisation de la Relation Client',
                'duree' => '2 ans',
                'niveau' => 'Bac+2',
                'debouches' => 'Commercial, Responsable commercial, Conseiller client',
                'conditions' => 'Baccalauréat ES, L ou STMG'
            ],
            [
                'nom' => 'BTS Tourisme',
                'description' => 'Formation spécialisée dans le secteur du tourisme et des loisirs',
                'duree' => '2 ans',
                'niveau' => 'Bac+2',
                'debouches' => 'Agent de voyages, Responsable d\'accueil, Animateur touristique',
                'conditions' => 'Baccalauréat général ou professionnel'
            ]
        ];

        foreach ($specialisations as $data) {
            $spec = new Specialisation();
            $spec->setNom($data['nom']);
            $spec->setDescription($data['description']);
            $spec->setDuree($data['duree']);
            $spec->setNiveau($data['niveau']);
            $spec->setDebouches($data['debouches']);
            $spec->setConditionsAdmission($data['conditions']);

            $manager->persist($spec);
            $this->addReference('spec_' . strtolower(str_replace(' ', '_', $data['nom'])), $spec);
        }

        $manager->flush();
    }
}
