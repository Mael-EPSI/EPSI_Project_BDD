<?php

include ('bdd_connexion.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    $username = $_POST['nom'];
    $password = $_POST['password'];
    
    if (empty($username) || empty($password)){
        echo "Tous les champs doivent être remplis.";
        exit;
    }
    
    // Vérifie les informations d'identification de l'utilisateur dans la base de données
    $stmt = $pdo->prepare('SELECT * FROM gardien WHERE Pseudo = :username AND Password = :password');
    $stmt->execute([':username' => $username, ':password' => $password]);
    $resultat = $stmt->fetch();
    
    if ($resultat){
        session_start();
        $_SESSION['username'] = $username;
        header('Location: ../Profile/gardien_accueil.php');
    } else {
        echo "Utilisateur ou mot de passe incorrect.";
    }
}  
