<?php
require_once 'db.php';
$conn = Database::getInstance()->getConnection();
function getCategories() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM categories");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCategoryById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM categories WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addCategory($nom) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO categories (nom) VALUES (?)");
    return $stmt->execute([$nom]);
}

function updateCategory($id, $nom) {
    global $conn;
    $stmt = $conn->prepare("UPDATE categories SET nom = ? WHERE id = ?");
    return $stmt->execute([$nom, $id]);
}

function deleteCategory($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT image, audio FROM elements WHERE categorie_id = ?");
    $stmt->execute([$id]);
    $elements = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($elements as $element) {
        if (!empty($element['image'])) {
            $imagePath = __DIR__ . "/uploads/images/" . $element['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        if (!empty($element['audio'])) {
            $audioPath = __DIR__ . "/uploads/audios/" . $element['audio'];
            if (file_exists($audioPath)) {
                unlink($audioPath);
            }
        }
    }
    $stmt = $conn->prepare("DELETE FROM elements WHERE categorie_id = ?");
    $stmt->execute([$id]);
    $stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
    return $stmt->execute([$id]);
}


function getElementsByCategory($categorie_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM elements WHERE categorie_id = ?");
    $stmt->execute([$categorie_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getElementById($id) {
    global $conn ;
    $stmt = $conn->prepare("SELECT * FROM elements WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addElement($titre,$image, $audio, $categorie_id) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO elements (titre,image, audio, categorie_id) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$titre,$image, $audio, $categorie_id]);
}

function updateElement($id, $titre,$image, $audio, $categorie_id) {
    global $conn;
    $stmt = $conn->prepare("UPDATE elements SET titre = ?, image = ?, audio = ?, categorie_id = ? WHERE id = ?");
    return $stmt->execute([$titre,$image, $audio, $categorie_id, $id]);
}

function deleteElement($id) {
    global $conn ;
    $stmt = $conn->prepare("SELECT image, audio FROM elements WHERE id = ?");
    $stmt->execute([$id]);
    $element = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($element) {
        if (!empty($element['image'])) {
            $imagePath = __DIR__ . "/uploads/images/" . $element['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        if (!empty($element['audio'])) {
            $audioPath = __DIR__ . "/uploads/audios/" . $element['audio'];
            if (file_exists($audioPath)) {
                unlink($audioPath);
            }
        }
        $stmt = $conn->prepare("DELETE FROM elements WHERE id = ?");
        return $stmt->execute([$id]);
    }

    return false; 
}


function getRandomElements($count = 3) {
    global $conn ;
    $stmt = $conn->query("SELECT * FROM elements ORDER BY RAND() LIMIT $count");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getRandomWord() {
    global $conn;
    $stmt = $conn->query("SELECT * FROM elements WHERE LENGTH(titre) > 3 ORDER BY RAND() LIMIT 1");
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function getIntrusSet() {
    global $conn ;

    
    $catStmt = $conn->query("SELECT id FROM categories ORDER BY RAND() LIMIT 1");
    $catId = $catStmt->fetchColumn();

    $stmt1 = $conn->prepare("SELECT * FROM elements WHERE categorie_id = ? ORDER BY RAND() LIMIT 3");
    $stmt1->execute([$catId]);
    $sameCat = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    $stmt2 = $conn->prepare("SELECT * FROM elements WHERE categorie_id != ? ORDER BY RAND() LIMIT 1");
    $stmt2->execute([$catId]);
    $intrus = $stmt2->fetch(PDO::FETCH_ASSOC);

    $all = array_merge($sameCat, [$intrus]);
    shuffle($all);
    return $all;
}

?>