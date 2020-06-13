<?php

/* include bootstrap file */
include '../../bootstrap.php';

if( !$currentUser->id ){
    header('Location: '.BASE_PATH);
    http_response_code(401);
    die();
}

$animal = new animal();
$animal->loadRandom();

echo json_encode($animal);
