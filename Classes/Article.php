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