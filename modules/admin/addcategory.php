<?php

// Page title
define( 'PAGE_TITLE', $lang91 );

// Checking permission
require_once "config/adminCheck.php";

// Adding ...
if ( $_POST ) {
	$title = $_POST['title'];
	if ( empty($title) )
		echo '<div class="error">'.$lang92.'</div>';
	else {
		$stmt = $PDO->prepare('INSERT INTO categories(title) VALUES(:title)');
		$stmt->bindParam(':title', $title, PDO::PARAM_STR);
		$stmt->execute();
		$stmt->closecursor();
		echo '<div class="success">'.$lang93.'</div>';
		$load_views = false;
	}
}

// Load views
if ( $load_views )
	require_once 'views/view_addcategory.html';

?>