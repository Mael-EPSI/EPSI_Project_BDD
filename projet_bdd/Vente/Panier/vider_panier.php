<?php
session_start();

// Vider le panier en réinitialisant la variable de session
unset($_SESSION['panier']);

header('Location: panier.php');
exit;
?>
