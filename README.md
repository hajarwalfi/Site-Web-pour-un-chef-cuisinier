<div align="center">

# 👨‍🍳 Chef Cuisinier Premium Platform 👨‍🍳
### *Expérience Gastronomique de Luxe à Domicile*

![PHP](https://img.shields.io/badge/PHP-FFE4E1?style=for-the-badge&logo=php&logoColor=FF69B4&labelColor=FFF0F5)
![JavaScript](https://img.shields.io/badge/JavaScript-E6E6FA?style=for-the-badge&logo=javascript&logoColor=9370DB&labelColor=F8F8FF)
![HTML5](https://img.shields.io/badge/HTML5-FFFACD?style=for-the-badge&logo=html5&logoColor=FFB6C1&labelColor=FFFFF0)
![CSS3](https://img.shields.io/badge/CSS3-FFE4F1?style=for-the-badge&logo=css3&logoColor=FF69B4&labelColor=FFF5F5)

</div>

## 🌟 À Propos du Projet

**Chef Cuisinier Premium Platform** est une plateforme web élégante développée pour un chef cuisinier mondialement reconnu, offrant une expérience gastronomique unique à domicile. Cette solution digitale haut de gamme permet aux clients de découvrir des menus exclusifs et de réserver des expériences culinaires personnalisées avec un système multi-rôles sophistiqué.

Développée avec PHP backend sécurisé et JavaScript avancé, la plateforme combine luxe, fonctionnalité et sécurité de niveau professionnel pour une expérience utilisateur premium.

## ✨ Fonctionnalités Principales

### 🎭 Système Multi-Rôles
- 👥 **Clients Premium** - Découverte menus et réservations exclusives
- 👨‍🍳 **Chef Dashboard** - Gestion complète et statistiques avancées
- 🔐 **Authentification sécurisée** - Connexion avec redirection intelligente
- 🛡️ **Gestion des permissions** - Accès contrôlé par rôle

### 🍽️ Expérience Client Exclusive
- 📋 **Menus gastronomiques** - Consultation catalogue premium
- 📅 **Réservations sophistiquées** - Date, heure, nombre de personnes
- 📊 **Historique personnel** - Suivi complet des réservations
- ✏️ **Gestion flexible** - Modification et annulation intuitive

### 👨‍🍳 Dashboard Chef Professionnel
- ⚡ **Gestion réservations** - Acceptation/refus en temps réel
- 📈 **Statistiques avancées** - Analytics détaillées et KPIs
- 📊 **Tableau de bord** - Vue d'ensemble activité quotidienne
- 👥 **Gestion clientèle** - Profils et préférences clients

### 🔒 Sécurité de Niveau Enterprise
- 🔐 **Hashage sécurisé** - Mots de passe protégés
- 🛡️ **Protection XSS** - HTMLPurifier et validation serveur
- 💉 **Prévention SQL Injection** - Requêtes préparées strictes
- 🎫 **Tokens CSRF** - Sécurisation actions sensibles

## 🛠️ Technologies Utilisées

<div align="justify">

![PHP](https://img.shields.io/badge/PHP-FFE4E1?style=for-the-badge&logo=php&logoColor=FF69B4&labelColor=FFF0F5)
![JavaScript](https://img.shields.io/badge/JavaScript-E6E6FA?style=for-the-badge&logo=javascript&logoColor=9370DB&labelColor=F8F8FF)
![HTML5](https://img.shields.io/badge/HTML5-FFFACD?style=for-the-badge&logo=html5&logoColor=FFB6C1&labelColor=FFFFF0)
![CSS3](https://img.shields.io/badge/CSS3-FFE4F1?style=for-the-badge&logo=css3&logoColor=FF69B4&labelColor=FFF5F5)
![MySQL](https://img.shields.io/badge/MySQL-FFE0E6?style=for-the-badge&logo=mysql&logoColor=FF69B4&labelColor=FFF5F8)
![UML](https://img.shields.io/badge/UML-FFF0E6?style=for-the-badge&logo=uml&logoColor=FF8C00&labelColor=FFFAF0)

</div>

**Stack Technique Premium :**
- **Backend :** PHP 8.0+ avec architecture sécurisée
- **Frontend :** HTML5 sémantique + CSS3 avancé + JavaScript ES6+
- **Base de Données :** MySQL avec requêtes optimisées
- **Sécurité :** Hashage, protection XSS/CSRF, requêtes préparées
- **UX/UI :** Design responsive luxueux et élégant

## 🚀 Installation et Configuration

### Prérequis Premium
```bash
# Environnement de développement
- XAMPP / WAMP / MAMP (dernière version)
- PHP 8.0+
- MySQL 8.0+
- Apache avec mod_rewrite activé
```

### Installation
```bash
# Cloner le repository
git clone https://github.com/hajarwalfi/chef-cuisinier-platform.git

# Naviguer dans le dossier
cd chef-cuisinier-platform

# Configuration base de données
mysql -u root -p < database/chef_platform.sql
```

### Configuration Sécurisée
```php
// config/database.php
define('DB_HOST', 'localhost');
define('DB_NAME', 'chef_premium_platform');
define('DB_USER', 'root');
define('DB_PASS', '');

// Clés de sécurité
define('CSRF_SECRET', 'your-secure-random-key');
define('PASSWORD_SALT', 'your-password-salt');
```

## 📖 Structure du Projet

```
chef-cuisinier-platform/
├── 📁 Diagrams/
│   ├── ERD.pdf              # Diagramme Entité-Relation
│   └── UseCase.pdf          # Diagrammes UML cas d'usage
├── 📁 assets/
│   ├── css/                 # Styles premium et responsive
│   ├── fonts/               # Typographies élégantes
│   └── icons/               # Iconographie culinaire
├── 📁 img/
│   ├── dishes/              # Photos plats haute qualité
│   ├── chef/                # Portraits chef professionnel
│   └── ambiance/            # Images d'ambiance luxueuse
├── 📁 js/
│   ├── validation.js        # Validation Regex avancée
│   ├── modals.js           # Modals dynamiques élégantes
│   ├── sweetalert.js       # Alertes visuelles premium
│   └── menu-manager.js     # Gestion dynamique menus
├── 📁 layout/
│   ├── header.php          # En-tête responsive
│   ├── footer.php          # Pied de page élégant
│   └── navigation.php      # Navigation adaptative rôle
├── 📁 pages/
│   ├── client/             # Interface client premium
│   ├── chef/               # Dashboard chef professionnel
│   ├── auth/               # Système authentification
│   └── error/              # Pages erreur personnalisées
├── 📁 includes/
│   ├── config.php          # Configuration sécurisée
│   ├── security.php        # Fonctions sécurité
│   └── functions.php       # Utilitaires projet
├── 📄 index.php            # Page d'accueil luxueuse
└── 📄 README.md            # Documentation complète
```

## 📋 Livrables et Planning

### 📅 Étapes de Développement
**J1 - Modélisation :**
- ✅ Diagramme ERD professionnel
- ✅ Diagrammes UML cas d'usage

**J3 - Frontend Premium :**
- ✅ Interface utilisateur élégante
- ✅ Design responsive luxueux

**J5 - Backend Sécurisé :**
- ✅ Fonctionnalités complètes
- ✅ Sécurité enterprise

### 🏆 Critères d'Excellence
- ✅ **Code Quality** - Clean code et bonnes pratiques
- ✅ **Security First** - Sécurité niveau professionnel
- ✅ **W3C Compliance** - Standards web respectés
- ✅ **Premium UX/UI** - Expérience utilisateur luxueuse

## 🎯 Compétences Développées

**Développement Full-Stack :**
- 🔧 **PHP Backend** - Architecture sécurisée multi-rôles
- 🎨 **Frontend Premium** - Interface luxueuse responsive
- 🛡️ **Sécurité Avancée** - Protection enterprise complète

**UX/UI Gastronomique :**
- 🌟 **Design Luxueux** - Esthétique raffinée et élégante
- 📱 **Responsive Premium** - Multi-devices optimisé
- ⚡ **Interactions Fluides** - JavaScript avancé

**Architecture et Sécurité :**
- 🏗️ **Modélisation UML** - Cas d'usage professionnels
- 🔒 **Sécurité Enterprise** - XSS, CSRF, SQL Injection
- 📊 **Analytics Avancées** - Dashboard et statistiques
