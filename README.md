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

