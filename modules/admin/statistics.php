<?php

// Page title
define( 'PAGE_TITLE', $lang90 );

// Checking permission
require_once "config/adminCheck.php";

$stmt=$PDO->prepare('SELECT id FROM articles');
$stmt->execute();
$articles=$stmt->rowcount();
$stmt->closecursor();

$stmt=$PDO->prepare('SELECT id FROM members');
$stmt->execute();
$members=$stmt->rowcount();
$stmt->closecursor();

$stmt=$PDO->prepare('SELECT id FROM comments');
$stmt->execute();
$comments=$stmt->rowcount();
$stmt->closecursor();

// Load views
if( $load_views ) 
	require_once 'views/view_statistics.html';

?>