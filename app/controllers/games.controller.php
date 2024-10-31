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
    public function showAddGame() {
        $genre = $this->modelGenre->getGenres();
        return $this->view->showAddGame($genre);
    }
    public function showEditGame($id) {
        $game = $this->model->getGameById($id);
        $genre = $this->modelGenre->getGenres();
        return $this->view->showEditGame($game, $genre);
    }
    public function addGame(){
        if (!isset($_POST['title']) || empty($_POST['title'])) {
            return $this->view->showAddGame($genre,'Falta completar el titulo');
        }
    
        if (!isset($_POST['description']) || empty($_POST['description'])) {
            return $this->view->showAddGame($genre,'Falta completar la descripcion');
        }

        if (!isset($_POST['image']) || empty($_POST['image'])) {
            return $this->view->showAddGame($genre,'Falta completar la imagen');
        }
    
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $description = $_POST['description'];
        $image = $_POST['image'];
    
        $id = $this->model->addGame($title, $genre, $description, $image);

        header('Location: ' . BASE_URL);
    }
    public function deleteGame($id){
        $games = $this->model->getGames();
        $genre = $this->modelGenre->getGenres();
        $game = $this->model->getGameById($id);
        if (!$game) {
            $this->view->showHome($games,$genre,'No existe el juego');
        }

        $this->model->deleteGame($id);
        header('Location: ' . BASE_URL);
    }
    public function editGame($id){
        $game = $this->model->getGameById($id);
        $genre = $this->modelGenre->getGenres();

        if (!isset($_POST['title']) || empty($_POST['title'])) {
            return $this->view->showEditGame($genre,$game,'Falta completar el titulo');
        }
    
        if (!isset($_POST['description']) || empty($_POST['description'])) {
            return $this->view->showEditGame($genre,$game,'Falta completar la descripcion');
        }

        if (!isset($_POST['image']) || empty($_POST['image'])) {
            return $this->view->showEditGame($temps,$cap,'Falta completar la imagen');
        }
    
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $description = $_POST['description'];
        $image = $_POST['image'];
    
        $this->model->editGame($title, $genre, $description, $image,$id);

        header('Location: ' . BASE_URL);
    }
    public function deleteGenre($id){
        $games = $this->model->getGames();
        $genre = $this->modelGenre->getGenres();
        if (!$genre) {
            $this->view->showHome($genre, $games,'No existe el juego');
        }

        $this->modelGenre->deleteGenre($id);
        header('Location: ' . BASE_URL);
    }
}
