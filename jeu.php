<?php
require_once 'functions.php';
$memoryItems = getRandomElements();
$mot = getRandomWord();
$intrusItems = getIntrusSet();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Jeux éducatifs</title>
    <link rel="stylesheet" href="assets/jeu.css">
</head>

<body>
<h1>🎲 Jeux éducatifs</h1>

<section>
    <h2>🧠 Jeu de mémoire </h2>
    <div class="memory-grid">
        <?php
        $cards = array_merge($memoryItems, $memoryItems);
        shuffle($cards);
        foreach ($cards as $index => $item):
        ?>
            <div class="card" data-id="<?= $item['id'] ?>">
                <img src="uploads/images/<?= $item['image'] ?>" alt="Carte de mémoire">
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section>
    <h2>🔤 Compléter le mot</h2>
    <?php
    $motComplet = $mot['titre'];
    $indice = rand(1, strlen($motComplet)-2);
    $motIncomplet = substr_replace($motComplet, '_', $indice, 1);
    $lettreCorrecte = $motComplet[$indice];
    $options = array_unique([$lettreCorrecte, 'a', 'o', 'e']);
    shuffle($options);
    ?>
    <p>Mot : <strong id="mot-complet" data-mot="<?= $motComplet ?>"><?= $motIncomplet ?></strong></p>
    <audio id="audio-mot">
        <source src="uploads/audios/<?= htmlspecialchars($mot['audio']) ?>" type="audio/mpeg">
    </audio>

    <div style="text-align: center;">
        <?php foreach ($options as $opt): ?>
            <button onclick="checkMot('<?= $opt ?>', '<?= $lettreCorrecte ?>')"><?= $opt ?></button>
        <?php endforeach; ?>
        <p id="mot-result"></p>
    </div>
</section>

<section>
    <h2>🔎 Trouver l’intrus</h2>
    <div class="intrus-grid">
        <?php foreach ($intrusItems as $item): ?>
            <img src="uploads/images/<?= $item['image'] ?>" class="intrus-img" onclick="checkIntrus(this, <?= $item['categorie_id'] ?>)" alt="Image intrus">
        <?php endforeach; ?>
    </div>
    <p id="intrus-result"></p>
</section>

<script src="assets/jeu.js" ></script>
</body>
</html>
