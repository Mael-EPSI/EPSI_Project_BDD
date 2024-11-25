<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column ;
        }
        .content {
            display: flex;
            flex-direction: column;
        }
        /* Conteneur principal */
        form {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
        }

        /* Titre */
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        table td {
            padding: 10px;
            vertical-align: middle;
        }

        /* Input fields */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #ddd 3s;
        }

        /* Liens */
        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3;
        }

        /* Message d'erreur */
        .error {
            color: #d9534f;
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Inscription</h2>
    <form action="..\actions\inscr_admin.php" method="post">
        <table>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td><input type="text" id="nom" name="nom" placeholder="Nom"></td>
            </tr>
            <tr>
                <td><label for="prenom">Prenom :</label></td>
                <td><input type="text" id="prenom" name="prenom" placeholder="Prénom"></td>
            </tr>
            <tr>
                <td><label for="email">Email :</label></td>
                <td><input type="text" id="email" name="email" placeholder="Prenom.nom@hotmail.com"></td>
            </tr>
            <tr>
                <td><label for="username">Nom d'utilisateur :</label></td>
                <td><input type="text" id="username" name="username" required placeholder="Pseudo"></td>
            </tr>
            <tr>
                <td><label for="password">Mot de passe :</label></td>
                <td><input type="password" id="password" name="password" required placeholder="Password"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="S'inscrire"></td>
            </tr>

        </table>
    </form>
    <p>Vous avez déjà un compte? <a href="connexion.php">Connectez-vous</a></p>
    <a href="gardien.php">Admin Connexion</a>
</body>
</html>
