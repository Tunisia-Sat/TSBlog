<?php

// Page title
define( 'PAGE_TITLE', $lang89 );

// Checking permission
require_once "config/adminCheck.php";

// Getting configs
$stmt = $PDO->prepare('SELECT * FROM config WHERE id=1');
$stmt->execute();
$rslt = $stmt->fetchAll();
$stmt->closecursor();

// Updating configs ...
if ( $_POST ) {
	$sitename = $_POST['sitename'];
	$maxsize = $_POST['maxsize'];
	$phonenumber = $_POST['phonenumber'];
	$email = $_POST['email'];
	$aboutme = $_POST['aboutme'];
	
	$error = true;
	if ( !empty($sitename) ) {
		$stmt = $PDO->prepare('UPDATE config SET sitename=:sitename WHERE id=1');
		$stmt->bindParam(':sitename', $sitename, PDO::PARAM_STR);
		$stmt->execute();
		$stmt->closecursor();
		$error = false;
	}
	if ( filter_var($email, FILTER_VALIDATE_EMAIL ) ) {
		$stmt = $PDO->prepare('UPDATE config SET email=:email WHERE id=1');
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->execute();
		$stmt->closecursor();
		$error = false;
	}
	if ( is_numeric($maxsize) ) {
		$stmt = $PDO->prepare('UPDATE config SET maxsize=:maxsize WHERE id=1');
		$stmt->bindParam(':maxsize', $maxsize, PDO::PARAM_STR);
		$stmt->execute();
		$stmt->closecursor();
		$error = false;
	}
	if ( is_numeric($phonenumber) ) {
		$stmt = $PDO->prepare('UPDATE config SET phonenumber=:phonenumber WHERE id=1');
		$stmt->bindParam(':phonenumber', $phonenumber, PDO::PARAM_INT);
		$stmt->execute();
		$stmt->closecursor();
		$error = false;
	}
	if ( !empty($aboutme) ) {
		$stmt = $PDO->prepare('UPDATE config SET aboutme=:aboutme WHERE id=1');
		$stmt->bindParam(':aboutme', $aboutme, PDO::PARAM_STR);
		$stmt->execute();
		$stmt->closecursor();
		$error = false;
	}
	
	if ( $error ) 
		echo '<div class="error">'.$lang99.'</div>';
	else {
		echo '<div class="success">'.$lang117.'</div>';
		$load_views = false;
	}
}

// Load views
if ( $load_views )
	require_once 'views/view_config.html';

?>