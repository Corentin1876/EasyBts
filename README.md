# 🎓 EasyBTS - Plateforme d'inscription BTS en ligne

Application web permettant aux étudiants de s'inscrire en BTS via un formulaire en ligne et aux administrateurs de gérer et valider les dossiers.

## ✨ Fonctionnalités

### Gestion des inscriptions
- Formulaire d'inscription en 6 étapes avec sauvegarde automatique
- Interface administrateur pour validation des dossiers
- Génération automatique de PDF pour les dossiers validés
- Upload de documents justificatifs
- Système d'authentification sécurisé
- Espace personnel "Mon compte" pour suivre ses dossiers et messages

### Pages d'information et ressources
- Guide d'inscription étape par étape
- Calendrier des inscriptions et dates importantes
- FAQ (Foire Aux Questions)
- Aide technique et support
- Catalogue des formations BTS disponibles
- Liste des établissements partenaires

### Conformité légale et RGPD
- Design System de l'État (DSFR) - Interface officielle République Française
- Déclaration d'accessibilité conforme RGAA
- Mentions légales complètes
- Politique de confidentialité et gestion des données personnelles
- Gestion des cookies
- Plan du site

## 📋 Prérequis - Ce dont vous avez besoin

Avant de commencer, installez ces logiciels sur votre ordinateur :

### 1️⃣ PHP (version 8.2 ou supérieure)

**Windows :**
- Téléchargez PHP depuis [windows.php.net/download](https://windows.php.net/download/)
- Choisissez "VS16 x64 Thread Safe" (dernière version 8.2 ou 8.3)
- Décompressez dans `C:\php`
- Ajoutez `C:\php` à votre PATH Windows

**Vérification :** Ouvrez un terminal et tapez :
```bash
php -v
```
Vous devez voir : `PHP 8.2.x` ou supérieur

### 2️⃣ Composer (gestionnaire de dépendances PHP)

- Téléchargez depuis [getcomposer.org](https://getcomposer.org/download/)
- Installez l'exécutable Windows (Composer-Setup.exe)

**Vérification :**
```bash
composer -V
```

### 3️⃣ MySQL (base de données)

**Option facile - XAMPP (recommandé pour débutants) :**
- Téléchargez [XAMPP](https://www.apachefriends.org/fr/download.html)
- Installez uniquement MySQL
- Démarrez MySQL depuis le panneau XAMPP

**Ou MySQL seul :**
- Téléchargez [MySQL Community Server](https://dev.mysql.com/downloads/mysql/)
- Lors de l'installation, notez le mot de passe root

**Vérification :** Ouvrez XAMPP et vérifiez que MySQL est démarré (vert)

### 4️⃣ Git

- Téléchargez depuis [git-scm.com](https://git-scm.com/downloads)
- Installez avec les options par défaut

**Vérification :**
```bash
git --version
```

### 5️⃣ LibreOffice (pour les PDF)

- Téléchargez depuis [libreoffice.org](https://fr.libreoffice.org/download/telecharger-libreoffice/)
- Installez dans le dossier par défaut

## 🚀 Installation - Étape par étape

### Étape 1 : Télécharger le projet

Ouvrez un terminal (PowerShell ou CMD) et tapez :

```bash
cd C:\
git clone https://github.com/Corentin1876/EasyBts.git
cd EasyBts
```

### Étape 2 : Installer les dépendances

Dans le dossier du projet, tapez :

```bash
composer install
```

⏱️ Cela prend 2-3 minutes. Attendez que ça finisse.

### Étape 3 : Configurer la base de données

Créez un fichier `.env.local` dans le dossier du projet :

**Windows (PowerShell) :**
```bash
notepad .env.local
```

Copiez-collez ce texte dans le fichier :

```env
# Si vous utilisez XAMPP (sans mot de passe)
DATABASE_URL="mysql://root:@127.0.0.1:3306/easybts?serverVersion=8.0&charset=utf8mb4"

# Si vous avez mis un mot de passe MySQL, remplacez par :
# DATABASE_URL="mysql://root:VOTRE_MOT_DE_PASSE@127.0.0.1:3306/easybts?serverVersion=8.0&charset=utf8mb4"

APP_ENV=dev
APP_SECRET=change_this_secret_key_123456789
MAILER_DSN=null://null
```

**💾 Enregistrez** et fermez le fichier.

### Étape 4 : Créer la base de données

Tapez ces commandes une par une :

```bash
php bin/console doctrine:database:create
```
✅ Vous devez voir : "Created database `easybts`"

```bash
php bin/console doctrine:migrations:migrate
```
✅ Tapez `yes` quand on vous demande, puis appuyez sur Entrée

### Étape 5 : Charger les données de test

```bash
php bin/console doctrine:fixtures:load
```
✅ Tapez `yes` pour confirmer

### Étape 6 : Lancer le site

```bash
php -S localhost:8000 -t public/
```

✅ **C'est prêt !** Ouvrez votre navigateur et allez sur : **http://localhost:8000**

> 💡 Pour arrêter le serveur, appuyez sur `Ctrl + C` dans le terminal

## 👥 Jeu de données

Après avoir chargé les fixtures, vous pouvez vous connecter avec les comptes suivants :

### Compte Administrateur

```
Email : admin@easybts.fr
Mot de passe : Admin123!
Rôle : ROLE_ADMIN
```

**Permissions** :
- Accès au tableau de bord administrateur
- Gestion des dossiers d'inscription
- Validation/Rejet des dossiers
- Gestion des spécialisations BTS

### Compte Utilisateur (Étudiant)

```
Email : etudiant@example.fr
Mot de passe : Password123!
Rôle : ROLE_USER
```

**Permissions** :
- Création de dossier d'inscription
- Sauvegarde de brouillon
- Soumission de dossier
- Téléchargement du dossier validé en PDF

## 📁 Structure du projet

```
EasyBts/
├── assets/              # Fichiers JavaScript et CSS
│   ├── controllers/     # Stimulus controllers
│   └── styles/          # Feuilles de style
├── bin/                 # Scripts exécutables
├── config/              # Configuration Symfony
│   ├── packages/        # Configuration des bundles
│   └── routes/          # Définition des routes
├── migrations/          # Migrations de base de données
├── public/              # Point d'entrée public
│   ├── fonts/           # Polices (Marianne, Spectral)
│   ├── images/          # Images et assets
│   └── js/              # Scripts JavaScript
├── src/
│   ├── Controller/      # Contrôleurs
│   ├── Entity/          # Entités Doctrine
│   ├── Form/            # Types de formulaires
│   └── Repository/      # Repositories Doctrine
├── templates/           # Templates Twig
├── translations/        # Fichiers de traduction
└── var/                 # Cache et logs
```

## 🎯 Utilisation

### Pour un étudiant

1. **Créer un compte** : S'inscrire sur la plateforme
2. **Choisir une spécialisation BTS** : Sélectionner le BTS souhaité (SISR, SLAM, etc.)
3. **Remplir le formulaire** : Compléter les 6 étapes du formulaire
   - Identité de l'étudiant
   - Scolarité année en cours
   - Scolarité 2 années antérieures
   - Responsables légaux
   - Documents justificatifs
   - Validation
4. **Soumettre le dossier** : Envoyer pour validation
5. **Suivre son dossier** : Consulter l'état dans "Mon compte"
6. **Télécharger le PDF** : Une fois validé, télécharger le dossier complet

**Ressources disponibles :**
- 📖 Consulter le [Guide d'inscription](/guide-inscription)
- 📅 Voir le [Calendrier des inscriptions](/calendrier-inscriptions)
- ❓ Consulter la [FAQ](/faq)
- 🔧 Besoin d'aide ? [Support technique](/aide-technique)
- 📧 [Contacter l'administration](/contact)

### Pour un administrateur

1. **Se connecter** avec les identifiants admin
2. **Accéder au tableau de bord** : `/bts/admin` ou `/admin/dashboard`
3. **Consulter les dossiers** : Voir tous les dossiers soumis avec filtres par statut
4. **Valider/Rejeter** : Gérer le statut des dossiers (en_attente → validé/refusé)
5. **Gérer les spécialisations** : Ajouter/modifier les BTS disponibles (CRUD complet)
6. **Gérer les utilisateurs** : Voir et modifier les comptes étudiants

**Pages d'administration :**
- 📊 Dashboard : Vue d'ensemble des inscriptions
- 📄 Gestion des dossiers : Validation et suivi
- 🎓 Gestion des spécialisations : CRUD des formations BTS
- 📅 Gestion des années scolaires : Configuration des périodes
- 👥 Gestion des utilisateurs : Administration des comptes

## 🔧 Configuration LibreOffice (pour PDF)

Pour la génération de PDF, LibreOffice doit être installé :

**Windows** :
```
Installer LibreOffice depuis : https://www.libreoffice.org/download/download/
```

**Linux** :
```bash
sudo apt-get install libreoffice
```

**macOS** :
```bash
brew install --cask libreoffice
```

Le chemin LibreOffice est configuré dans `src/Controller/BtsInscriptionController.php` :
- Windows : `C:\Program Files\LibreOffice\program\soffice.exe`
- Linux : `/usr/bin/soffice`

## 🗄️ Schéma de base de données

Les principales entités :

- **Utilisateur** : Gestion des comptes (étudiants et admins)
- **FormulaireInscription** : Dossiers d'inscription BTS
- **Specialisation** : Types de BTS disponibles (SISR, SLAM, etc.)
- **InformationEleve** : Données personnelles des élèves
- **Responsable** : Responsables légaux (jusqu'à 2 par dossier)
- **ScolariteDes2AnneeAnterieur** : Historique scolaire
- **Sante** : Informations médicales et vaccins
- **Medecin** : Médecins traitants
- **Contact** : Messages de contact liés aux utilisateurs (nouveau)
- **SecuriteSociale** : Informations sécurité sociale
- **AssuranceScolaire** : Assurances des élèves
- **AdhesionMDL** : Adhésion Maison Des Lycéens
- **AnneeScolaire** : Périodes académiques
- **TypeResponsable** : Types de responsabilité légale
- **PasswordResetToken** : Tokens de réinitialisation

**Total : 15 entités avec relations OneToMany, ManyToOne**

## 🎨 Design et accessibilité

Le projet utilise le **Design System de l'État (DSFR)** :

- ✅ Interface conforme aux standards de la République Française
- ✅ Accessibilité RGAA (Référentiel Général d'Amélioration de l'Accessibilité)
- ✅ CDN jsDelivr pour CSS/JS (https://cdn.jsdelivr.net/npm/@gouvfr/dsfr)
- ✅ Icônes Marianne officielles
- ✅ Responsive mobile-first (Bootstrap 5 + DSFR)
- ✅ Navigation au clavier optimisée
- ✅ Couleurs et contrastes conformes

**Pages légales obligatoires :**
- Déclaration d'accessibilité : `/accessibilite`
- Mentions légales : `/mentions-legales`
- Politique de confidentialité : `/donnees-personnelles`
- Gestion des cookies : `/gestion-des-cookies`
- Plan du site : `/plan-du-site`

## 🔗 Routes principales

| Route | URL | Description |
|-------|-----|-------------|
| Accueil | `/` | Page d'accueil |
| Inscription | `/inscription` | Créer un compte |
| Connexion | `/login` | Se connecter |
| Formulaire BTS | `/bts/inscription/formulaire` | Formulaire 6 étapes |
| Mon compte | `/mon-compte` | Espace personnel utilisateur |
| Contact | `/contact` | Formulaire de contact |
| FAQ | `/faq` | Questions fréquentes |
| Guide | `/guide-inscription` | Guide d'inscription |
| Calendrier | `/calendrier-inscriptions` | Dates importantes |
| Formations | `/formations` | Catalogue des BTS |
| Aide technique | `/aide-technique` | Support technique |
| Admin Dashboard | `/admin/dashboard` | Tableau de bord admin |
| Plan du site | `/plan-du-site` | Navigation complète |

## 🧪 Tests

Pour lancer les tests :

```bash
php bin/phpunit
```

## 📝 Commandes utiles

```bash
# Vider le cache
php bin/console cache:clear

# Voir les routes disponibles
php bin/console debug:router

# Voir une route spécifique
php bin/console debug:router app_home

# Créer une migration après modification d'entité
php bin/console make:migration

# Appliquer les migrations
php bin/console doctrine:migrations:migrate

# Créer une nouvelle entité
php bin/console make:entity

# Créer un nouveau controller
php bin/console make:controller

# Installer les assets
php bin/console asset-map:compile

# Créer un utilisateur admin (si fixtures non chargées)
php bin/console app:create-admin

# Lister les services disponibles
php bin/console debug:container

# Voir la configuration Symfony
php bin/console debug:config
```

## 🌐 Technologies utilisées

### Backend
- **PHP 8.2+** - Langage serveur
- **Symfony 6.4 LTS** - Framework MVC
- **Doctrine ORM** - Mapping objet-relationnel
- **Twig** - Moteur de templates
- **Symfony Security** - Authentification et autorisation
- **Symfony Messenger** - Gestion asynchrone des messages (contacts)
- **Monolog** - Logging

### Frontend
- **DSFR (Design System FR)** - Design officiel République Française
- **Bootstrap 5** - Framework CSS responsive
- **Stimulus** - JavaScript framework léger
- **Turbo** - Navigation SPA partielle
- **Vanilla JavaScript** - Interactions dynamiques

### Base de données
- **MySQL 8.0** ou **MariaDB 10.5+**
- 15 tables avec relations complexes
- Migrations versionnées

### Outils
- **Composer** - Gestionnaire de dépendances PHP
- **npm** - Gestionnaire de dépendances JavaScript
- **Git** - Contrôle de version
- **LibreOffice** - Conversion ODT → PDF
- **PHPUnit** - Tests unitaires

## 🐛 Problèmes connus

- **Rafraîchissement page** : Recharger la page au début du formulaire après sauvegarde

## 🔐 Comptes de test - Pour vous connecter

Une fois l'installation terminée, utilisez ces comptes :

### 👨‍💼 Compte Administrateur

```
Email : admin@easybts.fr
Mot de passe : Admin123!
```

**Ce que vous pouvez faire :**
- Voir tous les dossiers d'inscription
- Valider ou rejeter les dossiers
- Gérer les spécialisations BTS

### 👨‍🎓 Compte Étudiant

```
Email : etudiant@example.fr
Mot de passe : Password123!
```

**Ce que vous pouvez faire :**
- Créer un dossier d'inscription
- Remplir le formulaire en 6 étapes
- Télécharger le PDF une fois validé

## ❓ Problèmes fréquents

### ❌ "Base de données inexistante"
```bash
php bin/console doctrine:database:create
```

### ❌ "Tables inexistantes"
```bash
php bin/console doctrine:migrations:migrate
```

### ❌ "Pas de données"
```bash
php bin/console doctrine:fixtures:load
```

### ❌ "Port 8000 déjà utilisé"
```bash
php -S localhost:8080 -t public/
```
Puis allez sur http://localhost:8080

### ❌ "Erreur MySQL"
- Vérifiez que MySQL est démarré dans XAMPP
- Vérifiez votre fichier `.env.local`

---
