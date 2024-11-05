<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits à Vendre</title>
</head>
<body>
    <h1>Liste des Produits</h1>

    <?php
    // Inclure le fichier de récupération des produits
    include 'get_products.php';
    
    // Vérifier si des produits ont été récupérés
    if ($produits && count($produits) > 0) {
        echo '<div class="produits">';
        foreach ($produits as $produit) {
            echo '<div class="produit">';
            echo '<h2>' . htmlspecialchars($produit['Nom']) . '</h2>';
            echo '<img src="' . htmlspecialchars($produit['image_path']) . '" alt="' . htmlspecialchars($produit['Nom']) . '" style="width: 200px; height: auto;">';
            echo '<p>Prix: ' . htmlspecialchars($produit['Prix']) . ' €</p>';
            echo '<p>Description: ' . htmlspecialchars($produit['Description']) . '</p>';
            echo '<button>Acheter</button>'; // Ajoutez une fonctionnalité d'achat selon vos besoins
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>Aucun produit disponible.</p>';
    }
    ?>
</body>
</html>