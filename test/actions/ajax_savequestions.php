<?php

/* include bootstrap file */
include '../../bootstrap.php';

if( !$currentUser->id ){
    header('Location: '.BASE_PATH);
    http_response_code(401);
    die();
}

var_Dump($_POST);
if(empty($_POST['q']))die();

$animal = new animal();
$animal->loadFromHash( filter_var( $_POST['animal_hash'], FILTER_SANITIZE_STRING) );

foreach($_POST['q'] as $question => $answer){
    $a = new answer();

    $row = array(
        'id'=> null,
        'question_id' => $question,
        'answer' => $answer,
        'user_id'=>$currentUser->id,
        'animal_id'=>$animal->id
    );
    $a->loadFromRow($row);
    $a->save();
}



