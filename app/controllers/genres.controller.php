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
    public function addGenre(){
        if (!isset($_POST['genre']) || empty($_POST['genre'])) {
            return $this->view->showAddGenre('Falta completar el genero');
        }
    
        $genre = $_POST['genre'];
        $id = $this->model->addGenre($genre);

        header('Location: ' . BASE_URL);
    }
    public function editGenre($id){
        $genre = $this->model->getGenreById($id);

        if (!isset($_POST['genre']) || empty($_POST['genre'])) {
            return $this->view->showEditGenre($genre,'Falta completar el genero');
        }

    
        $genre = $_POST['genre'];

        $this->model->editGenre($genre,$id);

        header('Location: ' . BASE_URL);
    }
}