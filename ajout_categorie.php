<?php
require_once 'functions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    addCategory($_POST['nom']);
    header('Location: admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Catégorie</title>
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
            background-color: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
            max-width: 450px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #ff66cc;
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-size: 18px;
            color: #663399;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
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

<form method="post">

    <label>Nom de la catégorie :</label>
    <input type="text" name="nom" required>

    <button type="submit"> Ajouter</button>
</form>

</body>
</html>
