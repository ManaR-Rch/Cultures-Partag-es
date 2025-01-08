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
    public function login($user_id) {
      $_SESSION['user_id'] = $user_id;
  }
  public function login($user_id) {
    $_SESSION['user_id'] = $user_id;
}
public function login($user_id) {
  $_SESSION['user_id'] = $user_id;
}
public function logout() {
  session_unset();
  session_destroy();
}

public function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
public function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
public function requireLogin() {
  if (!$this->isLoggedIn()) {
      header('Location: http://localhost/Cultures-partag-es/Auth/sign-in.php');
      exit();
  }
}