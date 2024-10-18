<?php
class GenreModel{
    private $db;
    public function __construct(){
        $this->db = new PDO ('mysql:host=localhost;dbname=db-skibidigames;charset=utf8', 'root', '');
    }
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
}