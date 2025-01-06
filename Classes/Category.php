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

    public function update($id, $nom, $description) {
        $query = "UPDATE {$this->table} SET nom = :nom, description = :description WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':description' => $description
        ]);
    }
    public function delete($id) {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}