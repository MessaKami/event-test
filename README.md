# Event-Test - Application de gestion d'événements

Event-Lille est une application Symfony conçue pour gérer des événements dans une organisation régionale. Elle permet aux utilisateurs de créer, modifier et supprimer des événements, ainsi que de s'inscrire ou se désinscrire à des événements.

## Table des matières

1. [Fonctionnalités](#fonctionnalités)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Utilisation](#utilisation)
5. [Choix de conception](#choix-de-conception)
6. [Limitations](#limitations)
7. [Technologies utilisées](#technologies-utilisées)

---

## Fonctionnalités

- **Authentification** : Inscription, connexion, déconnexion et protection des routes pour les utilisateurs authentifiés.
- **Gestion des événements** :
  - Création, modification et suppression d'événements (disponible uniquement pour les créateurs).
  - Affichage des événements à venir, accessible à tous.
  - Filtrage des événements par date de début et date de fin.
  - Inscription et désinscription des utilisateurs aux événements.
- **Mes événements** : Les utilisateurs connectés peuvent accéder à une liste des événements auxquels ils sont inscrits.
- **Notifications flash** : Notifications immédiates pour confirmer les actions de l'utilisateur (création d'événement, inscription, etc.).

---

## Installation

### Prérequis

- PHP 8.1 ou supérieur
- Composer
- Node.js et npm (optionnel pour la gestion d’actifs)
- Un serveur SQL (PostgreSQL ou MySQL recommandé)
- Symfony CLI (optionnel, pour le développement en local)

### Étapes d'installation

1. **Cloner le dépôt** :
   ```bash
   git clone <url-du-repository>
   cd event-test
   ```

2. **Installer les dépendances** :
   ```bash
   composer install
   ```

3. **Configurer la base de données** :
   - Créer un fichier `.env.local` à la racine du projet en se basant sur `.env`.
   - Modifier la variable `DATABASE_URL` en fonction de votre configuration SQL, par exemple :
     ```
     DATABASE_URL="mysql://username:password@127.0.0.1:3306/event_test?serverVersion=8.0.32&charset=utf8mb4"
     ```
        ou avec postgresql  

     ```
     DATABASE_URL="postgresql://username:password@127.0.0.1:5433/event_test?serverVersion=16&charset=utf8"
     ```

4. **Initialiser la base de données** :
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

5. **Charger les données fictives** :
   - L'application utilise Faker pour générer des données fictives pour tester l'application.
   ```bash
   php bin/console doctrine:fixtures:load
   ```

6. **Lancer le serveur Symfony** :
   ```bash
   symfony server:start
   ```
   Ou avec PHP intégré :
   ```bash
   php -S localhost:8000 -t public
   ```

L'application est maintenant accessible sur `http://localhost:8000`.

---

## Configuration

Dans le fichier `.env.local`, vous pouvez configurer plusieurs paramètres clés de l'application, notamment la base de données, les informations d'emailing (le cas échéant), et d'autres variables d'environnement.

---

## Utilisation

1. **Création de compte** : Un utilisateur peut s'inscrire via la page de registre en fournissant un email et un mot de passe conforme aux exigences de sécurité (au moins 8 caractères, une majuscule, un chiffre, et un caractère spécial).
2. **Connexion** : Une fois inscrit, l'utilisateur peut se connecter pour accéder aux fonctionnalités avancées.
3. **Gestion des événements** :
   - **Créer un événement** : L'utilisateur peut créer un nouvel événement en spécifiant le titre, la description, les dates de début et de fin, ainsi que le lieu.
   - **Modifier un événement** : Un utilisateur peut modifier les événements qu'il a créés.
   - **Supprimer un événement** : Un utilisateur peut supprimer ses propres événements.
4. **Inscription aux événements** : Tout utilisateur connecté peut s'inscrire aux événements créés par d'autres.
5. **Mes événements** : L'utilisateur peut consulter la liste des événements auxquels il est inscrit en allant dans la section "Mes événements".

---

## Choix de conception

1. **Architecture MVC de Symfony** : Utilisation de Symfony pour une séparation claire des responsabilités.
2. **Composant Security de Symfony** : Gère l'authentification et la protection des routes pour sécuriser l'accès aux fonctionnalités sensibles.
3. **Flashes pour les notifications** : Affichage des messages de confirmation ou d'erreur après chaque action utilisateur.
4. **Fixtures avec Faker** : Permet de générer des données fictives pour simuler des utilisateurs et des événements, facilitant ainsi les tests et la démonstration.
5. **Utilisation de Bootstrap pour le style** : Améliore l'esthétique de l'application et assure la compatibilité avec des dispositifs de différentes tailles (responsive design).

---

## Limitations

1. **Pas de pagination** : Les événements sont affichés sans pagination. Pour un grand nombre d'événements, la performance pourrait être impactée.
2. **Pas de gestion avancée des notifications** : Les messages flash sont basiques et n'incluent pas de notifications en temps réel.
3. **Filtrage des événements** : Le filtrage des événements est limité à l'intervalle de date sans critères supplémentaires (lieu, créateur, etc.).

---

## Technologies utilisées

- **Symfony 7.1** : Framework principal de l'application.
- **Doctrine ORM** : Gère la persistance des données pour les entités utilisateur et événement.
- **Bootstrap 5** : Assure la mise en forme et le design responsive de l'application.
- **FakerPHP** : Génère des données de test pour les fixtures.
- **Twig** : Moteur de templates utilisé pour afficher les vues.

---

```markdown
# Event Management Application

Bienvenue dans l'application de gestion d'événements pour une organisation régionale. Cette application, développée avec Symfony, permet aux utilisateurs de créer, modifier, supprimer et s'inscrire à des événements. Elle propose également une page d'accueil publique avec affichage des événements à venir, un filtre par date, et des fonctionnalités réservées aux utilisateurs authentifiés.

## Fonctionnalités Principales

1. **Authentification et Gestion des Accès**
   - Inscription avec vérification d'e-mail.
   - Connexion et déconnexion.
   - Accès aux fonctionnalités avancées (création, modification, suppression d'événements) uniquement pour les utilisateurs connectés.

2. **Gestion des Événements**
   - Création, modification et suppression d'événements pour les utilisateurs connectés.
   - Inscription et désinscription aux événements, avec vérification pour éviter les inscriptions en double.
   - Affichage de tous les événements à venir sur la page d'accueil, accessible même aux visiteurs.
   - Filtrage des événements par date de début et de fin.

3. **Mes Événements**
   - Section dédiée pour afficher uniquement les événements auxquels l'utilisateur est inscrit.

4. **Tests Unitaires**
   - Tests unitaires avec PHPUnit pour vérifier le bon fonctionnement des services et des méthodes principales de l'application.

## Installation

### Prérequis

- PHP 8.0 ou supérieur
- Composer
- Symfony CLI (optionnel mais recommandé)
- MySQL ou autre base de données compatible avec Doctrine

### Étapes d'Installation

1. **Cloner le dépôt Git**
   ```bash
   git clone https://github.com/votre_utilisateur/votre_projet.git
   cd votre_projet
   ```

2. **Installer les dépendances**
   ```bash
   composer install
   ```

3. **Configurer les variables d'environnement**
   - Copier le fichier `.env` et renommer la copie en `.env.local`.
   - Configurer les informations de la base de données dans `.env.local` :
     ```
     DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"
     ```

4. **Exécuter les migrations de base de données**
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

5. **Charger les fixtures de base**
   - Cette étape créera des comptes utilisateurs et des événements d'exemple.
   ```bash
   php bin/console doctrine:fixtures:load
   ```

6. **Compiler les assets (si nécessaire)**
   - Utilisez Webpack Encore si des assets (CSS, JS) doivent être compilés.

7. **Lancer le serveur de développement**
   ```bash
   symfony serve
   ```
   Accédez à l'application via `http://127.0.0.1:8000`.

## Utilisation

### Accéder à l'Application

1. **Page d'accueil** - Affiche les événements à venir et permet de les filtrer par date.
2. **Inscription / Connexion** - Accès via les liens en haut de la page. Nécessaire pour accéder aux fonctionnalités avancées.
3. **Création d'événements** - Accessible une fois connecté.
4. **Mes événements** - Section pour voir les événements auxquels l'utilisateur est inscrit.

### Rôles Utilisateurs

- **Visiteurs** : Peuvent voir les événements mais pas interagir avec eux.
- **Utilisateurs authentifiés** : Peuvent créer, modifier, supprimer leurs propres événements, et s'inscrire/désinscrire aux événements d'autres utilisateurs.

## Choix de Conception

- **Architecture MVC avec Symfony** - Utilisation du framework Symfony pour une structure MVC robuste et respectueuse des meilleures pratiques.
- **Système de sécurité Symfony** - Pour la gestion de l'authentification et des rôles.
- **Bootstrap pour le style** - Utilisation de Bootstrap pour un design responsive.
- **Faker pour les Fixtures** - Utilisation de la bibliothèque Faker pour générer des données d'exemple dans les fixtures.
- **PHPUnit pour les Tests** - Tests unitaires pour s'assurer du bon fonctionnement des principales fonctionnalités de l'application.

## Limitations Connues

- **Filtrage de dates** : Les événements filtrés se basent sur les dates de début et de fin. Veillez à inclure une marge d'un jour dans la date de fin si vous voulez inclure les événements qui se terminent ce jour-là.
- **Pas de gestion des rôles avancés** : Tous les utilisateurs connectés ont les mêmes droits pour créer et gérer leurs propres événements.

## Instructions pour le Déploiement en Production

1. **Préparer une branche de release**
   ```bash
   git checkout develop
   git flow release start 1.0.0
   ```
   
2. **Finaliser la release**
   ```bash
   git flow release finish 1.0.0
   git push origin main --tags
   ```

3. **Installer les dépendances en production**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Migrer la base de données**
   ```bash
   php bin/console doctrine:migrations:migrate --env=prod
   ```

5. **Effacer le cache en production**
   ```bash
   php bin/console cache:clear --env=prod
   ```

6. **Redémarrer le serveur (si nécessaire)**

