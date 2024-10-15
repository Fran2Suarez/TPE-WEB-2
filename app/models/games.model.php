<?php
class GamesModel{
    private $db;
    public function __construct(){
        $this->db = new PDO ('mysql:host=localhost;dbname=db-skibidigames;charset=utf8', 'root', '');
    }
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
}
