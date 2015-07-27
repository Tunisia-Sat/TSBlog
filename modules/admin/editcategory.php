<?php

// Page title
define( 'PAGE_TITLE', $lang97 );

// Checking permission
require_once "config/adminCheck.php";

$stmt = $PDO->prepare('SELECT * FROM categories');
$stmt->execute();
$rslt = $stmt->fetchAll();
$count =$stmt->rowCount();
$stmt->closecursor();

// Editing ...
$empty = true;
if ( $_POST ) {
	$stmt=$PDO->prepare('SELECT id FROM categories');
	$stmt->execute();
	$rslt = $stmt->fetchall(PDO::FETCH_ASSOC);
	
	foreach($rslt as $value ) {
		$title = $_POST[$value['id']];		
		if ( !empty($title) ) {
			$empty = false;
			
			$stmt = $PDO->prepare('UPDATE categories SET title=:title WHERE id=:id');
			$stmt->bindParam(':title', $title, PDO::PARAM_STR);
			$stmt->bindParam(':id', $value['id'], PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closecursor();
		}
	}
	if ( !$empty ) {
		echo '<div class="success">'.$lang98.'</div>';
		$load_views = false;
	} else
		echo '<div class="error">'.$lang99.'</div>';
}

// Load views
if ( $load_views )
	require_once 'views/view_editcategory.html';

?>