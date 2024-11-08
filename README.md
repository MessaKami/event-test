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



