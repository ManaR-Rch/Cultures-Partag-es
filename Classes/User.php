<?php

class User {
    private $db;
    private $table = 'users';

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($nom, $email, $password) {
        $query = "INSERT INTO {$this->table} (nom, email, password) VALUES (:nom, :email, :password)";
        $stmt = $this->db->prepare($query);
        
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        return $stmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':password' => $password_hash
        ]);
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