<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Panier</title>
</head>
<body>

<h1>Mon Panier</h1>

<?php
// Vérifiez si le panier contient des produits
if (isset($_SESSION['panier']) && count($_SESSION['panier']) > 0) {
    echo '<ul>';
    foreach ($_SESSION['panier'] as $index => $produit) {
        echo '<li>';
        echo '<h2>' . htmlspecialchars($produit['nom']) . '</h2>';
        echo '<img src="' . htmlspecialchars($produit['image_path']) . '" alt="' . htmlspecialchars($produit['nom']) . '" style="width: 100px; height: auto;">';
        echo '<p>Prix: ' . htmlspecialchars($produit['prix']) . ' €</p>';
        echo '<p>Description: ' . htmlspecialchars($produit['description']) . '</p>';
        echo '</li>';
    }
    echo '</ul>';
    // afficher le prix total des produits
    $total_prix = 0;
    foreach ($_SESSION['panier'] as $produit) {
        $total_prix += $produit['prix'];
    }
    echo '<p>Prix total des produits : '. $total_prix.'$ </p>';
    echo'<br><br>';
        
    // Vérifiez si le panier contient plus d'un produit
    if (count($_SESSION['panier']) >= 1) {
        // Bouton pour confirmer la commande
        echo '<form action="confirmer_panier.php" method="POST">';
        echo '<button type="submit">Confirmer le panier</button>';
        echo '</form>';
    } else {
        echo '<p>Ajoutez d\'autres produits pour confirmer le panier.</p>';
    }

    // Bouton pour vider le panier
    echo'<br><br>';
    echo '<form action="vider_panier.php" method="POST">';
    echo '<button type="submit">Vider le panier</button>';
    echo '</form>';

} else {

    echo '<p>Votre panier est vide.</p>';
}
?>
<br><br>
<a href="../Accueil.php">Continuer vos achats</a>
</body>
</html>
