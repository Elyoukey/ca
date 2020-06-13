<?php
/* include bootstrap file */
include '../bootstrap.php';
if (!$currentUser->isadmin){
    die('Admin only');
}

$id = (empty($_GET['id']))?0:(int)$_GET['id'];
$animal = new animal();
if($id){
    $animal->loadFromId($id);
}

$mainpage->variables['title'] = 'Page animal';
$mainpage->variables['maincontent'] = $animal->renderForm();


/* render main pqge*/
echo $mainpage->render( );
?>