<?php
class GamesView {
    public function showHome($games){
        require 'templates/home.phtml';
    }
    public function showGame($game){
        require 'templates/game.phtml';
    }
}