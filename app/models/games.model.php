<?php
require_once "./app/models/model.php";
class GamesModel extends Model{
    public function getGames(){
        $query = $this->db->prepare ('SELECT * FROM games INNER JOIN genre ON games.id_genre = genre.id_genre');
        $query->execute ();
        $games = $query->fetchAll(PDO:: FETCH_OBJ);
        return $games;
    }
    public function getGameById($id){
        $query = $this->db->prepare ('SELECT * FROM games INNER JOIN genre ON games.id_genre = genre.id_genre WHERE games.id = ?');
        $query->execute([$id]);
        $game = $query->fetchAll(PDO:: FETCH_OBJ);
        return $game;
    }
    public function getGameXGenre($id){
        $query = $this->db->prepare ('SELECT * FROM games INNER JOIN genre ON games.id_genre = genre.id_genre WHERE genre.id_genre = ?');
        $query->execute([$id]);
        $genre = $query->fetchAll(PDO:: FETCH_OBJ);
        return $genre;
    }
    public function addGame($title, $genre, $description, $image) { 
        $query = $this->db->prepare('INSERT INTO games(title, id_genre, description, image) VALUES (?, ?, ?, ?)');
        $query->execute([$title, $genre, $description, $image]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }

    public function deleteGame($id){
        $query = $this->db->prepare('DELETE FROM games WHERE id = ?');
        $query->execute([$id]);
    }

    public function editGame($title,$genre,$description,$image,$id){
        $query = $this->db->prepare('UPDATE games SET title = ?,  id_genre = ?, description = ?, image = ? WHERE id = ?');
        $query->execute([$title, $genre, $description, $image, $id]);
    }
}
