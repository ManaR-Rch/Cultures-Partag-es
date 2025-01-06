<?php

class Article {
    private $db;
    private $table = 'article';

    public function __construct($db) {
        $this->db = $db;
    }

    // Méthode pour créer un article
    public function create($titre, $contenu, $user_id, $category_id, $image = null) {
        $query = "INSERT INTO {$this->table} (titre, contenu, user_id, category_id, image) 
                 VALUES (:titre, :contenu, :user_id, :category_id, :image)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':titre' => $titre,
            ':contenu' => $contenu,
            ':user_id' => $user_id,
            ':category_id' => $category_id,
            ':image' => $image
        ]);
    }
    public function updateArticle($id, $titre, $contenu, $category_id, $image = null) {
        $query = "UPDATE {$this->table} 
                  SET titre = :titre, contenu = :contenu, category_id = :category_id, image = :image 
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':titre' => $titre,
            ':contenu' => $contenu,
            ':category_id' => $category_id,
            ':image' => $image
        ]);
    }
    public function updateArticle($id, $titre, $contenu, $category_id, $image = null) {
        $query = "UPDATE {$this->table} 
                  SET titre = :titre, contenu = :contenu, category_id = :category_id, image = :image 
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':titre' => $titre,
            ':contenu' => $contenu,
            ':category_id' => $category_id,
            ':image' => $image
        ]);
    }
    public function deleteArticle($id) {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
    public function deleteArticle($id) {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
