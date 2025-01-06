<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php'); // Redirigez vers la page de connexion
    exit();
}
?>