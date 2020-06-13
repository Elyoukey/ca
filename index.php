<?php
/* include bootstrap file */
include './bootstrap.php';

/* load homepage blocks*/


/**/

/**/
$mainpage->variables['title'] = 'Communication animale';
$mainpage->variables['page-type'] = 'home';

/**/
$mainpage->variables['center-column'] = '';
$mainpage->variables['left-column']   = '';
$mainpage->variables['right-column']  = '';



/* render main pqge*/
echo $mainpage->render( );
?>

