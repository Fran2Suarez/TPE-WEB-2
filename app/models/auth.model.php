<?php
require_once "./app/models/model.php";
class AuthModel extends Model{
    public function getUserByName($id){
        $query = $this->db->prepare ('SELECT * FROM users WHERE user = ?');
        $query->execute([$id]);
        $user = $query->fetch(PDO:: FETCH_OBJ);
        return $user;
    }
}