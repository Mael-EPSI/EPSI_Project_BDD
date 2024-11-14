<?php
session_start();
include '..\actions\bdd_connexion.php'; // Connexion à la base de données

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
                $logStmt->bindParam(':user_id', $utilisateur['id']);
                $logStmt->execute();

                // Redirection Page Accueil ou page
                echo '<h3> Page Profile : </h3>';
                echo '<a href="Profile.php">Voir le profil</a>';
                echo '<br><br>';
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
?>
