<?php
require_once 'functions.php';
$categories = getCategories();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image = $_FILES['image']['name'];
    $audio = $_FILES['audio']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $image);
    move_uploaded_file($_FILES['audio']['tmp_name'], "uploads/audios/" . $audio);
    addElement($_POST['titre'],  $image, $audio, $_POST['categorie_id']);
    header('Location: admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Élément</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background: linear-gradient(135deg, #fef8ff, #e6f0ff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #ff66cc;
            margin-bottom: 30px;
        }

        label {
            font-size: 18px;
            color: #663399;
            margin-top: 15px;
            display: block;
        }

        input[type="text"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 2px solid #ddd;
            margin-top: 5px;
            font-size: 16px;
        }

        button {
            margin-top: 25px;
            width: 100%;
            background-color: #66ccff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #3399ff;
        }
    </style>
</head>
<body>

<form method="post" enctype="multipart/form-data">

    <label for="titre">Titre :</label>
    <input type="text" name="titre" id="titre" required>

    <label for="image">Image :</label>
    <input type="file" name="image" id="image" accept="image/*" required>

    <label for="audio">Audio :</label>
    <input type="file" name="audio" id="audio" accept="audio/*" required>

    <label for="categorie">Catégorie :</label>
    <select name="categorie_id" id="categorie" required>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>"><?= $cat['nom'] ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Ajouter</button>
</form>

</body>
</html>
