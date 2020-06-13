<?php
/**/
include '../../bootstrap.php';

$name = filter_var( $_POST['name'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$userhash = filter_var( $_POST['hash'], FILTER_SANITIZE_STRING);
$email = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);
$password = user_hash_password( $_POST['password'],5 );

/* Test fields */
if( !$name || !$email || !$password ){
    $_SESSION['messages'][] = 'Tous les champs sont obligatoires';
    header('Location: '.BASE_PATH.'/user/newaccount.php');
}

/* Save account */
$user = new user();
$user->loadFromHash( $userhash );

$user->name = $name;
$user->email = $email;
$user->password = $password;
$user->status = 0;
$user->hash = md5( $name.$email.time() );
$res = $user->saveNew();
if( !$res ){
    $_SESSION['messages'][] = 'Impossible de créer ce compte, 
    nom d\'utilisateur ou adresse email déja utilisé.';
    header('Location: '.BASE_PATH);
    die();
}

$user->id = $db->insert_id;
$user->save();

//send email
$link = BASE_PATH.'/user/actions/validateaccount.php?hash='.$user->hash;
$message = 'Pour activer votre compte vous pouvez cliquer sur ce lien:  <br/>'."\n\r".'<a href="'.$link.'">'.$link.'</a>';

// In case any of our lines are larger than 70 characters, we should use wordwrap()
//$message = wordwrap($message, 70, "\r\n");

$headers = '';
$headers .= 'From: '.MAIL_FROM."\r\n";
$headers .= 'Reply-To: '.MAIL_FROM."\r\n" ;
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$res = mail($user->email,'Activation de votre compte sur AnimaleIntuitive', $message, $headers);

$_SESSION['messages'][] = 'Votre compte <strong>'.$user->name.'</strong> a été créé.

Un mail vous a été envoyé. 

Merci de cliquer sur le lien qu\'il contient pour activer votre compte.

Ce mail peut mettre quelques minutes à arriver.

Vérifiez bien dans vos spam.';

header('Location: '.BASE_PATH);

?>