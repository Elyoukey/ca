<?php

class testprotocole
{
    function renderTest(){

        ob_start();
        include __DIR__.'/../templates/testprotocole.tpl.php';
        return ob_get_clean();
    }

    function renderResults(){

    }
}
?>