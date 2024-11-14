<?php
session_start();
include '..\actions\bdd_connexion.php';

// Vérifier si un `id_commande` est fourni dans l'URL
if (!isset($_GET['id_commande'])) {
    echo "<p>Aucune commande sélectionnée.</p>";
    exit;
}

$id_commande = (int) $_GET['id_commande'];

// Récupérer les informations de la commande
$stmt_commande = $pdo->prepare("SELECT * FROM commandes WHERE id = :id_commande");
$stmt_commande->bindParam(':id_commande', $id_commande, PDO::PARAM_INT);
$stmt_commande->execute();
$commande = $stmt_commande->fetch(PDO::FETCH_ASSOC);

if (!$commande) {
    echo "<p>Commande introuvable.</p>";
    exit;
}

// Afficher les détails de la commande
echo "<h2>Détails de la commande #" . htmlspecialchars($commande['id']) . "</h2>";
echo "<p><strong>Date de la commande :</strong> " . htmlspecialchars($commande['date_commande']) . "</p>";

// Récupérer les produits associés à cette commande
$stmt_produits = $pdo->prepare("SELECT * FROM produits_commande WHERE commande_id = :commande_id");
$stmt_produits->bindParam(':commande_id', $id_commande, PDO::PARAM_INT);
$stmt_produits->execute();
$produits = $stmt_produits->fetchAll(PDO::FETCH_ASSOC);

echo "<h3>Produits commandés :</h3>";
echo "<ul>";
foreach ($produits as $produit) {
    echo "<li>";
    echo "<p><strong>Nom du produit :</strong> " . htmlspecialchars($produit['nom']) . "</p>";
    echo "<p><strong>Prix :</strong> " . htmlspecialchars($produit['prix']) . " €</p>";
    echo "<p><strong>Description :</strong> " . htmlspecialchars($produit['description']) . "</p>";
    echo "</li>";
}
echo "</ul>";

// Lien pour retourner à la page des commandes
echo "<p><a href='profile.php'>Retour à mes commandes</a></p>";
?>
