<?php

class GenresView {
    private $user = null;
    public function __construct($user){
        $this->user = $user;
    }

    public function showAddGenre(){
        require 'templates/add-game.phtml';
    }
    public function showEditGenre($genre){
        require 'templates/edit-genre.phtml';
    }
}