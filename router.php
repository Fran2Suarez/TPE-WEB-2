<?php
require_once "app/controllers/games.controller.php";


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if (!empty($_GET["action"])){
    $action = $_GET["action"];
} else {
    $action = "home";
}

//**
//    TABLA DE RUTEO
//    Action        Funcion
//    home          showHome()
//    game/:id   showGame($id)

$params = explode("/",$action);

switch ($params[0]) {
    case "home":
        $controller = new GamesController();
        $controller->showHome();
        break;
    default:
        echo "Error 404 Page Not Found";
        break;
}
