<?php
require_once './app/views/genres.view.php';
require_once './app/models/genres.model.php';

class GenresController {
    private $view;
    private $model;

    public function __construct($res){
        $this->view = new GenresView($res->user);
        $this->model = new GenreModel();
    }
    public function showAddGenre() {
        return $this->view->showAddGenre();
    }
    public function showEditGenre($id) {
        $genre = $this->model->getGenreById($id);
        return $this->view->showEditGenre($genre);
    }
}