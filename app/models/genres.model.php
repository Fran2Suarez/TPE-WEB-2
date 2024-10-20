<?php
require_once "./app/models/model.php";
class GenreModel extends Model{
    public function getGenres() {
        $query = $this->db->prepare ('SELECT * FROM genre');
        $query->execute ();
        $genre = $query->fetchAll(PDO:: FETCH_OBJ);
        return $genre;
    }
    public function getGenreById($id){
        $query = $this->db->prepare ('SELECT * FROM genre  WHERE id_genre = ?');
        $query->execute([$id]);
        $genre = $query->fetchAll(PDO:: FETCH_OBJ);
        return $genre;
    }
    public function addGenre($genre) { 
        $query = $this->db->prepare('INSERT INTO genre(genre_name) VALUES (?)');
        $query->execute([$genre]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }
    public function deleteGenre($id){
        $query = $this->db->prepare('DELETE FROM genre WHERE id_genre = ?');
        $query->execute([$id]);
    }
    public function editGenre($genre,$id){
        $query = $this->db->prepare('UPDATE genre SET genre_name = ? WHERE id_genre = ?');
        $query->execute([$genre, $id]);
    }
}