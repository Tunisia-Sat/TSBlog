<?php

// Page title
define( 'PAGE_TITLE', $lang111 );

// Checking permission
require_once "config/adminCheck.php";

// Editing ...
if ( $_POST ) {
	$id = $_POST['id'];
	if ( !is_numeric($id) ) 
		echo '<div class="error">'.$lang101.'</div>';
	else {
		$stmt = $PDO->prepare('DELETE FROM members WHERE id=:id');
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);
		$stmt->execute();
		if ( $stmt->rowCount() == 0 )
			echo '<div class="error">'.$lang102.'</div>';
		else {
			echo '<div class="success">'.$lang112.'</div>';
			$load_views = false;
		}
		$stmt->closecursor();
	}
}

// Load views
if ( $load_views )
	require_once 'views/view_removemember.html';

?>