<?php
/* include bootstrap file */
include '../bootstrap.php';
if (!$currentUser->isadmin){
    die('Admin only');
}

$animalList = new animalsList();
$animalList->getAll();

$mainpage->variables['title'] = 'Liste des animaux';
$mainpage->variables['maincontent']     = $animalList->render();

/* render main page*/
echo $mainpage->render( );
?>