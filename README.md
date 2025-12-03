# EasyBTS - Plateforme de gestion des inscriptions BTS

![Symfony](https://img.shields.io/badge/Symfony-6.x-000000?style=flat&logo=symfony)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=flat&logo=mysql)

## 📋 Description

EasyBTS est une plateforme web de gestion des dossiers d'inscription pour les formations BTS (Brevet de Technicien Supérieur). Elle permet aux étudiants de soumettre leur dossier d'inscription en ligne et aux administrateurs de gérer et valider ces dossiers.

### Fonctionnalités principales

- ✅ **Inscription en ligne** : Formulaire multi-étapes pour les candidats
- ✅ **Gestion des dossiers** : Interface administrateur pour valider/rejeter les dossiers
- ✅ **Génération PDF** : Export automatique des dossiers validés au format PDF
- ✅ **Authentification sécurisée** : Système de connexion avec gestion des rôles
- ✅ **Sauvegarde automatique** : Sauvegarde des brouillons en temps réel
- ✅ **Upload de documents** : Gestion des pièces justificatives

## 🛠️ Technologies utilisées

- **Framework** : Symfony 6.x
- **Langage** : PHP 8.2+
- **Base de données** : MySQL 8.0+
- **Frontend** : Twig, Stimulus.js, DSFR (Système de Design de l'État Français)
- **PDF** : PHPWord + LibreOffice
- **Asset Management** : Asset Mapper (Symfony UX)

## 📦 Prérequis

Avant de commencer, assurez-vous d'avoir installé :

- **PHP** >= 8.2
  - Extensions requises : `pdo_mysql`, `intl`, `xml`, `zip`, `gd`
- **Composer** >= 2.0
- **MySQL** >= 8.0 ou MariaDB >= 10.5
- **Node.js** >= 18.x (optionnel, pour le développement frontend)
- **Symfony CLI** (recommandé)
- **LibreOffice** (pour la génération de PDF)

## 🚀 Installation

### 1. Cloner le projet

```bash
git clone https://github.com/Corentin1876/EasyBts.git
cd EasyBts
```

### 2. Installer les dépendances

```bash
composer install
```

### 3. Configurer l'environnement

Créez un fichier `.env.local` à la racine du projet :

```env
# Configuration de la base de données
DATABASE_URL="mysql://root:@127.0.0.1:3306/easybts?serverVersion=8.0&charset=utf8mb4"

# Configuration de l'application
APP_ENV=dev
APP_SECRET=votre_secret_genere_ici

# Configuration Mailer (optionnel pour dev)
MAILER_DSN=null://null
```

### 4. Créer la base de données

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

### 5. Charger les données de test

```bash
php bin/console doctrine:fixtures:load
```

### 6. Lancer le serveur de développement

```bash
symfony server:start
```

Ou avec PHP :

```bash
php -S localhost:8000 -t public/
```

L'application est maintenant accessible sur : **http://localhost:8000**

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
2. **Choisir une spécialisation BTS** : Sélectionner le BTS souhaité
3. **Remplir le formulaire** : Compléter les 6 étapes du formulaire
   - Identité de l'étudiant
   - Scolarité année en cours
   - Scolarité 2 années antérieures
   - Responsables légaux
   - Documents justificatifs
   - Validation
4. **Soumettre le dossier** : Envoyer pour validation
5. **Télécharger le PDF** : Une fois validé, télécharger le dossier complet

### Pour un administrateur

1. **Se connecter** avec les identifiants admin
2. **Accéder au tableau de bord** : `/bts/admin`
3. **Consulter les dossiers** : Voir tous les dossiers soumis
4. **Valider/Rejeter** : Gérer le statut des dossiers
5. **Gérer les spécialisations** : Ajouter/modifier les BTS disponibles

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
- **Specialisation** : Types de BTS disponibles
- **InformationEleve** : Données personnelles
- **Responsable** : Responsables légaux
- **ScolariteDes2AnneeAnterieur** : Historique scolaire

## 🧪 Tests

Pour lancer les tests :

```bash
php bin/phpunit
```

## 📝 Commandes utiles

```bash
# Vider le cache
php bin/console cache:clear

# Voir les routes
php bin/console debug:router

# Créer une migration
php bin/console make:migration

# Créer une entité
php bin/console make:entity

# Installer les assets
php bin/console asset-map:compile
```

## 🐛 Problèmes connus

- **Rafraîchissement page** : Recharger la page au début du formulaire après sauvegarde
