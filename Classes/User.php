<?php
require_once 'Mailer.php'; // Inclure la classe Mailer

class User {
    private $db;
    private $table = 'users';
    private $mailer; // Ajouter une propriété pour Mailer

    public function __construct($db, $mailer = null) {
        $this->db = $db;
        $this->mailer = $mailer; // Injecter une instance de Mailer
    }

    public function register($nom, $email, $password, $role) {
        $query = "INSERT INTO {$this->table} (nom, email, password, role) VALUES (:nom, :email, :password, :role)";
        $stmt = $this->db->prepare($query);

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $result = $stmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':password' => $password_hash,
            ':role' => $role
        ]);

        // Envoyer un e-mail de bienvenue si l'inscription réussit
        if ($result && $this->mailer) {
            try {
                $this->mailer->sendWelcomeEmail($email, $nom, $role);
            } catch (Exception $e) {
                // Gérer l'erreur (par exemple, journaliser l'erreur)
                error_log("Erreur lors de l'envoi de l'e-mail : " . $e->getMessage());
            }
        }

        return $result;
    }
    public function login($email, $password) {
        $query = "SELECT * FROM {$this->table} WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
    public function getAllUsers() {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
 
}
?>