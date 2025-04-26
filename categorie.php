<?php
require_once 'functions.php';

if (!isset($_GET['id'])) {
    die("Catégorie manquante.");
}

$categorie_id = $_GET['id'];
$categorie = getCategoryById($categorie_id);
$elements = getElementsByCategory($categorie_id);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($categorie['nom']) ?></title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #fff6fb;
            padding: 20px;
            margin: 0;
        }

        header {
            text-align: center;
            background-color: #ffe3f2;
            padding: 20px 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        h1 {
            color: #ff3399;
            font-size: 2.2em;
        }

        ul {
            list-style: none;
            padding: 0;
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        li {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            padding: 15px;
            width: 200px;
            text-align: center;
            transition: transform 0.2s ease;
        }

        li:hover {
            transform: scale(1.05);
        }

        li img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            cursor: pointer;
        }

        li span {
            display: block;
            margin-top: 10px;
            font-size: 1.1em;
            color: #333;
        }

        footer {
            text-align: center;
            margin-top: 50px;
            color: #777;
            font-size: 0.9em;
        }

        a.back {
            display: inline-block;
            margin-top: 20px;
            background-color: #66c2ff;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        a.back:hover {
            background-color: #3399ff;
        }
    </style>
</head>
<body>

    <header>
        <h1> <?= htmlspecialchars($categorie['nom']) ?></h1>
        <a class="back" href="index.php">&larr; Retour à l'accueil</a>
    </header>

    <ul>
        <?php foreach ($elements as $ele): ?>
            <li>
                <img src="uploads/images/<?= htmlspecialchars($ele['image']) ?>" onclick="document.getElementById('audio_<?= $ele['id'] ?>').play();">
                <span><?= htmlspecialchars($ele['titre']) ?></span>
                <audio id="audio_<?= $ele['id'] ?>">
                    <source src="uploads/audios/<?= htmlspecialchars($ele['audio']) ?>" type="audio/mpeg">
                </audio>
            </li>
        <?php endforeach; ?>
    </ul>

    <footer>
        © 2025 l3b w 9ra - Apprendre en s'amusant
    </footer>

</body>
</html>
