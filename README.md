# Site Web pour un Chef Cuisinier

## Description du projet
Ce projet consiste à développer un site web pour un chef cuisinier mondialement reconnu, offrant une expérience gastronomique unique. Le site est conçu pour deux types d'utilisateurs : les **clients** qui souhaitent découvrir les menus exclusifs du chef, réserver des expériences culinaires et interagir avec lui, et les **chefs** qui peuvent gérer les réservations, consulter des statistiques et gérer leur profil. Le projet comprend un backend sécurisé en PHP, une interface utilisateur responsive et un design moderne.

## Objectifs du projet
Le site a pour objectif de :
- Permettre aux utilisateurs (clients) de consulter les menus, s'inscrire, se connecter et réserver des expériences culinaires.
- Offrir aux chefs une plateforme pour gérer les réservations, accepter ou refuser les demandes, et consulter des statistiques détaillées sur les réservations.
- Assurer une expérience utilisateur fluide et intuitive grâce à un design moderne et responsive.

## Technologies utilisées
- **Frontend** :
  - HTML5 pour la structure de la page
  - CSS3 pour le design et la mise en forme
  - JavaScript pour des fonctionnalités dynamiques et l'interactivité
  - Responsive Design pour assurer une compatibilité avec toutes les tailles d'écrans (mobile, tablette, desktop)
- **Backend** :
  - PHP pour la gestion de la logique du serveur, des sessions et des requêtes à la base de données
- **Base de données** :
  - MySQL pour stocker les informations des utilisateurs, chefs, réservations, menus, etc.
- **Sécurité** :
  - Hashage des mots de passe pour protéger les informations sensibles
  - Validation des formulaires pour éviter les entrées malveillantes
  - Protection contre les attaques XSS (Cross-Site Scripting) et les injections SQL
  - Prévention des attaques CSRF (Cross-Site Request Forgery) avec des tokens
- **Outils de développement** :
  - Git pour la gestion du code source et la collaboration
  - GitHub pour l'hébergement du code et le suivi du projet

## Fonctionnalités principales
### Utilisateurs (Clients) :
- **Inscription et Connexion** : Les utilisateurs peuvent créer un compte, se connecter et accéder à leur espace personnel.
- **Découverte des menus** : Les utilisateurs peuvent consulter les menus proposés par le chef.
- **Réservation** : Les utilisateurs peuvent réserver une expérience culinaire, en sélectionnant la date, l'heure et le nombre de personnes.
- **Gestion des réservations** : Les utilisateurs peuvent consulter l’historique de leurs réservations, modifier ou annuler des réservations.

### Chefs (Administrateurs) :
- **Connexion et Dashboard** : Les chefs se connectent à leur espace personnel et consultent un tableau de bord avec des statistiques détaillées.
- **Gestion des réservations** : Les chefs peuvent accepter ou refuser les demandes de réservation en fonction de leur disponibilité.
- **Statistiques des réservations** : Les chefs ont accès aux statistiques telles que le nombre de demandes en attente, approuvées et les détails des réservations à venir.
- **Gestion du profil** : Les chefs peuvent gérer leurs informations personnelles et les menus qu’ils proposent.

### Fonctionnalités supplémentaires :
- **Validation des formulaires avec Regex** : Les formulaires (inscription, réservation) utilisent des expressions régulières pour valider les entrées des utilisateurs (email, téléphone, mot de passe).
- **Formulaires dynamiques** : Permet aux chefs d'ajouter plusieurs plats à un menu sans recharger la page.
- **SweetAlerts** : Intégration de notifications visuelles élégantes pour confirmer les actions importantes (réservation, annulation, etc.).
- **Génération de documents imprimables** : Les chefs peuvent générer des rapports PDF sur les réservations et les statistiques des demandes.
- **Envoi d'emails** : Envoi d'emails pour la réinitialisation du mot de passe, la confirmation de réservation, et les alertes urgentes concernant les réservations.

## Sécurité
- **Hashage des mots de passe** : Utilisation de fonctions de hachage sécurisées (comme `password_hash` en PHP) pour garantir la sécurité des mots de passe.
- **Prévention des attaques XSS** : Validation et échappement des entrées des utilisateurs pour éviter les attaques par injection de code malveillant.
- **Prévention des injections SQL** : Utilisation de requêtes préparées pour interagir avec la base de données, réduisant ainsi les risques d'injections SQL.


