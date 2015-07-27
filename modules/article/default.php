<?php

// Checking if article exists
$id = isset($_GET['param']) ? $_GET['param'] : NULL ; // Article ID

$stmt= $PDO->prepare('SELECT * FROM articles WHERE id=:id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$article = $stmt->fetchall(PDO::FETCH_ASSOC);
$rows_article = $stmt->rowcount();
$stmt->closecursor();

// If the article doesn't exist
if ( $rows_article == 0 ) {
	define( 'PAGE_TITLE', $lang118 );
	echo '<div class="warning">'.$lang118.'</div>';
} else { // If it exists
	$title = ucfirst($article[0]['title']);
	$content = ucfirst($article[0]['content']);
	$date_publication = $article[0]['date_publication'];
	$mid_article = $article[0]['member_id'];
	
	$stmt=$PDO->prepare('SELECT * FROM members WHERE id=:id');
	$stmt->bindParam(':id', $mid_article, PDO::PARAM_INT);
	$stmt->execute();
	$member_article = $stmt->fetchall(PDO::FETCH_ASSOC);
	$stmt->closecursor();
	
	// Number of posts
	$stmt=$PDO->prepare('SELECT id FROM articles WHERE member_id=:id');
	$stmt->bindParam(':id', $mid_article, PDO::PARAM_INT);
	$stmt->execute();
	$posts = $stmt->fetchall(PDO::FETCH_ASSOC);
	$stmt->closecursor();
	$posts = count($posts);
	
	define( 'PAGE_TITLE', $title );
	
	$tags = explode(" ", $title);
	
	// Add comm
	if ( $_POST ) {
		$email = $_SESSION['member']['email'];
		$mid = $_SESSION['member']['id'];
		$comment = $_POST['comment'];
		$time = time();
		// Saving comm
		$stmt = $PDO->prepare('INSERT INTO comments(email, content, article_id, member_id, date_publication) VALUES(:email, :content, :article_id, :member_id, :date_publication)');
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':content', $comment, PDO::PARAM_STR);
		$stmt->bindParam(':article_id', $id, PDO::PARAM_INT);
		$stmt->bindParam(':member_id', $mid, PDO::PARAM_INT);
		$stmt->bindParam(':date_publication', $time, PDO::PARAM_INT);
		$stmt->execute();
		$stmt->closecursor();
	}
	
	// Getting comms
	$stmt=$PDO->prepare('SELECT * FROM comments WHERE article_id=:id ORDER BY id DESC');
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$coms=$stmt->fetchall(PDO::FETCH_ASSOC);
	$stmt->closecursor();
	
	require 'views/view_showarticle.html';

}

?>