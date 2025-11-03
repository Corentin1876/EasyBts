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
        EntityManagerInterface $entityManager,
        SpecialisationRepository $specialisationRepository
    ): Response {
        $user = $this->getUser();
        $brouillon = null;
        $specialisation = null;
        
        // Chercher un brouillon existant pour cet utilisateur
        if ($user) {
            $repo = $entityManager->getRepository(FormulaireInscription::class);
            $brouillon = $repo->findOneBy([
                'remplit_formulaire' => $user,
                'statut' => 'brouillon',
            ]);
            
            // Extraire la spécialisation du type_formulaire
            if ($brouillon && $brouillon->getTypeFormulaire()) {
                $typeFormulaire = $brouillon->getTypeFormulaire();
                // Format: "BTS - Nom de la spécialisation"
                $nomSpecialisation = str_replace('BTS - ', '', $typeFormulaire);
                $specialisation = $specialisationRepository->findOneBy(['nom' => $nomSpecialisation]);
            }
        }

        return $this->render('bts/accueil.html.twig', [
            'brouillon' => $brouillon,
            'specialisation' => $specialisation,
        ]);
    }

    #[Route('/bts/choix', name: 'app_bts_choix')]
    #[IsGranted('ROLE_USER')]
    public function choix(
        SpecialisationRepository $specialisationRepository,
        EntityManagerInterface $entityManager
    ): Response {
        $user = $this->getUser();
        $brouillon = null;
        
        // Vérifier s'il y a déjà un brouillon
        if ($user) {
            $repo = $entityManager->getRepository(FormulaireInscription::class);
            $brouillon = $repo->findOneBy([
                'remplit_formulaire' => $user,
                'statut' => 'brouillon',
            ]);
        }

        $specialisations = $specialisationRepository->findAll();

        return $this->render('bts/choix.html.twig', [
            'specialisations' => $specialisations,
            'brouillon' => $brouillon,
        ]);
    }

    #[Route('/bts/inscription/reset', name: 'app_bts_inscription_reset')]
    #[IsGranted('ROLE_USER')]
    public function reset(
        EntityManagerInterface $entityManager
    ): Response {
        $user = $this->getUser();
        if ($user) {
            $repo = $entityManager->getRepository(FormulaireInscription::class);
            $brouillon = $repo->findOneBy([
                'remplit_formulaire' => $user,
                'statut' => 'brouillon',
            ]);
            
            if ($brouillon) {
                $entityManager->remove($brouillon);
                $entityManager->flush();
                $this->addFlash('success', 'Votre dossier d\'inscription a été supprimé.');
            } else {
                $this->addFlash('info', 'Aucun dossier en cours.');
            }
        }
        return $this->redirectToRoute('app_bts_liste');
    }

    #[Route('/bts/inscription/{id}', name: 'app_bts_inscription')]
    #[IsGranted('ROLE_USER')]
    public function inscription(
        Specialisation $specialisation,
        EntityManagerInterface $entityManager
    ): Response {
        $user = $this->getUser();
        $savedData = '{}';
        
        if ($user instanceof \App\Entity\Utilisateur) {
            $repo = $entityManager->getRepository(FormulaireInscription::class);
            $brouillon = $repo->findOneBy([
                'remplit_formulaire' => $user,
                'type_formulaire' => 'BTS - ' . $specialisation->getNom(),
            ]);
            
            // Préparer les données par défaut depuis l'utilisateur
            $defaultData = [
                'nom' => $user->getNom() ?? '',
                'prenom' => $user->getPrenom() ?? '',
                'email_eleve' => $user->getEmail() ?? '',
                'tel_eleve' => $user->getTelephone() ?? '',
                'date_naissance' => $user->getDateNaissance() ? $user->getDateNaissance()->format('Y-m-d') : '',
                'adresse_resp1' => $user->getAdresse() ?? '',
                'sexe' => $user->getUser() ?? '', // civilité
            ];
            
            if ($brouillon && $brouillon->getStatut() === 'brouillon') {
                // Fusionner les données du brouillon avec les données par défaut
                $brouillonData = $brouillon->getDraftJson() ? json_decode($brouillon->getDraftJson(), true) : [];
                $mergedData = array_merge($defaultData, $brouillonData);
                
                $savedData = json_encode([
                    'currentStep' => $brouillon->getDraftStep(),
                    'formData' => $mergedData
                ]);
            } else {
                // Première fois : utiliser les données de l'utilisateur
                $savedData = json_encode([
                    'currentStep' => 1,
                    'formData' => $defaultData
                ]);
            }
        }

        $response = $this->render('bts/formulaire_inscription.html.twig', [
            'specialisation' => $specialisation,
            'savedData' => $savedData,
        ]);
        
        // Empêcher le cache du navigateur pour que les données soient toujours fraîches
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');
        
        return $response;
    }

    #[Route('/bts/inscription/{id}/save', name: 'app_bts_inscription_save', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function saveProgress(
        Request $request,
        Specialisation $specialisation,
        EntityManagerInterface $entityManager
    ): Response {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['success' => false, 'error' => 'Non authentifié'], 401);
        }
        
        $data = json_decode($request->getContent(), true);
        if (!$data) {
            return $this->json(['success' => false, 'error' => 'Données invalides'], 400);
        }
        
        $type = 'BTS - ' . $specialisation->getNom();
        $repo = $entityManager->getRepository(FormulaireInscription::class);
        
        // Chercher un brouillon existant
        $formulaire = $repo->findOneBy([
            'remplit_formulaire' => $user,
            'type_formulaire' => $type,
        ]);
        
        if (!$formulaire) {
            // Créer un nouveau brouillon
            $formulaire = new FormulaireInscription();
            $formulaire->setRemplitFormulaire($user);
            $formulaire->setTypeFormulaire($type);
            $formulaire->setStatut('brouillon');
            $formulaire->setEstSigne(false);
            $formulaire->setDateSoumission(new \DateTime()); // Requis par l'entité
            $entityManager->persist($formulaire);
        }
        
        // Mise à jour des données de brouillon
        $formulaire->setDraftJson(json_encode($data['formData'] ?? []));
        $formulaire->setDraftStep(isset($data['currentStep']) ? (int)$data['currentStep'] : 1);
        $formulaire->setDraftUpdatedAt(new \DateTime());
        
        // Si le formulaire existe mais n'est pas un brouillon, le repasser en brouillon
        if ($formulaire->getStatut() !== 'brouillon') {
            $formulaire->setStatut('brouillon');
        }
        
        try {
            $entityManager->flush();
            return $this->json([
                'success' => true, 
                'draftId' => $formulaire->getId(),
                'step' => $formulaire->getDraftStep(),
                'message' => 'Sauvegarde réussie en base de données'
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false, 
                'error' => 'Erreur: ' . $e->getMessage()
            ], 500);
        }
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
