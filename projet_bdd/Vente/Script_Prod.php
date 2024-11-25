<?php
$dsn = 'mysql:host=localhost;dbname=innogears;charset=utf8';
$username = 'root'; // Changez avec votre nom d'utilisateur MySQL
$password = ''; // Changez avec votre mot de passe MySQL
$targetDir = "../Vente/uploads/"; // Dossier où les images seront stockées

try {
    // Création de la connexion PDO
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['description']) && isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prix = $_POST['prix'];
            $description = $_POST['description'];

            // Gestion de l'image
            $fileName = basename($_FILES['image']['name']);
            $targetFilePath = $targetDir . $fileName;

            // Déplacer le fichier téléchargé vers le dossier cible
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                // Préparation de la requête d'insertion
                $stmt = $pdo->prepare("INSERT INTO produit (nom, prix, description, image_path) VALUES (:nom, :prix, :description, :image_path)");
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prix', $prix);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':image_path', $targetFilePath);

                if ($stmt->execute()) {
                    echo "Produit ajouté avec succès.";
                    echo "<a href=Accueil.php>Accueil</a>";
                } else {
                    echo "Erreur lors de l'ajout du produit.";
                }
            } else {
                echo "Erreur lors du déplacement de l'image.";
            }
        } else {
            echo "Veuillez remplir tous les champs et choisir une image valide.";
        }
    }
    
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
