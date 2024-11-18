<?php
session_start();
include '..\actions\bdd_connexion.php';

if (!isset($_SESSION['user_id'])) {
    // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

try {
    // Récupérer les informations de l'utilisateur connecté
    $stmt = $pdo->prepare("SELECT * FROM user WHERE Id_user = :id");
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$utilisateur) {
        echo "Utilisateur non trouvé.";
        exit();
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    exit();
}

// Information sur les commandes de l'utilisateur

$stmtp = $pdo->prepare("SELECT * FROM commandes WHERE user_id = :id ORDER BY Date_commande DESC");
$stmtp->bindParam(':id', $user_id, PDO::PARAM_INT);
$stmtp->execute();
$commandes = $stmtp->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de l'utilisateur</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0 auto;
            border-collapse: collapse;
            width: 600px; /* Limiter la largeur du tableau */
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 300px; /* Limiter la largeur du tableau */

        .content{
            margin: 0 auto;
            border-collapse: collapse;
            width: 300px; /* Limiter la largeur du tableau */
        }   
        
        
        
        }
        td {
            padding: 10px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
        }
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            background-color: #4CAF50; /* Couleur de fond pour le bouton */
            color: white; /* Couleur du texte */
            border: none; /* Pas de bordure */
            cursor: pointer; /* Changement de curseur pour le bouton */
        }
        input[type="submit"]:hover {
            background-color: #45a049; /* Couleur de fond lorsque la souris est dessus */
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
<body>
    <h1>Profil de <?php echo htmlspecialchars($utilisateur['Pseudo']); ?></h1>
    
    <p><strong>Pseudo : </strong> <?php echo htmlspecialchars($utilisateur['Pseudo']) ?></p>
    <p><strong>Nom :</strong> <?php echo htmlspecialchars($utilisateur['Pseudo']); ?></p>
    <p><strong>Email :</strong> <?php echo htmlspecialchars($utilisateur['Email']); ?></p>
    <p><strong>Role :</strong> <?php echo htmlspecialchars($utilisateur['Role']) ?></p>
    <p><strong>Date de creation du compte :</strong> <?php echo htmlspecialchars($utilisateur['Date_creation']) ?></p>
    <!-- <p><strong>Derniere connexion : </strong> <?php echo htmlspecialchars($utilisateur['Derniere_connexion'])?></p> -->
    
    <br><br><br>

    <h1>Liste des commande effectuer : </h1>

    <?php

foreach ($commandes as $commande) {
    echo "<div class='commande'>";
    echo "<p><strong>Id de la commande : </strong>" . htmlspecialchars($commande['id']) . "</p>";
    echo "<p><strong>Date de la commande : </strong>" . htmlspecialchars($commande['date_commande']) . "</p>";

    // Récupérer les produits associés à cette commande
    $stmt_produits = $pdo->prepare("SELECT * FROM produits_commande WHERE commande_id = :commande_id");
    $stmt_produits->bindParam(':commande_id', $commande['id'], PDO::PARAM_INT);
    $stmt_produits->execute();
    $produits = $stmt_produits->fetchAll(PDO::FETCH_ASSOC);

    echo "<p><strong>Produits commandés :</strong></p>";
    echo "<ul>";
    foreach ($produits as $produit) {
        echo "<li>";
        echo "<p>Nom du produit : " . htmlspecialchars($produit['nom']) . "</p>";
        echo "<p>Prix : " . htmlspecialchars($produit['prix']) . " €</p>";
        echo "<p>Description : " . htmlspecialchars($produit['description']) . "</p>";
        echo "</li>";
    }
    echo "</ul>";
    echo "<a href='detail_commande.php?id_commande=" . htmlspecialchars($commande['id']) . "'>Voir plus</a>";
    echo "</div>";
}

    ?>

    <br><br><br><br>
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
    <a href="../Vente/Accueil.php">Accueil</a>
</body>
</html>