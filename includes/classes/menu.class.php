<?php
class menu{

    function render(){
        global $currentUser;
        $request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

        ob_start();
        include __DIR__.'/../templates/menu.tpl.php';
        return ob_get_clean();
    }
}