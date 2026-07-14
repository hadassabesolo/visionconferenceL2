

<?php
// 1. Connexion à la BDD
$host = 'localhost';
$dbname = 'app';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, "");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}





?>



