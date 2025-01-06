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
     
    // Méthode pour mettre à jour un article
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

    // Méthode pour supprimer un article
    public function deleteArticle($id) {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    // Méthode pour récupérer un article par son ID
    public function getArticleById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateStatus($id, $statut) {
        $query = "UPDATE {$this->table} SET statut = :statut WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':statut' => $statut
        ]);
    }

    public function getArticlesByCategory($category_id, $page = 1, $limit = 10) {
        $offset = ($page - 1) * $limit; 
        $query = "SELECT a.*, u.nom as author_name, c.nom as category_name 
                 FROM {$this->table} a
                 JOIN users u ON a.user_id = u.id
                 JOIN categories c ON a.category_id = c.id
                 WHERE a.category_id = :category_id AND a.statut = 'publié'
                 LIMIT :limit OFFSET :offset";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLatestArticles($limit = 5) {
        $query = "SELECT a.*, u.nom as author_name, c.nom as category_name 
                 FROM {$this->table} a
                 JOIN users u ON a.user_id = u.id
                 JOIN categories c ON a.category_id = c.id
                 WHERE a.statut = 'publié'
                 ORDER BY a.id DESC LIMIT :limit";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPendingArticles() {
        $query = "SELECT a.*, u.nom as author_name, c.nom as category_name 
                 FROM {$this->table} a
                 JOIN users u ON a.user_id = u.id
                 JOIN categories c ON a.category_id = c.id
                 WHERE a.statut IS NULL";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPublishedArticlesByCategory($category_id) {
        $query = "SELECT a.*, u.nom as author_name, c.nom as category_name 
                  FROM article a
                  JOIN users u ON a.user_id = u.id
                  JOIN categories c ON a.category_id = c.id
                  WHERE a.statut = 'publié' AND a.category_id = :category_id
                  ORDER BY a.id DESC";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute([':category_id' => $category_id]);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
