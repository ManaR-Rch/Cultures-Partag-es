<?php

class Category {
    private $db;
    private $table = 'categories';

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($nom, $description) {
        $query = "INSERT INTO {$this->table} (nom, description) VALUES (:nom, :description)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':nom' => $nom,
            ':description' => $description
        ]);
    }
}