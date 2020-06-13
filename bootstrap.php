<?php
session_start();
/*
 * Initialize Base path
 * */
setlocale(LC_ALL, 'fr_FR');
define('BASE_PATH','http://localhost.zet/'); //without ending slash
define('FILE_PATH','/www');

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

/* 
 * Mail configuration 
 *  */
define('MAIL_FROM','admin@animaleintuitive.com');

/*
    include db connection
*/
include('settings.php');

/* honeypot protection*/
include('includes/honeypot.php');


/*
 * load classes
 * */
include('includes/classes/mainpage.class.php');
include('includes/classes/menu.class.php');
include('includes/classes/footer.class.php');
include('includes/classes/block.class.php');
include('includes/classes/user.class.php');
include('includes/classes/hash.class.php');
include('includes/classes/testprotocole.class.php');
include('includes/classes/question.class.php');
include('includes/classes/questionslist.class.php');
include('includes/classes/answers.class.php');

include('includes/classes/animal.class.php');
include('includes/classes/animalslist.class.php');

include('includes/password/password.inc');
include('includes/grid.php');
//

/* clean old hashes */
hash::clean();

/*
 * Initialize user session
 * */
$currentUser = new user();
if( !empty($_SESSION['userhash']) ){
    $currentUser->loadFromHash( $_SESSION['userhash'] );
}

/*
 * Load main page with default content
 * */
/* load main page */
$mainpage   = new mainpage();
/* load top menu */
$menu       = new menu();
/* load left blocks */

$leftblock  = new block();
$leftblock->variables['title'] = 'Acces';
$leftblock->variables['classes'] = 'login';
$leftblock->variables['content'] = $currentUser->renderLogin();


/* load footer */
$footer     = new footer();

$content = 'Cette page est vide, merci de rempliur la variable $mainpage->variables[\'maincontent\'] ';

/* default page fill */
$mainpage->variables['block_menu']      = $menu->render();
$mainpage->variables['blocks_left']      = $leftblock->render();
$mainpage->variables['maincontent']     = $content;
$mainpage->variables['blocks_footer']    = $footer->render();

?>