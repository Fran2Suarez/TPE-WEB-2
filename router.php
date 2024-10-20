<?php
require_once "app/controllers/games.controller.php";
require_once "app/controllers/auth.controller.php";
require_once "app/controllers/genres.controller.php";
require_once "app/middleware/session.auth.middleware.php";
require_once "libs/response.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();

if (!empty($_GET["action"])){
    $action = $_GET["action"];
} else {
    $action = "home";
}

//    TABLA DE RUTEO
//    Action        Funcion
//    home          showHome()
//    game/:id   showGame($id)

$params = explode("/",$action);

switch ($params[0]) {
    case "home":
        sessionAuthMiddleware($res);
        $controller = new GamesController($res);
        if (empty ($params[1])) {
            $controller->showHome();
        }
        else {
            $controller->showGenres($params[1]);
        }
        break;
    case "game":
        sessionAuthMiddleware($res);
        $controller = new GamesController($res);
        $controller->showGame($params[1]);
        break;
    case "showLogin":
        $controller = new AuthController();
        $controller->showLogin(); 
        break;
    case "login":
        $controller = new AuthController();
        $controller->login(); 
        break;
    case "logout":
        $controller = new AuthController();
        $controller->logout(); 
        break;
    case "showAddGame":
        sessionAuthMiddleware($res);
        $controller = new GamesController($res);
        $controller->showAddGame();
        break;
    case "addGame":
        $controller = new GamesController($res);
        $controller->addGame();
        break;
    case "deleteGame":
        $controller = new GamesController($res);
        $controller->deleteGame($params[1]);
        break;
    case "editGame":
        $controller = new GamesController($res);
        $controller->editGame($params[1]);
        break;
    case "showAddGenre":
        sessionAuthMiddleware($res);
        $controller = new GenresController($res);
        $controller->showAddGenre();
        break;
    case "addGenre":
        $controller = new GenresController($res);
        $controller->addGenre();
        break;
    case "deleteGenre":
        $controller = new GamesController($res);
        $controller->deleteGenre($params[1]);
        break;
    case "editGenre":
        $controller = new GenresController($res);
        $controller->editGenre($params[1]);
        break;
    case "showEditGame":
        sessionAuthMiddleware($res);
        $controller = new GamesController($res);
        $controller->showEditGame($params[1]);
        break;
    case "showEditGenre":
        sessionAuthMiddleware($res);
        $controller = new GenresController($res);
        $controller->showEditGenre($params[1]);
        break;
    default:
        echo "Error 404 Page Not Found";
        break;
}
