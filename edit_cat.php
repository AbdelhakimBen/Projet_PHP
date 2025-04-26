<?php
require_once 'functions.php';
$cat = getCategoryById($_GET['id']);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updateCategory($_GET['id'], $_POST['nom']);
    header('Location: admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier la catégorie</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #fef6ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        label {
            display: block;
            font-size: 20px;
            color: #663399;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ccc;
            border-radius: 10px;
            font-size: 18px;
            margin-bottom: 20px;
        }

        button {
            background-color: #ff66cc;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        button:hover {
            background-color: #ff3399;
        }
    </style>
</head>
<body>
    <form method="post">
        <label for="nom">Modifier la catégorie :</label>
        <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($cat['nom']) ?>" required>
        <button type="submit">💾 Enregistrer</button>
    </form>
</body>
</html>
