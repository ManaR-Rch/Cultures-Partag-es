<?php
class Auth {
    // Démarrer la session
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_set_cookie_params([
                'lifetime' => 3600,
                'path' => '/',
                'domain' => 'localhost',
                'secure' => false,
                'httponly' => true,
                'samesite' => 'Strict'
            ]);
            session_start();
        }
    }

    // Connecter l'utilisateur
    public function login($user_id) {
        $_SESSION['user_id'] = $user_id;
    }

    // Déconnecter l'utilisateur
    public function logout() {
        session_unset();
        session_destroy();
    }

    // Vérifier si l'utilisateur est connecté
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    // Rediriger si l'utilisateur n'est pas connecté
    public function requireLogin() {
        if (!$this->isLoggedIn()) {
            header('Location: http://localhost/Cultures-partag-es/Auth/sign-in.php');
            exit();
        }
    }

    // Vérifier si l'utilisateur est admin
    public function requireAdmin() {
        $this->requireLogin(); // Vérifie d'abord si l'utilisateur est connecté
        if ($_SESSION['role'] !== 'admin') {
            header('Location: http://localhost/Cultures-partag-es/Auth/sign-in.php');
            exit();
        }
    }
}
?>