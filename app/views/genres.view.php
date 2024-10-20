<?php

class GenresView {
    private $user = null;
    public function __construct($user){
        $this->user = $user;
    }

    public function showAddGenre($error = ''){
        require 'templates/add-genre.phtml';
    }
    public function showEditGenre($genre, $error = ''){
        require 'templates/edit-genre.phtml';
    }
}