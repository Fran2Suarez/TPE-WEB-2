<?php
class GamesModel{
    private $db;
    public function __construct(){
        $this->db = new PDO ('mysql:host=localhost;dbname=db-skibidigames;charset=utf8', 'root', '');
    }
    public function getGames(){
        $query = $this->db->prepare ('SELECT * FROM games');
        $query->execute ();
        $games = $query->fetchAll(PDO:: FETCH_OBJ);
        return $games;
    }
}