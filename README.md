# 🏪 Système de Gestion de Vente et Stock

Une application web complète développée avec Laravel pour la gestion des ventes, du stock et des statistiques commerciales.

## 📋 Table des matières

- [À propos](#à-propos)
- [Fonctionnalités](#fonctionnalités)
- [Technologies utilisées](#technologies-utilisées)
- [Installation](#installation)
- [Configuration](#configuration)
- [Utilisation](#utilisation)
- [Structure du projet](#structure-du-projet)
- [Développement](#développement)
- [Tests](#tests)
- [Déploiement](#déploiement)

## 🎯 À propos

Cette application permet de gérer efficacement :
- **Gestion des produits** : Ajout, modification, suppression et suivi du stock
- **Gestion des catégories** : Organisation des produits par catégories
- **Gestion des ventes** : Enregistrement des transactions et génération de factures
- **Statistiques** : Tableaux de bord et analyses des performances
- **Utilisateurs** : Système d'authentification et gestion des profils

## ✨ Fonctionnalités

### 🔐 Authentification et Sécurité
- Inscription et connexion sécurisée
- Vérification par email
- Réinitialisation de mot de passe
- Gestion des sessions

### 📦 Gestion des Produits
- Création et édition de produits
- Gestion des stocks (quantités, alertes de stock bas)
- Organisation par catégories
- Recherche et filtrage

### 🛒 Gestion des Ventes
- Création de ventes avec plusieurs articles
- Calcul automatique des totaux
- Génération de factures PDF
- Historique des transactions

### 📊 Statistiques et Rapports
- Tableau de bord avec indicateurs clés
- Analyse des ventes par période
- Rapports de performance
- Alertes de stock bas

## 🛠 Technologies utilisées

### Backend
- **Laravel 10+** - Framework PHP
- **Eloquent ORM** - Gestion de base de données
- **MySQL** - Base de données principale

### Frontend
- **Blade** - Templating engine
- **Tailwind CSS** - Framework CSS
- **Vite** - Build tool
- **JavaScript** - Interactivité

### Outils
- **Dompdf** - Génération de PDF
- **PHPUnit** - Tests unitaires
- **Composer** - Gestion des dépendances

## 🚀 Installation

### Prérequis
- PHP 8.1 ou supérieur
- Composer
- MySQL 5.7+ ou MariaDB 10.2+
- Node.js et npm

### Étapes d'installation

1. **Cloner le dépôt**
   ```bash
   git clone https://github.com/mouhamedsouleymane/gestion-de-stock.git
   cd gestion-de-stock
   ```

2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```

3. **Installer les dépendances JavaScript**
   ```bash
   npm install
   ```

4. **Configurer l'environnement**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configurer la base de données**
   - Créer une base de données MySQL
   - Modifier le fichier `.env` :
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nom_de_votre_base
   DB_USERNAME=votre_utilisateur
   DB_PASSWORD=votre_mot_de_passe
   ```

6. **Exécuter les migrations et seeders**
   ```bash
   php artisan migrate --seed
   ```

7. **Compiler les assets**
   ```bash
   npm run build
   ```

8. **Démarrer le serveur**
   ```bash
   php artisan serve
   ```

## ⚙️ Configuration

### Variables d'environnement importantes

```env
APP_NAME="Gestion de Vente et Stock"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# Configuration email (pour les vérifications)
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## 📖 Utilisation

### Premier accès
1. Accédez à l'application via `http://localhost:8000`
2. Créez un compte utilisateur
3. Connectez-vous avec vos identifiants
4. Commencez à gérer vos produits et ventes

### Fonctionnalités principales

#### Gestion des produits
- Naviguez vers "Produits" dans le menu
- Ajoutez de nouveaux produits avec nom, prix, quantité et catégorie
- Modifiez les informations existantes
- Consultez les alertes de stock bas

#### Gestion des ventes
- Accédez à "Ventes" pour créer une nouvelle vente
- Sélectionnez les produits et quantités
- Le système calcule automatiquement le total
- Générez des factures PDF

#### Statistiques
- Le tableau de bord affiche les indicateurs clés
- Consultez les performances par période
- Surveillez les tendances des ventes

## 📁 Structure du projet

```
app/
├── Http/
│   ├── Controllers/          # Contrôleurs MVC
│   └── Requests/            # Validation des formulaires
├── Models/                  # Modèles Eloquent
│   ├── Category.php
│   ├── Product.php
│   ├── Sale.php
│   ├── SaleItem.php
│   └── User.php
└── View/Components/         # Composants Blade

database/
├── migrations/              # Migrations de base de données
├── seeders/                 # Données initiales
└── factories/               # Factories pour les tests

resources/
├── views/                   # Templates Blade
│   ├── auth/               # Pages d'authentification
│   ├── categories/         # Gestion des catégories
│   ├── products/          # Gestion des produits
│   ├── sales/             # Gestion des ventes
│   └── statistics/        # Tableaux de bord
└── js/                     # JavaScript

public/                     # Assets publics
routes/                     # Routes de l'application
tests/                      # Tests unitaires et fonctionnels
```

## 🧪 Tests

L'application inclut une suite de tests complète :

### Tests d'authentification
```bash
php artisan test tests/Feature/Auth/
```

### Tests des fonctionnalités principales
```bash
php artisan test tests/Feature/
```

### Tests unitaires
```bash
php artisan test tests/Unit/
```

### Tous les tests
```bash
php artisan test
```

## 🚀 Déploiement

### Développement local
```bash
php artisan serve
npm run dev
```

### Production
1. Configurer les variables d'environnement de production
2. Exécuter `npm run build`
3. Configurer un serveur web (Apache/Nginx)
4. Configurer la base de données de production

## 🤝 Contribution

Les contributions sont les bienvenues ! Pour contribuer :

1. Fork le projet
2. Créer une branche feature (`git checkout -b feature/AmazingFeature`)
3. Commiter les changements (`git commit -m 'Add AmazingFeature'`)
4. Pousser la branche (`git push origin feature/AmazingFeature`)
5. Ouvrir une Pull Request

## 📄 Licence

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.

## 👥 Auteur

**Mouhamed Souleymane**
- GitHub: [@mouhamedsouleymane](https://github.com/mouhamedsouleymane)

## 🙏 Remerciements

- [Laravel](https://laravel.com) - Framework PHP
- [Tailwind CSS](https://tailwindcss.com) - Framework CSS
- [Dompdf](https://github.com/dompdf/dompdf) - Génération de PDF

---

**Version**: 1.0.0  
**Dernière mise à jour**: Décembre 2025

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
