<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="gardien.css">
</head>
<body>
    <div class="Gardien">
        <h2>Connexion Admin</h2>
        <form action="../actions/gardin_verif.php" method="POST">
            <label for="nom">Pseudo :</label>
            <input type="text" id="nom" name="nom" required placeholder="Pseudo">

            <label for="mdp">Mot de passe :</label>
            <input type="password" id="password" name="password" required placeholder="Password">

            <input type="submit" value="Valider">
        </form>
        </form>
    </div>
</body>
</html>