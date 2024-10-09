<?php
require_once './app/views/games.view.php';
require_once './app/models/games.model.php';

class GamesController {
    private $view;
    private $model;
    public function __construct(){
        $this->view = new GamesView();
        $this->model = new GamesModel();
    }
    public function showHome(){
        $games = $this->model->getGames();
        return $this->view->showHome($games);
    }
}