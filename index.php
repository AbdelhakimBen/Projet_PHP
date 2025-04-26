<?php
require_once 'functions.php';
$categories = getCategories();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>l3b w 9ra - Apprendre en s'amusant</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Ajout d'une favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <style>
        /* Réinitialisation et styles de base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Nunito', 'Comic Sans MS', sans-serif;
        }

        :root {
            /* Palette de couleurs principale */
            --primary: #2e97db;         /* Bleu principal - plus vif */
            --primary-light: #7ccdff;   /* Bleu clair */
            --secondary: #ff5a87;       /* Rose vif */
            --secondary-light: #ffa5be; /* Rose clair */
            --accent-1: #ffce2e;        /* Jaune soleil */
            --accent-2: #47d678;        /* Vert nature */
            --accent-3: #9b5de5;        /* Violet spatial */
            --dark: #0c2e60;            /* Bleu foncé pour les textes */
            --light: #f9fcff;           /* Blanc cassé pour les fonds */
            --grey: #596b85;            /* Gris bleuté */
        }

        body {
            background-color: var(--light);
            color: var(--dark);
            overflow-x: hidden;
        }

        /* Arrière-plan animé avec étoiles et éléments spatiaux */
        .background {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            background: linear-gradient(120deg, #e3f5ff 0%, #ffebf3 50%, #e3f0ff 100%);
            overflow: hidden;
        }

        /* Animation des ballons et planètes */
        .balloon {
            position: absolute;
            width: 60px;
            height: 70px;
            border-radius: 50%;
            opacity: 0.7;
            animation: float 15s infinite ease-in-out;
        }

        .balloon.one {
            background: radial-gradient(circle at 30% 30%, var(--primary), var(--primary-light));
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .balloon.two {
            background: radial-gradient(circle at 30% 30%, var(--secondary), var(--secondary-light));
            top: 15%;
            right: 20%;
            animation-delay: 2s;
        }

        .balloon.three {
            background: radial-gradient(circle at 30% 30%, var(--accent-2), var(--primary-light));
            bottom: 10%;
            left: 15%;
            animation-delay: 4s;
        }

        .balloon.four {
            background: radial-gradient(circle at 30% 30%, var(--accent-1), #ffe97c);
            bottom: 20%;
            right: 10%;
            animation-delay: 6s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        /* En-tête */
        header {
            text-align: center;
            padding: 2rem 1rem;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.8), rgba(230, 242, 255, 0.8));
            border-bottom: 5px solid var(--primary);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        header img {
            height: 150px; /* Logo plus grand */
            margin-bottom: 1rem;
            filter: drop-shadow(0 3px 5px rgba(0, 0, 0, 0.2));
            transition: transform 0.3s ease;
        }

        header img:hover {
            transform: scale(1.05);
        }

        h1 {
            color: var(--primary);
            font-size: 2.6rem;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 0 var(--secondary-light);
        }

        .intro {
            color: var(--grey);
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        /* Animation du titre */
        .animate-bounce {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        /* Lien vers les jeux */
        .game-link {
            display: block;
            width: 300px;
            margin: 2rem auto;
            padding: 1rem;
            text-align: center;
            background: linear-gradient(to right, var(--secondary), var(--accent-3));
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(155, 93, 229, 0.4);
            transition: all 0.3s ease;
            border: 3px solid white;
        }

        .game-link:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(155, 93, 229, 0.6);
            background: linear-gradient(to right, var(--accent-3), var(--secondary));
        }

        /* Navigation */
        nav {
            background-color: var(--primary);
            padding: 1rem;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 2rem;
        }

        nav li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 20px;
        }

        nav li a:hover {
            background-color: white;
            color: var(--primary);
        }

        /* Conteneur des catégories */
        .category-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Cartes des catégories */
        .category-box {
            flex: 1;
            min-width: 300px;
            max-width: 350px;
            height: 250px;
            background-color: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            border: 4px solid transparent;
        }

        .category-box:nth-child(1) {
            border-color: var(--primary);
        }

        .category-box:nth-child(2) {
            border-color: var(--secondary);
        }

        .category-box:nth-child(3) {
            border-color: var(--accent-2);
        }

        .category-box:nth-child(4) {
            border-color: var(--accent-1);
        }

        .category-box:nth-child(5) {
            border-color: var(--accent-3);
        }

        .category-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .category-box a {
            display: flex;
            flex-direction: column;
            justify-content: center; /* Centre le contenu verticalement */
            align-items: center;
            width: 100%;
            height: 100%;
            padding: 1.5rem;
            color: var(--dark);
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
        }

        /* Styles spécifiques par catégorie - à ajuster selon vos catégories */
        .category-box:nth-child(1) a {
            color: var(--primary);
        }

        .category-box:nth-child(2) a {
            color: var(--secondary);
        }

        .category-box:nth-child(3) a {
            color: var(--accent-2);
        }

        .category-box:nth-child(4) a {
            color: var(--accent-1);
        }

        .category-box:nth-child(5) a {
            color: var(--accent-3);
        }

        /* Description des catégories */
        .category-description {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1rem;
            background-color: rgba(255, 255, 255, 0.95);
            font-size: 0.9rem;
            transform: translateY(100%);
            transition: transform 0.3s ease;
            color: var(--grey);
            border-top: 2px solid;
        }

        .category-box:nth-child(1) .category-description {
            border-color: var(--primary);
        }

        .category-box:nth-child(2) .category-description {
            border-color: var(--secondary);
        }

        .category-box:nth-child(3) .category-description {
            border-color: var(--accent-2);
        }

        .category-box:nth-child(4) .category-description {
            border-color: var(--accent-1);
        }

        .category-box:nth-child(5) .category-description {
            border-color: var(--accent-3);
        }

        .category-box:hover .category-description {
            transform: translateY(0);
        }

        /* Pied de page */
        footer {
            text-align: center;
            padding: 2rem;
            margin-top: 3rem;
            background: linear-gradient(to top, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            font-size: 1rem;
            border-radius: 20px 20px 0 0;
        }

        /* Media queries pour la responsivité */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            
            .category-box {
                min-width: 250px;
            }
            
            .game-link {
                width: 90%;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.8rem;
            }
            
            .intro {
                font-size: 1rem;
            }
            
            .category-box {
                min-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="background">
        <div class="balloon one"></div>
        <div class="balloon two"></div>
        <div class="balloon three"></div>
        <div class="balloon four"></div>
    </div>

    <header>
        <img src="logo.png" alt="Logo l3b w 9ra" height="150">
        <h1 class="animate-bounce">Bienvenue sur l3b w 9ra</h1>
        <p class="intro">✨ Un monde d'apprentissage amusant pour les petits (3-6 ans) ✨</p>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
        </ul>
    </nav>

    <a href="jeu.php" class="game-link">🎮 Accéder aux jeux éducatifs</a>

    <div class="category-container">
        <?php foreach ($categories as $cat): ?>
            <div class="category-box">
                <a href="categorie.php?id=<?= $cat['id'] ?>">
                    <?= htmlspecialchars($cat['nom']) ?>
                    <span class="category-description">
                        <?= isset($cat['description']) ? htmlspecialchars($cat['description']) : 'Découvre cette catégorie amusante !' ?>
                    </span>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <footer>
        <p>© 2025 l3b w 9ra - Apprendre en s'amusant</p>
        <p>Un site éducatif pour les enfants de 3 à 6 ans</p>
    </footer>

    <script>
        // Simple animation pour les éléments interactifs
        document.addEventListener('DOMContentLoaded', function() {
            const categoryBoxes = document.querySelectorAll('.category-box');
            
            categoryBoxes.forEach(box => {
                box.addEventListener('mouseenter', function() {
                    box.style.transition = 'all 0.3s ease';
                });
            });
        });
    </script>
</body>
</html>