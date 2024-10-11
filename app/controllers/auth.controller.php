<?php
require_once './app/views/auth.view.php';
class AuthController {

    private $view;
    public function __construct() {
        $this->view = new AuthView();
     }
    public function showLogin() {
        return $this->view->showLogin();
    }
}