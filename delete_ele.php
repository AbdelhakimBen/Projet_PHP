<?php
require_once 'functions.php';
deleteElement($_GET['id']);
header('Location: admin.php');
?>