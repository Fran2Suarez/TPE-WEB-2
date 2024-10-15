<?php
require_once './app/views/games.view.php';
require_once './app/models/games.model.php';
require_once './app/models/genres.model.php';

class GamesController {
    private $view;
    private $model;
    private $modelGenre;
    public function __construct($res){
        $this->view = new GamesView($res->user);
        $this->model = new GamesModel();
        $this->modelGenre = new GenreModel();
    }
    public function showHome(){
        $games = $this->model->getGames();
        $genre = $this->modelGenre->getGenres();
        return $this->view->showHome($genre, $games);
    }
    public function showGame($id){
        $game = $this->model->getGameById($id);
        return $this->view->showGame($game);
    }
    public function showGenres($id){
        $games = $this->model->getGameXGenre($id);
        $genre = $this->modelGenre->getGenres();
        return $this->view->showHome($genre, $games);
    }

}