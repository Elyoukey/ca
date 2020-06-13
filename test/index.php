<?php
/* include bootstrap file */
include '../bootstrap.php';

$testprotocole = new testprotocole();

$mainpage->variables['title'] = 'Page de test';
$mainpage->variables['maincontent']     = $testprotocole->renderTest();

/* render main page*/
echo $mainpage->render_1_Column( );
?>