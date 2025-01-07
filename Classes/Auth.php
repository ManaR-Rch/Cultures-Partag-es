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
