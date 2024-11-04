<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 300px;
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
    </style>
</head>
<body>
    <h2>Inscription</h2>
    <form action="actions\inscr_admin.php" method="post">
        <table>
            <tr>
                <td><label for="username">Nom d'utilisateur:</label></td>
                <td><input type="text" id="username" name="username" required></td>
            </tr>
            <tr>
                <td><label for="password">Mot de passe:</label></td>
                <td><input type="password" id="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="S'inscrire"></td>
            </tr>
        </table>
    </form>
</body>
</html>
