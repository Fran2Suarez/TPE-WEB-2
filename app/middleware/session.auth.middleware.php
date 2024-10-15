<?php
    function sessionAuthMiddleware($res) {
        session_start();
        if(isset($_SESSION['ID_USER'])){
            $res->user = new stdClass();
            $res->user->id_user = $_SESSION['ID_USER'];
            $res->user->user = $_SESSION['USER_USER'];
            return;
        }
    }
?>