<?php
/* include bootstrap file */
include '../../bootstrap.php';

if (!$currentUser->isadmin){
    die('Admin only');
}

var_Dump($_POST);

$id = (empty($_POST['id']))?0:(int)$_POST['id'];
$animal = new animal();
if($id){
    $animal->loadFromId($id);
}else{
    $animal = new animal();
}

// save name
$animal->name = filter_var( $_POST['name'], FILTER_SANITIZE_STRING );
$animal->status = (!empty($_POST['status']))? filter_var( $_POST['status'], FILTER_SANITIZE_NUMBER_INT ):0;

//save image
if( !empty($_FILES["imageFile"]["tmp_name"])){
    $target_dir = FILE_PATH.'/images/animals/'.$animal->hash;

    if( !is_dir($target_dir ) ) {
        mkdir($target_dir);
    }
    $target_file = $target_dir . '/image_full.jpg';

    if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imageFile"]["name"]). " has been uploaded.";
    } else {
        $_SESSION['messages'][] ='Erreur lors de la sauvegarde de l\'image';
    }
}

$animal->save();

$_SESSION['messages'][] ='Données sauvegardées';
if($id) {
    header('Location: ' . BASE_PATH . '/animals/show.php?id=' . $animal->id);
}else{
    header('Location: ' . BASE_PATH . '/animals/index.php');
}
?>