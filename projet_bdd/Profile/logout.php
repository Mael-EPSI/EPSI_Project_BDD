<?php
// logout.php

session_start(); // Démarre la session si elle n'est pas déjà démarrée

// Supprime toutes les variables de session
session_unset();

// Détruit la session
session_destroy();

// Redirige l'utilisateur vers la page de connexion (ou la page d'accueil)
header("Location: ../Vente/Accueil.php");
exit();
?>
