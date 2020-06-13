# ca
Code for the animal communication testing site

Installation:
setup your web server and add a settings.php file with your db access

    <?php
    /*
     * Initialize db connection
     */
    global $db;
    
    $db = new mysqli('localhost', 'yourname', 'yourpassword', 'yourdb');
    if ($db->connect_error) {
       die('Erreur de connexion (' . $db->connect_errno . ') '
            . $db->connect_error);
    }
    $sql ="SET NAMES utf8;";
    $db->query($sql);
    
    ?>
