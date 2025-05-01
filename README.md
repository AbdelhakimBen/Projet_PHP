# 🎓 l3b w 9ra 

Bienvenue sur **l3b w 9ra**, une plateforme web éducative interactive destinée aux enfants pour apprendre en s'amusant à travers des jeux simples : un jeu de memory, un jeu de mot à compléter avec son audio, et un jeu pour trouver l'intrus.

## 📦 Contenu du projet

- `index.php` — Page d'accueil ludique avec des animations.
- `jeu.php` — Page principale des jeux éducatifs.
- `admin.php` — Interface d'administration (protégée par mot de passe).
- `login.php` — Formulaire d'authentification pour l'admin.
- `functions.php` — Fonctions PHP pour la gestion de la base de données.
- `db.php` — Connexion à la base de données.
- `assets/jeu.js` — Logique des jeux (memory, mot, intrus).
- `assets/jeu.css` — Style enfantin et animations.
- `uploads/images/` — Images utilisées dans les jeux.
- `uploads/audios/` — Fichiers audio pour les mots.
- `apprentissage_enfants.sql` — Fichier SQL de la base de données.

## 🚀 Installation

1. **Cloner le projet** (ou télécharger les fichiers) :
   ```bash
   git clone https://github.com/AbdelhakimBen/l3b_w_9ra.git
   ```

2. **Importer la base de données** :
   - Ouvrir [phpMyAdmin](http://localhost/phpmyadmin)
   - Créer une base appelée `apprentissage_enfants`
   - Importer le fichier `apprentissage_enfants.sql`

3. **Configurer Apache & PHP** :
   - Déplacez le projet dans `htdocs` (si vous utilisez XAMPP).
   - Assurez-vous que les répertoires `uploads/images` et `uploads/audios` sont accessibles et ont des permissions d'écriture.

4. **Accéder au projet** :
   - Aller sur [http://localhost/l3b_w_9ra](http://localhost/l3b_w_9ra)

## 🔐 Accès Admin

- Accéder à `admin.php`
- Connectez-vous avec :
  - **Nom d'utilisateur** : `admin`
  - **Mot de passe** : `1234` *(modifiable dans le code de login.php)*

## 📚 Fonctionnalités

- 🧠 **Memory** : retourner les cartes pour trouver les paires.
- 🔤 **Complète le mot** : choisir la bonne lettre et entendre le mot.
- 🚨 **Trouve l'intrus** : repérer l'image différente parmi les autres.
- 🔐 **Zone admin** : ajouter/modifier/supprimer des éléments (images + sons).
- 🎨 **Design enfantin** avec animations et couleurs ludiques.

## 💡 Auteurs

- Projet réalisé par Benatti Abdelhakim ,Chaimae Sifr ,Brahim Mekkaoui,Ilyas Jaafar dans le cadre d'un projet universitaire en PHP/MySQL.

---

© 2025 – *l3b w 9ra* — Apprendre en s'amusant 🎉
