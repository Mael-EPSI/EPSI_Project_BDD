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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de l'utilisateur</title>
</head>
<body>
    <h1>Profil de <?php echo htmlspecialchars($utilisateur['Pseudo']); ?></h1>
    
    <p><strong>Nom :</strong> <?php echo htmlspecialchars($utilisateur['Pseudo']); ?></p>
    <p><strong>Email :</strong> <?php echo htmlspecialchars($utilisateur['Email']); ?></p>

    <a href="logout.php">Déconnexion</a>
</body>
</html>
