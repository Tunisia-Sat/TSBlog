<?php

// Checking permission
$load_views = true;
if ( !$connected ) {
	$load_views = false;
	echo '<div class="warning">'.$lang13.'</div>';
	define( 'PAGE_TITLE', $lang81);
} elseif ( !$is_admin ) {
	$load_views = false;
	echo '<div class="warning">'.$lang14.'</div>';
	if (!defined('PAGE_TITLE')) {
		define( 'PAGE_TITLE', $lang81);
	}
} else {

	// Checking if article exists
	$id = isset($_GET['param']) ? $_GET['param'] : NULL ; // Article ID

	$stmt= $PDO->prepare('SELECT id FROM articles WHERE id=:id');
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$article = $stmt->fetchall(PDO::FETCH_ASSOC);
	$rows_article = $stmt->rowcount();
	$stmt->closecursor();

	// If the article doesn't exist
	if ( $rows_article == 0 ) {
		define( 'PAGE_TITLE', $lang118 );
		echo '<div class="warning">'.$lang118.'</div>';
	} else {
		define( 'PAGE_TITLE', $lang127);
		$stmt = $PDO->prepare('DELETE FROM articles WHERE id=:id');
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		$stmt->closecursor();
		echo '<div class="success">'.$lang129.'</div>';
	}
}

?>
