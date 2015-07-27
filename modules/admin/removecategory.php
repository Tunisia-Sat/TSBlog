<?php

// Page title
define( 'PAGE_TITLE', $lang95 );

// Checking permission
require_once "config/adminCheck.php";

// Deleting ...
if ( $_POST ) {
	$id = $_POST['id'];
	$stmt = $PDO->prepare('DELETE FROM categories WHERE id=:id');
	$stmt->bindParam(':id', $id, PDO::PARAM_STR);
	$stmt->execute();
	$stmt->closecursor();
	echo '<div class="success">'.$lang96.'</div>';
	$load_views = false;
}

// Getting categories
$stmt = $PDO->prepare('SELECT * FROM categories');
$stmt->execute();
$rslt = $stmt->fetchAll();
$stmt->closecursor();

// Load views
if ( $load_views )
	require_once 'views/view_removecategory.html';

?>