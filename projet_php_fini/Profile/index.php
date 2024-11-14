<!-- index.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0 auto;
            border-collapse: collapse;
            width: 300px; /* Limiter la largeur du tableau */
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 300px; /* Limiter la largeur du tableau */

        .content{
            margin: 0 auto;
            border-collapse: collapse;
            width: 300px; /* Limiter la largeur du tableau */
        }    
        }
        td {
            padding: 10px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
        }
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            background-color: #4CAF50; /* Couleur de fond pour le bouton */
            color: white; /* Couleur du texte */
            border: none; /* Pas de bordure */
            cursor: pointer; /* Changement de curseur pour le bouton */
        }
        input[type="submit"]:hover {
            background-color: #45a049; /* Couleur de fond lorsque la souris est dessus */
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Connexion</h2>
    <div class="content">
    <form action="login.php" method="post">
        <label for="email">Email :</label>
        <input type="text" id="email" name="username" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Se connecter">
    </form>
    </div>
</body>
</html>
