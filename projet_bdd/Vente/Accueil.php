<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits à Vendre</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="container">
        <div class="icon">
            <a href="Accueil.php">
                <img src="image.png" alt="Logo_EpsiTech">
            </a>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="Accueil.php">Accueil</a></li>
                <li><a href="Panier/Panier.php">Panier</a></li>
                <li><a href="../Profile/Profile.php">Compte</a></li>
            </ul>
        </nav> 
    </div>
    <h1>Liste des Produits</h1>

    <?php
    // Inclure le fichier de récupération des produits
    include 'get_products.php';
    
    // Vérifier si des produits ont été récupérés
    if ($produits && count($produits) > 0) {
        echo '<div class="produits">';
        foreach ($produits as $produit) {
            echo '<form action="Panier/ajouter_au_panier.php" method="POST">';
            echo '<div class="produit">';
            echo '<h2>' . htmlspecialchars($produit['Nom']) . '</h2>';
            echo '<img src="' . htmlspecialchars($produit['image_path']) . '" alt="' . htmlspecialchars($produit['Nom']) . '" style="width: 200px; height: auto;">';
            echo '<p>Prix: ' . htmlspecialchars($produit['Prix']) . ' €</p>';
            echo '<p>Description: ' . htmlspecialchars($produit['Description']) . '</p>';
            
            // Champs cachés pour envoyer les infos du produit
            echo '<input type="hidden" name="nom" value="' . htmlspecialchars($produit['Nom']) . '">';
            echo '<input type="hidden" name="prix" value="' . htmlspecialchars($produit['Prix']) . '">';
            echo '<input type="hidden" name="description" value="' . htmlspecialchars($produit['Description']) . '">';
            echo '<input type="hidden" name="image_path" value="' . htmlspecialchars($produit['image_path']) . '">';
            
            echo '<button type="submit">Ajouter au panier</button>';
            echo '</div>';
            echo '</form>';
            
            
        }
        echo '</div>';
    } else {
        echo '<p>Aucun produit disponible.</p>';
    }
    ?>
</body>
</html>