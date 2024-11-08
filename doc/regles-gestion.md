# Règles de gestion pour l'application de gestion d'événements

### 1. Gestion des utilisateurs 

- **RG1** : Un utilisateur peut s'inscrire, se connecter et se déconnecter de l'application.
- **RG2** : Lors de l'inscription, un utilisateur fournit un nom, une adresse e-mail, et un mot de passe respectant les critères de sécurité (au moins 8 caractères, une majuscule, un caractère spécial et un chiffre).
- **RG3** : Un utilisateur peut visualiser et mettre à jour ses informations (nom, email) après connexion.
- **RG4** : Les utilisateurs non authentifiés peuvent uniquement consulter les événements sans possibilité d’interaction (inscription, modification ou suppression).

### 2. Gestion des événements

- **RG5** : Un utilisateur authentifié peut créer un événement avec les informations suivantes : titre, description, date et heure de début, date et heure de fin, et lieu.
- **RG6** : Seul le créateur d'un événement peut le modifier ou le supprimer. 
- **RG7** : Les actions de création, modification, et suppression sont confirmées par un message à l’utilisateur.
- **RG8** : Les événements à venir sont affichés sur la page d'accueil dans une grille ordonnée par date de début, y compris pour les utilisateurs non authentifiés.
- **RG9** : Pour faciliter la navigation, chaque événement est affiché avec un aperçu des détails (titre, date et heure de début, lieu).
- **RG10** : L'affichage des événements peut être filtré par intervalle de dates via un formulaire en haut de la page d'accueil.

### 3. Gestion des inscriptions

- **RG11** : Un utilisateur connecté peut s'inscrire à un événement auquel il n'est pas encore inscrit.
- **RG12** : Un utilisateur ne peut pas s’inscrire deux fois au même événement.
- **RG13** : Une confirmation s’affiche lors de l’inscription ou de la désinscription à un événement.
- **RG14** : La section "Mes événements" permet à l'utilisateur de voir uniquement les événements auxquels il est inscrit.
- **RG15** : Un utilisateur inscrit peut se désinscrire de l’événement à tout moment.
- **RG16** : Un utilisateur peut s'inscrire à plusieurs évenements.