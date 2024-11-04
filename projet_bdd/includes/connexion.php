<?php

//systeme de connexion pour le compte ADMIN depuis les information bdd

$db_host = 'localhost';
$db_name = 'innogears';
$db_user = 'root';
$db_pass = '';

$pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

// si les champs sont vides
if (isset($_POST['Submit'])){
    if (empty($_POST['Pseudo']) || empty($_POST['email']) || empty($_POST['password'])) {
        echo "Tous les champs doivent être remplis";

    }else{   

    // récupération des données du formulaire
    $pseudo = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // hashage du mot de passe

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // requête d'insertion dans la base de données

    $query = $pdo->prepare("INSERT INTO users (pseudo, prenom, email, password) VALUES (:pseudo, :email, :password, :password)");

    $query->execute([
        'nom' => $pseudo,
        'email' => $email,
        'password' => $password_hash
    ]);

    // redirection vers la page de connexion
    header('Location: login.php');
    }
}
?>