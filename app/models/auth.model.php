<?php
class AuthModel {
    private $db;
    public function __construct(){
        $this->db = new PDO ('mysql:host=localhost;dbname=db-skibidigames;charset=utf8', 'root', '');
    }
    public function getUserByName($id){
        $query = $this->db->prepare ('SELECT * FROM users WHERE user = ?');
        $query->execute([$id]);
        $user = $query->fetch(PDO:: FETCH_OBJ);
        return $user;
    }
}