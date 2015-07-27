<?php

// Page title
define( 'PAGE_TITLE', $lang133 );

// Logging in
$load_views = true;

if ( !$connected ) {
	$load_views = false;
	echo '<div class="warning">'.$lang56.'</div>';
}

// Getting categories
$stmt = $PDO->prepare('SELECT * FROM categories');
$stmt->execute();
$rslt = $stmt->fetchAll();
$count =$stmt->rowCount();
$stmt->closecursor();

// Add an article
if ( $_POST ) {
	$title = $_POST['title'];
	$category_id = $_POST['category_id'];
	$content = $_POST['content'];
	$member_id = $_SESSION['member']['id'];
	$date_publication = time();
	if ( empty($title) )
		echo '<div class="error">'.$lang92.'</div>';
	else {
		$stmt=$PDO->prepare('INSERT INTO articles(title, content, category_id, member_id, date_publication) VALUES(:title, :content, :category_id, :member_id, :date_publication)');
		$stmt->bindParam(':title', $title, PDO::PARAM_STR);
		$stmt->bindParam(':content', $content, PDO::PARAM_STR);
		$stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
		$stmt->bindParam(':member_id', $member_id, PDO::PARAM_INT);
		$stmt->bindParam('date_publication', $date_publication, PDO::PARAM_INT);
		$stmt->execute();
		$stmt->closecursor();
		echo '<div class="success">'.$lang134.'</div>';
		$load_views = false;
	}
}

// Load views
if ( $load_views )
	require_once 'views/view_publish.html';
?>