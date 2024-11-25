<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Panier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Mon Panier</h1>

<?php
// Vérifiez si une action de suppression a été effectuée
if (isset($_GET['supprimer']) && is_numeric($_GET['supprimer'])) {
    $index = (int)$_GET['supprimer'];
    if (isset($_SESSION['panier'][$index])) {
        unset($_SESSION['panier'][$index]); // Supprime l'élément à l'index donné
        $_SESSION['panier'] = array_values($_SESSION['panier']); // Réindexe le tableau
        echo "<p style='color: green;'>Produit supprimé du panier.</p>";
    }
}

// Vérifiez si le panier contient des produits
if (isset($_SESSION['panier']) && count($_SESSION['panier']) > 0) {
    echo '<ul>';
    foreach ($_SESSION['panier'] as $index => $produit) {
        echo '<div class="produit">';
        echo '<li>';
        echo '<h2>' . htmlspecialchars($produit['nom']) . '</h2>';

        // Vérification de l'existence de l'image
        if (!empty($produit['image_path']) && file_exists($produit['image_path'])) {
            echo '<img src="' . htmlspecialchars($produit['image_path']) . '" alt="' . htmlspecialchars($produit['nom']) . '">';
        } else {
            echo '<p><em>Image indisponible</em></p>';
            echo '<img src="image.png" alt="Image par défaut">';
        }

        echo '<p>Prix: ' . htmlspecialchars($produit['prix']) . ' €</p>';
        echo '<p>Description: ' . htmlspecialchars($produit['description']) . '</p>';
        // Bouton de suppression pour le produit
        echo '<form method="GET" action="">';
        echo '<button type="submit" class="delete-button" name="supprimer" value="' . $index . '">Supprimer ce produit</button>';
        echo '</form>';
        echo '</li>';
        echo '</div>';
    }
    echo '</ul>';

    // Calcul du prix total
    $total_prix = 0;
    foreach ($_SESSION['panier'] as $produit) {
        $total_prix += $produit['prix'];
    }
    echo '<p class="total">Prix total des produits : ' . htmlspecialchars($total_prix) . ' €</p>';

    // Bouton pour vider complètement le panier
    echo '<form action="vider_panier.php" method="POST">';
    echo '<button type="submit" class="button">Vider le panier</button>';
    echo '</form>';
    
    // Bouton pour confirmer le panier
    echo '<form action="confirmer_panier.php" method="POST">';
    echo '<button type="submit" class="button">Confirmer le panier</button>';
    echo '</form>';
} else {
    echo '<p>Votre panier est vide.</p>';
}
?>

<br><br>
<a href="../Accueil.php">Continuer vos achats</a>

</body>
</html>
