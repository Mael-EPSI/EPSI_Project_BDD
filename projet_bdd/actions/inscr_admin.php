<?php
// register.php

$dsn = 'mysql:host=localhost;dbname=innogears;charset=utf8';
$dbUsername = 'root'; // Changez avec votre nom d'utilisateur MySQL
$dbPassword = ''; // Changez avec votre mot de passe MySQL

try {
    // Création de la connexion PDO
    $pdo = new PDO($dsn, $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $email = $_POST['email'];
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];

            // encrypted password
            $pass = password_hash($pass, PASSWORD_DEFAULT);

            // Vérifiez si l'utilisateur existe déjà
            $stmt = $pdo->prepare("SELECT * FROM user WHERE Pseudo = :username");
            $stmt->bindParam(':username', $user);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // L'utilisateur existe déjà
                echo "Cet utilisateur existe déjà.";
                // boutton pour revenir a l'accueil
                echo '<a href="..\Vente\Accueil.php">Retour à l\'accueil</a>';
            } else {
                // Préparation de la requête d'insertion
                $stmt = $pdo->prepare("INSERT INTO user (Pseudo, Password,Nom ,Prenom, Email) VALUES (:username, :password,:nom ,:prenom ,:email)");
                $stmt->bindParam(':username', $user);
                $stmt->bindParam(':password', $pass);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':nom', $nom);

                if ($stmt->execute()) {
                    echo "Nouvel utilisateur enregistré avec succès.";
                    echo '<a href="..\Vente\Accueil.php">Cliquer ici pour retourner l\'accueil</a>';
                } else {
                    echo "Erreur lors de l'enregistrement de l'utilisateur.";
                }
            }
        } else {
            echo "Veuillez remplir tous les champs.";
        }
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
