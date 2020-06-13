<?php
//define('MAIL_FROM','admin.ca@elyoukey.com');
define('MAIL_FROM','admin@animaleintuitive.com');

$headers = '';
$headers .= 'From: '.MAIL_FROM."\r\n";
$headers .= 'Reply-To: '.MAIL_FROM."\r\n" ;
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$message = 'activation du compte header';

$res = mail('lucas.lebielle@gmail.com','Activation de votre compte '.date('%d &m %H : %i : %s'), $message, $headers);

echo $res;
echo "<br/>";
echo time();