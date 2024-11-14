<?php
session_start();

if (isset($_POST['index']) && isset($_SESSION['panier'][$_POST['index']])) {
    // Supprimer le produit à l'index donné
    unset($_SESSION['panier'][$_POST['index']]);
    
    // Réindexer le tableau pour éviter les "trous" dans les clés
    $_SESSION['panier'] = array_values($_SESSION['panier']);
}

header('Location: panier.php');
exit;
?>
