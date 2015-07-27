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

	$stmt= $PDO->prepare('SELECT id, title, content FROM articles WHERE id=:id');
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
		$title = ucfirst($article[0]['title']);
		$content = $article[0]['content'];
		define( 'PAGE_TITLE', $lang128);
		$stmt = $PDO->prepare('SELECT * FROM categories');
		$stmt->execute();
		$rslt = $stmt->fetchAll();
		$count =$stmt->rowCount();
		$stmt->closecursor();
		if ( $_POST ) {
			$title3 = $_POST['title'];
			$category_id = $_POST['category_id'];
			$content3 = $_POST['content'];
			if ( empty($title3) ) {
				echo '<div class="error">'.$lang92.'</div>';
			} else {
				$stmt = $PDO->prepare('UPDATE articles SET title=:title, category_id=:category_id, content=:content WHERE id=:id');
				$stmt->bindParam(':title', $title3, PDO::PARAM_STR);
				$stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
				$stmt->bindParam(':content', $content3, PDO::PARAM_STR);
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);
				$stmt->execute();
				$stmt->closecursor();
				echo '<div class="success">'.$lang132.'</div>';
				$load_views = false;
			}
		}
		if ( $load_views )
			require_once 'views/view_editarticle.html';
	}
}

?>
