<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion </title>
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
    <div class="content">
        <?php if (isset($_GET['erreur'])) { ?>
            <p class="error">Erreur lors de la connexion!</p>
        <?php } ?>
        <h2>Connexion</h2>
        <form action="../actions/login.php" method="post"> <!-- Utiliser / au lieu de \ pour la compatibilité avec les serveurs -->
            <table>
                <tr>
                    <td><label for="username">Nom d'utilisateur:</label></td>
                    <td><input type="text" id="username" name="username" required placeholder="Pseudo"></td>
                </tr>
                <tr>
                    <td><label for="password">Mot de passe:</label></td>
                    <td><input type="password" id="password" name="password" required placeholder="Password"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Se connecter"></td>
                </tr>
            </table>
        </form>
        <a href="inscription.php">S'inscrire</a>

        <a href="gardien.php">Admin Connexion</a>
    </div>
</body>
</html>
