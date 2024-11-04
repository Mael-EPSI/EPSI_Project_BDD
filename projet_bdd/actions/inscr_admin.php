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

            // Vérifiez si l'utilisateur existe déjà
            $stmt = $pdo->prepare("SELECT * FROM user WHERE Pseudo = :username");
            $stmt->bindParam(':username', $user);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // L'utilisateur existe déjà
                echo "Cet utilisateur existe déjà.";
            } else {
                // Préparation de la requête d'insertion
                $stmt = $pdo->prepare("INSERT INTO user (Pseudo, Password) VALUES (:username, :password)");
                $stmt->bindParam(':username', $user);
                $stmt->bindParam(':password', $pass);

                if ($stmt->execute()) {
                    echo "Nouvel utilisateur enregistré avec succès.";
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
