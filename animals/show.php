<?php
/* include bootstrap file */
include '../bootstrap.php';

$id = (empty($_GET['id']))?0:(int)$_GET['id'];
$animal = new animal();
if($id){
    $animal->loadFromId($id);
}

$mainpage->variables['title'] = 'Page animal';
$mainpage->variables['maincontent'] = $animal->render();


/* render main pqge*/
echo $mainpage->render( );
?>