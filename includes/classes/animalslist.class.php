<?php

require_once "animalslist.class.php";

class animalslist
{
    var $animals;

    function __construct()
    {

    }

    function getAll($limit = '')
    {
        global $db;
        $sql = "SELECT * FROM animals ORDER BY name   ";

        if (!$result = $db->query($sql)) {
            // to get the error information
            echo "Error: erreur dans la requete de liste d'animaux \n";
            exit;
        }
        while ($animal = $result->fetch_assoc()) {
            $this->animals[] = $animal;
        }
    }


    function getRandomList(){
        global $db;
        $sql = "SELECT * FROM animals ORDER BY RAND() LIMIT 0,20  ";

        if (!$result = $db->query($sql)) {
            // to get the error information
            echo "Error: erreur dans la requete de liste aléatoire d'animaux \n";
            exit;
        }
        while ($animal = $result->fetch_assoc()) {
            $this->animals[] = $animal;
        }
    }

    function render(){
        global $currentUser;
        ob_start();
        include __DIR__.'/../templates/animalslist.tpl.php';
        return ob_get_clean();
    }
}

?>