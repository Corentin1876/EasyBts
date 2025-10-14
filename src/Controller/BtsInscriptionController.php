<?php

namespace App\Controller;

use App\Entity\Specialisation;
use App\Entity\FormulaireInscription;
use App\Entity\InformationEleve;
use App\Entity\Responsable;
use App\Entity\ScolariteDes2AnneeAnterieur;
use App\Repository\SpecialisationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class BtsInscriptionController extends AbstractController
{
    #[Route('/bts', name: 'app_bts_liste')]
    #[IsGranted('ROLE_USER')]
    public function liste(
        SpecialisationRepository $specialisationRepository,
        Request $request
    ): Response {
        $session = $request->getSession();
        $btsEnCours = null;
        $btsEnCoursId = null;

        // Chercher s'il y a un BTS en cours d'inscription dans la session
        $allSpecialisations = $specialisationRepository->findAll();
        foreach ($allSpecialisations as $spec) {
            $sessionKey = 'bts_inscription_' . $spec->getId();
            if ($session->has($sessionKey)) {
                $btsEnCours = $spec;
                $btsEnCoursId = $spec->getId();
                break;
            }
        }

        // Si un BTS est en cours, afficher uniquement celui-là
        if ($btsEnCours) {
            $specialisations = [$btsEnCours];
        } else {
            // Sinon, afficher tous les BTS disponibles
            $specialisations = $allSpecialisations;
        }

        return $this->render('bts/liste.html.twig', [
            'specialisations' => $specialisations,
            'btsEnCours' => $btsEnCours,
        ]);
    }

    #[Route('/bts/inscription/{id}/reset', name: 'app_bts_inscription_reset')]
    #[IsGranted('ROLE_USER')]
    public function reset(
        Specialisation $specialisation,
        Request $request
    ): Response {
        $session = $request->getSession();
        $sessionKey = 'bts_inscription_' . $specialisation->getId();
        if ($session->has($sessionKey)) {
            $session->remove($sessionKey);
            $this->addFlash('success', 'Le dossier d\'inscription pour « ' . $specialisation->getNom() . ' » a été supprimé. Vous pouvez choisir une autre spécialisation.');
        } else {
            $this->addFlash('info', 'Aucun dossier en cours pour cette spécialisation.');
        }
        return $this->redirectToRoute('app_bts_liste');
    }

    #[Route('/bts/inscription/{id}', name: 'app_bts_inscription')]
    #[IsGranted('ROLE_USER')]
    public function inscription(
        Specialisation $specialisation,
        Request $request
    ): Response {
        // Charger la progression depuis la session
        $session = $request->getSession();
        $savedData = $session->get('bts_inscription_' . $specialisation->getId(), '{}');

        return $this->render('bts/formulaire_inscription.html.twig', [
            'specialisation' => $specialisation,
            'savedData' => is_string($savedData) ? $savedData : json_encode($savedData),
        ]);
    }

    #[Route('/bts/inscription/{id}/save', name: 'app_bts_inscription_save', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function saveProgress(
        Request $request,
        Specialisation $specialisation
    ): Response {
        $data = json_decode($request->getContent(), true);

        // Sauvegarder dans la session
        $session = $request->getSession();
        $session->set('bts_inscription_' . $specialisation->getId(), $data);

        return $this->json(['success' => true]);
    }

    #[Route('/bts/inscription/{id}/submit', name: 'app_bts_inscription_submit', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function submit(
        Request $request,
        Specialisation $specialisation,
        EntityManagerInterface $entityManager
    ): Response {
        $user = $this->getUser();

        try {
            // Créer le formulaire d'inscription
            $formulaire = new FormulaireInscription();
            $formulaire->setRemplitFormulaire($user);
            $formulaire->setTypeFormulaire('BTS - ' . $specialisation->getNom());
            $formulaire->setDateSoumission(new \DateTime());
            $formulaire->setStatut('en_attente');
            $formulaire->setEstSigne((bool) $request->request->get('signature_resp'));

            // Créer les informations de l'élève
            $infoEleve = new InformationEleve();
            $infoEleve->setNiveauClasse($request->request->get('niveau_classe'));
            $infoEleve->setSexe($request->request->get('sexe'));

            // Sécurité sociale (peut être vide)
            $numSecu = $request->request->get('numero_secu');
            $infoEleve->setNumeroSecuriterSocial($numSecu ? (int)$numSecu : 0);

            $dateEntree = \DateTime::createFromFormat('Y-m-d', $request->request->get('date_entree'));
            $infoEleve->setDateEntree($dateEntree ?: new \DateTime());

            $infoEleve->setNationalite($request->request->get('nationalite'));
            $infoEleve->setNaissanceDepartement($request->request->get('dep_naissance'));
            $infoEleve->setNaissanceCommune($request->request->get('commune_naissance'));
            $infoEleve->setRedoublement((bool)$request->request->get('redoublement'));
            $infoEleve->setTransport((bool)$request->request->get('transport'));
            $infoEleve->setTypeTransport($request->request->get('type_transport') ?? '');

            $immat = $request->request->get('immatriculation');
            $infoEleve->setNumeroImmatriculationVehicule($immat ? (int)$immat : 0);

            $infoEleve->setSpecialiter($specialisation->getNom());
            $infoEleve->setLangues($request->request->get('lv1') . ($request->request->get('lv2') ? ', ' . $request->request->get('lv2') : ''));
            $infoEleve->setDernierDiplome($request->request->get('dernier_diplome'));
            $infoEleve->setRegimeChoisi($request->request->get('regime_scolaire'));
            $infoEleve->setDateChoixRegime(new \DateTime());
            $infoEleve->setAutorisationDroitImage(true);
            $infoEleve->setPosibiliteDeChangementFinTrimestre(false);
            $infoEleve->setAcceptationSMS(true);
            $infoEleve->setAutorisationCommunication(true);

            // Déterminer si majeur (18 ans)
            $dateNaissance = \DateTime::createFromFormat('Y-m-d', $request->request->get('date_naissance'));
            $age = $dateNaissance ? $dateNaissance->diff(new \DateTime())->y : 0;
            $infoEleve->setEstMajeur($age >= 18);

            $entityManager->persist($infoEleve);

            // Créer la scolarité N-1
            $scolariteN1 = new ScolariteDes2AnneeAnterieur();
            // Mapping vers entité: Classe, LangueLV1, LangueLV2, Option_Matiere, Etablisement
            $scolariteN1->setClasse($request->request->get('classe_n1'));
            $scolariteN1->setLangueLV1($request->request->get('lv1_n1'));
            $scolariteN1->setLangueLV2($request->request->get('lv2_n1') ?? '');
            $scolariteN1->setOptionMatiere($request->request->get('option_n1') ?? '');
            $scolariteN1->setEtablisement($request->request->get('etablissement_n1'));
            $scolariteN1->setFormulaireInscription($formulaire);
            $entityManager->persist($scolariteN1);

            // Créer la scolarité N-2
            $scolariteN2 = new ScolariteDes2AnneeAnterieur();
            $scolariteN2->setClasse($request->request->get('classe_n2'));
            $scolariteN2->setLangueLV1($request->request->get('lv1_n2'));
            $scolariteN2->setLangueLV2($request->request->get('lv2_n2') ?? '');
            $scolariteN2->setOptionMatiere($request->request->get('option_n2') ?? '');
            $scolariteN2->setEtablisement($request->request->get('etablissement_n2'));
            $scolariteN2->setFormulaireInscription($formulaire);
            $entityManager->persist($scolariteN2);

            // Créer le responsable 1
            $responsable1 = new Responsable();
            $responsable1->setLienAvecEleve($request->request->get('lien_resp1'));
            $responsable1->setNom($request->request->get('nom_resp1'));
            $responsable1->setPrenom($request->request->get('prenom_resp1'));
            $responsable1->setAdresse($request->request->get('adresse_resp1'));
            $responsable1->setVille($request->request->get('commune_resp1'));
            $responsable1->setCodePostal(''); // Non demandé dans le formulaire
            $responsable1->setTellDomicile($request->request->get('tel_domicile_resp1') ?? '');
            $responsable1->setTellTravail($request->request->get('tel_travail_resp1') ?? '');
            $responsable1->setTellMobile($request->request->get('tel_mobile_resp1'));
            $responsable1->setTellephone($request->request->get('tel_mobile_resp1')); // Champ principal
            $responsable1->setMail($request->request->get('email_resp1'));
            $responsable1->setProfession($request->request->get('profession_resp1'));
            $responsable1->setNomEmployeur(''); // Non demandé
            $responsable1->setAdresseEmployeur(''); // Non demandé
            $responsable1->setAcceptationSMS((bool)$request->request->get('sms_resp1'));
            $responsable1->setAutorisationCommunication((bool)$request->request->get('comm_asso_resp1'));
            $responsable1->setFormulaireInscription($formulaire);
            $entityManager->persist($responsable1);

            // Créer le responsable 2 si existe
            if ($request->request->get('has_resp2') && $request->request->get('nom_resp2')) {
                $responsable2 = new Responsable();
                $responsable2->setLienAvecEleve($request->request->get('lien_resp2') ?? 'Autre');
                $responsable2->setNom($request->request->get('nom_resp2'));
                $responsable2->setPrenom($request->request->get('prenom_resp2'));
                $responsable2->setAdresse($request->request->get('adresse_resp2') ?? '');
                $responsable2->setVille($request->request->get('commune_resp2') ?? '');
                $responsable2->setCodePostal('');
                $responsable2->setTellDomicile($request->request->get('tel_domicile_resp2') ?? '');
                $responsable2->setTellTravail($request->request->get('tel_travail_resp2') ?? '');
                $responsable2->setTellMobile($request->request->get('tel_mobile_resp2') ?? '');
                $responsable2->setTellephone($request->request->get('tel_mobile_resp2') ?? '');
                $responsable2->setMail($request->request->get('email_resp2') ?? '');
                $responsable2->setProfession($request->request->get('profession_resp2') ?? '');
                $responsable2->setNomEmployeur('');
                $responsable2->setAdresseEmployeur('');
                $responsable2->setAcceptationSMS((bool)$request->request->get('sms_resp2'));
                $responsable2->setAutorisationCommunication((bool)$request->request->get('comm_asso_resp2'));
                $responsable2->setFormulaireInscription($formulaire);
                $entityManager->persist($responsable2);
            }

            // Sauvegarder le formulaire
            $entityManager->persist($formulaire);
            $entityManager->flush();

            $this->addFlash('success', 'Votre dossier d\'inscription a été soumis avec succès ! Vous recevrez un email de confirmation.');
            return $this->redirectToRoute('app_home');

        } catch (\Exception $e) {
            $this->addFlash('error', 'Une erreur est survenue lors de la soumission de votre dossier. Veuillez réessayer.');
            return $this->redirectToRoute('app_bts_inscription', ['id' => $specialisation->getId()]);
        }
    }
}
