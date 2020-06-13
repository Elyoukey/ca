<?php
/* include bootstrap file */
include '../../bootstrap.php';

if (!$currentUser->isadmin){
    die('Admin only');
}


$id = (empty($_POST['id']))?0:(int)$_POST['id'];
$animal = new animal();
if($id){
    $animal->loadFromId($id);
}
$animal->name = $_POST['name'];
$animal->save();

?>