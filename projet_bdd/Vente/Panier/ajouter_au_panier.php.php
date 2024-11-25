<?php
session_start();

// Vérifier si le panier existe déjà dans la session, sinon l'initialiser
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Récupérer les données du produit
$produit = [
    'nom' => $_POST['nom'],
    'prix' => $_POST['prix'],
    'description' => $_POST['description'],
    'image_path' => $_POST['image_path']
];

// Ajouter le produit au panier
$_SESSION['panier'][] = $produit;

// Rediriger vers la page du panier ou de la boutique
header('Location: panier.php');
exit;
?>
