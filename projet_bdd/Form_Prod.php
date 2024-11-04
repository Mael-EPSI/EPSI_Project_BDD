<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Ajout Produit</title>
</head>
<body>
    <h1>Formulaire Produit</h1>
    <form action="Vente\Script_Prod.php" method="post" enctype="multipart/form-data"> <!-- Ajout de l'attribut enctype -->
        <label for="nom">Nom du produit:</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="image">Choisissez une image :</label>
        <input type="file" name="image" id="image" required><br><br>

        <label for="prix">Prix du produit:</label>
        <input type="number" id="prix" name="prix" required><br><br>

        <label for="description">Description du produit:</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>
