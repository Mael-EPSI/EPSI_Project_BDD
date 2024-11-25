<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo '<p>Erreur : utilisateur non connecté. Veuillez vous connecter pour confirmer votre commande.</p>';
    echo '<a href="../../Login_Sign/connexion.php">Se connecter</a>'; // Lien vers la page de connexion
    exit;
}

if (isset($_SESSION['panier']) && count($_SESSION['panier']) > 0) {
    // Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=innogears', 'root', '');

    // Récupérer l'ID de l'utilisateur connecté
    $user_id = $_SESSION['user_id'];

    // Démarrer une transaction
    $pdo->beginTransaction();

    try {
        // Étape 1 : Insérer une nouvelle commande avec `user_id`
        $stmt = $pdo->prepare("INSERT INTO commandes (user_id) VALUES (:user_id)");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        // Obtenir l'ID de la commande créée
        $commande_id = $pdo->lastInsertId();

        // Étape 2 : Insérer chaque produit du panier dans `produits_commande`
        $stmt = $pdo->prepare("INSERT INTO produit_commande (commande_id, nom, prix, description, image_path) VALUES (:commande_id, :nom, :prix, :description, :image_path)");

        foreach ($_SESSION['panier'] as $produit) {
            $stmt->execute([
                ':commande_id' => $commande_id,
                ':nom' => $produit['nom'],
                ':prix' => $produit['prix'],
                ':description' => $produit['description'],
                ':image_path' => $produit['image_path']
            ]);
        }

        // Valider la transaction
        $pdo->commit();

        // Vider le panier après confirmation
        unset($_SESSION['panier']);

        echo '<p>Commande confirmée avec succès !</p>';
        echo '<a href="../Accueil.php">Retour à l\'accueil</a>';

    } catch (Exception $e) {
        // Annuler la transaction en cas d'erreur
        $pdo->rollBack();
        echo '<p>Erreur lors de la confirmation de la commande : ' . $e->getMessage() . '</p>';
    }
} else {
    echo '<p>Votre panier est vide. Impossible de confirmer la commande.</p>';
}
?>
