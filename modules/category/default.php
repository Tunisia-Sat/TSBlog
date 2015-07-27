<?php

// Checking if category exists
$id = isset($_GET['param']) ? $_GET['param'] : NULL ; // Category ID

$stmt = $PDO->prepare('SELECT * FROM categories WHERE id=:id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$rslt = $stmt->fetchall(PDO::FETCH_ASSOC);
$rows = $stmt->rowcount();
$stmt->closecursor();

// If the category doesn't exist
if ( $rows == 0 ) {
	define( 'PAGE_TITLE', $lang118 );
	echo '<div class="warning">'.$lang118.'</div>';
} else { // If the category exists
	$title = ucfirst($rslt[0]['title']);
	
	define( 'PAGE_TITLE', $title );
	
	// Getting articles
	$stmt=$PDO->prepare('SELECT * FROM articles WHERE category_id=:id ORDER BY id DESC LIMIT 30');
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$rslt=$stmt->fetchall(PDO::FETCH_ASSOC);
	$stmt->closecursor();

	require 'views/view_showcategory.html';
}

?>