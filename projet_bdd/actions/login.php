<?php
// login.php

$dsn = 'mysql:host=localhost;dbname=innogears;charset=utf8';
$username = 'root'; // Changez avec votre nom d'utilisateur MySQL
$password = ''; // Changez avec votre mot de passe MySQL

try {
    // Création de la connexion PDO
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les données du formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];

            // Préparation de la requête
            $stmt = $pdo->prepare("SELECT * FROM user WHERE Pseudo = :username");
            $stmt->bindParam(':username', $user);
            $stmt->execute();

            // Vérification de l'utilisateur
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                // Vérification du mot de passe
                if (password_verify($pass, $row['Password'])) {
                    echo "Connexion réussie ! Bienvenue, " . htmlspecialchars($row['Pseudo']) . "!";
                    // Redirection vers la page d'accueil ou tableau de bord
                    header("Location: ..\dashboard.php");
                } else {
                    echo "Nom d'utilisateur ou mot de passe incorrect.1";
                }
            } else {
                echo "Nom d'utilisateur ou mot de passe incorrect.2";
            }
        } else {
            echo "Veuillez remplir tous les champs.";
        }
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
