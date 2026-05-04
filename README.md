<div align="center">

# 🍽️ Saveurs du Sénégal

### Application web de gestion de restaurant

<br/>

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![GitHub](https://img.shields.io/badge/GitHub-Repo-181717?style=for-the-badge&logo=github&logoColor=white)

<br/>

> Projet académique · L2 Génie Informatique · ESITEC / Groupe Sup de Co Dakar · 2025-2026

<br/>

![Screenshot accueil](screenshots/accueil.png)

</div>

---

## 📑 Table des matières

- [Vue d'ensemble](#-vue-densemble)
- [Fonctionnalités](#-fonctionnalités)
- [Stack technique](#-stack-technique)
- [Installation](#-installation)
- [Comptes de démonstration](#-comptes-de-démonstration)
- [Architecture](#-architecture-mvc)
- [Base de données](#-base-de-données)
- [Aperçu des pages](#-aperçu-des-pages)
- [Équipe](#-équipe)

---

## 🌍 Vue d'ensemble

**Saveurs du Sénégal** est une application web complète de gestion d'un restaurant développée avec **Laravel 12**. Elle permet à un gérant de piloter son restaurant depuis une interface admin et à ses serveurs de passer des commandes en temps réel.

<div align="center">
<img src="screenshots/dashboard.png" alt="Dashboard admin" width="80%"/>
</div>

---

## ✨ Fonctionnalités

| Fonctionnalité | Statut |
|----------------|--------|
| 🔐 Authentification avec rôles (Admin / Serveur) | ✅ |
| 🍲 CRUD Plats, Catégories, Menus, Tables | ✅ |
| 🛒 Passage de commande multi-plats avec quantités | ✅ |
| 🧾 Génération de ticket de caisse | ✅ |
| 🖼️ Upload d'images pour les plats | ✅ |
| 🗑️ Soft delete sur les entités sensibles | ✅ |
| 🛡️ Middleware de rôle (protection des routes admin) | ✅ |
| 🌐 Interface client (Accueil · Menu · Réserver · Contact) | ✅ |
| 🌱 Seeders pour pré-remplir la base | ✅ |

---

## 🛠️ Stack technique

<div align="center">

| Technologie | Rôle |
|-------------|------|
| ![Laravel](https://img.shields.io/badge/-Laravel_12-FF2D20?logo=laravel&logoColor=white) | Framework PHP MVC |
| ![PHP](https://img.shields.io/badge/-PHP_8.2-777BB4?logo=php&logoColor=white) | Langage backend |
| ![MySQL](https://img.shields.io/badge/-MySQL-4479A1?logo=mysql&logoColor=white) | Base de données relationnelle |
| ![Blade](https://img.shields.io/badge/-Blade-FF2D20?logo=laravel&logoColor=white) | Moteur de templates |
| ![Bootstrap](https://img.shields.io/badge/-Bootstrap_5-7952B3?logo=bootstrap&logoColor=white) | Interface utilisateur responsive |
| ![Git](https://img.shields.io/badge/-Git-F05032?logo=git&logoColor=white) | Gestion de version |

</div>

---

## ⚙️ Installation

### Prérequis

- ![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?logo=php&logoColor=white)
- ![Composer](https://img.shields.io/badge/Composer-latest-885630?logo=composer&logoColor=white)
- ![XAMPP](https://img.shields.io/badge/XAMPP-MySQL-FB7A24?logo=xampp&logoColor=white)
- ![Node](https://img.shields.io/badge/Node.js-LTS-339933?logo=node.js&logoColor=white)

### Étapes

```bash
# 1. Cloner le dépôt
git clone https://github.com/Bara-Thiam/restaurant-manager-laravel.git
cd restaurant-manager-laravel

# 2. Installer les dépendances PHP
composer install

# 3. Installer les dépendances JS
npm install && npm run build

# 4. Configurer l'environnement
cp .env.example .env
php artisan key:generate
```

### 🔧 Configuration `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=restaurant_db
DB_USERNAME=root
DB_PASSWORD=
```

> ⚠️ **Important :** Créer la base de données `restaurant_db` dans phpMyAdmin avant de continuer.

```bash
# 5. Migrer et seeder la base de données
php artisan migrate:fresh --seed

# 6. Créer le lien symbolique pour les images
php artisan storage:link

# 7. Lancer le serveur
php artisan serve
```

✅ L'application est accessible sur **`http://127.0.0.1:8000`**

---

## 🔐 Comptes de démonstration

<div align="center">

| Rôle | Email | Mot de passe | Accès |
|------|-------|--------------|-------|
| 👑 **Admin** | admin@restaurant.com | `password` | Interface complète |
| 🧑‍💼 **Serveur** | bara@gmail.com | `bara0705` | Commandes uniquement |

</div>

> Le middleware `role:admin` protège toutes les routes `/admin/*`. Un serveur connecté verra une erreur **403** s'il tente d'y accéder.

---

## 🏗️ Architecture MVC

```
resto/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── CategorieController.php
│   │   │   │   ├── PlatController.php
│   │   │   │   ├── MenuController.php
│   │   │   │   └── TableController.php
│   │   │   └── CommandeController.php
│   │   └── Middleware/
│   │       └── CheckRole.php          ← middleware rôle custom
│   └── Models/
│       ├── Categorie.php
│       ├── Plat.php
│       ├── Menu.php
│       ├── TableRestaurant.php
│       └── Commande.php
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── CategorieSeeder.php
│       ├── PlatSeeder.php
│       └── TableRestaurantSeeder.php
├── resources/views/
│   ├── layouts/admin.blade.php        ← layout admin (bordeaux/or)
│   ├── admin/                         ← vues CRUD admin
│   ├── commandes/                     ← commandes + ticket
│   ├── welcome.blade.php              ← accueil public
│   ├── reserver.blade.php
│   ├── a-propos.blade.php
│   └── contact.blade.php
└── routes/web.php
```

---

## 🗃️ Base de données

### Schéma des relations

```
categories ──< plats >──────────────< commande_plat >──────────< commandes
                                     (pivot: quantite)
                                                                     │
                                                               table_restaurants
                                                                     │
                                                                   users
```

### Table pivot `commande_plat`

```sql
commande_plat
├── commande_id  FK → commandes.id
├── plat_id      FK → plats.id
└── quantite     INT  ← colonne pivot clé
```

---

## 📸 Aperçu des pages

### 🏠 Page d'accueil
<div align="center">
<img src="screenshots/accueil.png" alt="Page accueil" width="80%"/>
</div>

---

### 🍽️ Menu client
<div align="center">
<img src="screenshots/menu-client.png" alt="Menu client" width="80%"/>
</div>

---

### 🛒 Formulaire de commande
<div align="center">
<img src="screenshots/commande.png" alt="Commande" width="80%"/>
</div>

---

### 🧾 Ticket de caisse
<div align="center">
<img src="screenshots/ticket.png" alt="Ticket de caisse" width="80%"/>
</div>

---

### 🔧 Interface admin — Gestion des plats
<div align="center">
<img src="screenshots/admin-plats.png" alt="Admin plats" width="80%"/>
</div>

---

### 🚫 Page 403 — Accès refusé
<div align="center">
<img src="screenshots/403.png" alt="Accès refusé" width="60%"/>
</div>

---

## 👥 Équipe

<div align="center">

| | Membre | Responsabilités |
|--|--------|-----------------|
| 👨‍💻 | **Sereigne Bara Thiam** | Auth · Rôles · Middleware · Commandes · Ticket · Architecture |
| 👨‍💻 | **Mouhamdou Mactar Camara** | Plats · Catégories · Upload images · Seeders |
| 👩‍💻 | **Yayra Joienella Aholou-Kotiko** | Tables · Menus · Interface client · Soft delete |

</div>

---

<div align="center">

**ESITEC — Groupe Sup de Co Dakar · L2 Génie Informatique · 2025-2026**

![Made with Laravel](https://img.shields.io/badge/Made%20with-Laravel-FF2D20?style=flat-square&logo=laravel)
![Made in Senegal](https://img.shields.io/badge/Made%20in-Sénégal%20🇸🇳-00853F?style=flat-square)

</div>
