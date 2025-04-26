<?php
require_once 'functions.php';
$ele = getElementById($_GET['id']);
$categories = getCategories();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image = $_FILES['image']['name'] ? $_FILES['image']['name'] : $ele['image'];
    $audio = $_FILES['audio']['name'] ? $_FILES['audio']['name'] : $ele['audio'];
    if ($_FILES['image']['name']) move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $image);
    if ($_FILES['audio']['name']) move_uploaded_file($_FILES['audio']['tmp_name'], "uploads/audio/" . $audio);
    updateElement($_GET['id'], $_POST['titre'], $image, $audio, $_POST['categorie_id']);
    header('Location: admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Élément</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #fef8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 20px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            max-width: 500px;
            width: 100%;
        }

        label {
            display: block;
            margin-top: 20px;
            margin-bottom: 8px;
            font-size: 18px;
            color: #663399;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 12px;
            border: 2px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
        }

        input[type="file"] {
            font-size: 15px;
        }

        button {
            margin-top: 25px;
            width: 100%;
            background-color: #ff66cc;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #ff3399;
        }
    </style>
</head>
<body>

<form method="post" enctype="multipart/form-data">
    <h2 style="text-align:center; color:#ff66cc;">Modifier un Élément</h2>
    
    <label>Titre :</label>
    <input type="text" name="titre" value="<?= htmlspecialchars($ele['titre']) ?>" required>

    <label>Image :</label>
    <input type="file" name="image" accept="image/*">

    <label>Audio :</label>
    <input type="file" name="audio" accept="audio/*">

    <label>Catégorie :</label>
    <select name="categorie_id" required>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $ele['categorie_id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat['nom']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">✅ Enregistrer les modifications</button>
</form>

</body>
</html>
