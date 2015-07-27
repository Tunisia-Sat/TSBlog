<?php

// Checking if visitor is connected
$connected = false;
$is_admin = false;

if ( !empty($_SESSION['member'])) {
	$connected = true;
	$stmt = $PDO->prepare('SELECT members_id FROM admins WHERE id=1');
	$stmt->execute();
	$rslt = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt->closeCursor();
	$members_id = explode(',', $rslt['members_id']);
	if ( in_array($_SESSION['member']['id'], $members_id) )
		$is_admin = true; // Visitor is an admin
}

// Global settings
error_reporting(0);

// Define path
define( 'PATH', '/TSBlog/' ); // Default : "/"

// Gettings configs
$stmt = $PDO->prepare('SELECT * FROM config WHERE id=1');
$stmt->execute();
$rslt = $stmt->fetch(PDO::FETCH_ASSOC);
$stmt->closeCursor();

define( 'MAX_SIZE_PICTURE', $rslt['maxsize'] ); // Limit of file's size 4 Mo
define( 'SITE_NAME', $rslt['sitename'] ); // Site name
define( 'PHONE_NUMBER', $rslt['phonenumber'] ); // Your phone number
define ('EMAIL_ADRESS', $rslt['email'] ); // Email adress
define('ABOUT', $rslt['aboutme'] ); // About me

// List of months
$mois = array('01'=>$lang15,
              '02'=>$lang16,
			  '03'=>$lang17,
			  '04'=>$lang18,
			  '05'=>$lang19,
			  '06'=>$lang20,
			  '07'=>$lang21,
			  '08'=>$lang22,
			  '09'=>$lang23,
			  '10'=>$lang24,
			  '11'=>$lang25,
			  '12'=>$lang26); 

?>