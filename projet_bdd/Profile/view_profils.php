<?php
require('../actions/login.php');

$dsn = 'mysql:host=localhost;dbname=innogears;charset=utf8';
$username = 'root'; // Changez avec votre nom d'utilisateur MySQL
$password = ''; // Changez avec votre mot de passe MySQL

try {
    // Création de la connexion PDO
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $user = ['username' => $username, 'password' => $password];
    
    // Préparation de la requête pour récupérer les info user
    $stmt = $pdo->prepare("SELECT * FROM user WHERE Pseudo = :pseudo");
    $stmt->execute();

    // Récupérer toutes les informations user
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>