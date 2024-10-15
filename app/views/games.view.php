<?php
class GamesView {
    private $user = null;
    public function __construct($user){
        $this->user = $user;
    }
    public function showHome($genre, $games){
        require 'templates/home.phtml';
    }
    public function showGame($game){
        require 'templates/game.phtml';
    }
}