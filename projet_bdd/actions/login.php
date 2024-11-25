<?php
session_start();
include 'bdd_connexion.php'; // Connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        try {
            $stmt = $pdo->prepare("SELECT * FROM user WHERE Pseudo = :username");
            $stmt->bindParam(':username', $user);
            $stmt->execute();
            $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($utilisateur && password_verify($pass, $utilisateur['Password'])) {
                // Connexion réussie
                $_SESSION['user_id'] = $utilisateur['Id_user'];

                // Enregistrer la connexion
                $logStmt = $pdo->prepare("INSERT INTO log_connexions (user_id) VALUES (:user_id)");
                $logStmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
                $logStmt->execute();

                header("Location: ../Profile/Profile.php");
                exit();
            } else {
                echo "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
