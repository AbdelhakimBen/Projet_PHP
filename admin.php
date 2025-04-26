<?php
session_start();

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header('Location: login.php');
    exit;
}
require_once 'functions.php';
$categories = getCategories();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Apprentissage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #fff5fb;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        header {
            background-color: #ffe0f0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #ff3399;
            font-size: 2.5em;
        }

        .admin-actions {
            text-align: center;
            margin: 20px 0;
        }

        .admin-actions a {
            background-color: #3399ff;
            color: white;
            padding: 12px 20px;
            margin: 0 10px;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .admin-actions a:hover {
            background-color: #267acc;
        }

        .category {
            background-color: #ffffff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 90%;
        }

        .category h2 {
            color: #3399ff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1.6em;
            border-bottom: 1px solid #cdeeff;
            padding-bottom: 5px;
        }

        .action-icon {
            margin-left: 10px;
            color: #3399ff;
            text-decoration: none;
            font-size: 0.9em;
        }

        .delete-icon {
            color: #ff6666;
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        li {
            display: flex;
            align-items: center;
            background-color: #f9f9ff;
            padding: 10px 15px;
            margin: 10px 0;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        li img {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            margin-right: 15px;
            cursor: pointer;
        }

        li audio {
            display: none;
        }

        li span {
            flex-grow: 1;
            font-size: 1.1em;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>

<header>
    <h1>Espace Admin</h1>
</header>

<div class="admin-actions">
    <a href="ajout_categorie.php"><i class="fas fa-plus"></i> Ajouter une catégorie</a>
    <a href="ajout_element.php"><i class="fas fa-plus"></i> Ajouter un élément</a>
</div>

<?php foreach ($categories as $cat): ?>
    <div class="category">
        <h2>
            <?= htmlspecialchars($cat['nom']) ?>
            <span>
                <a href="edit_cat.php?id=<?= $cat['id'] ?>" class="action-icon"><i class="fas fa-edit"></i></a>
                <a href="delete_cat.php?id=<?= $cat['id'] ?>" class="action-icon delete-icon" onclick="return confirm('Supprimer cette catégorie ?')"><i class="fas fa-trash-alt"></i></a>
            </span>
        </h2>
        <ul>
            <?php
            $elements = getElementsByCategory($cat['id']);
            foreach ($elements as $ele):
            ?>
                <li>
                    <img src="uploads/images/<?= htmlspecialchars($ele['image']) ?>" onclick="document.getElementById('audio_<?= $ele['id'] ?>').play();">
                    <span><?= htmlspecialchars($ele['titre']) ?></span>
                    <audio id="audio_<?= $ele['id'] ?>">
                        <source src="uploads/audios/<?= htmlspecialchars($ele['audio']) ?>" type="audio/mpeg">
                    </audio>
                    <a href="edit_ele.php?id=<?= $ele['id'] ?>" class="action-icon"><i class="fas fa-edit"></i></a>
                    <a href="delete_ele.php?id=<?= $ele['id'] ?>" class="action-icon delete-icon" onclick="return confirm('Supprimer cet élément ?')"><i class="fas fa-trash-alt"></i></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endforeach; ?>

<footer>
    © 2025 l3b w 9ra - Gestion des contenus
</footer>

</body>
</html>
