<?php

$load_views = false;

// Checking if member exists
$id = isset($_GET['param']) ? $_GET['param'] : NULL ; // Member ID

$stmt= $PDO->prepare('SELECT * FROM members WHERE id=:id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$member = $stmt->fetchall(PDO::FETCH_ASSOC);
$rows = $stmt->rowcount();
$stmt->closecursor();

// If the article doesn't exist
if ( $rows == 0 ) {
	define( 'PAGE_TITLE', $lang118 );
	echo '<div class="warning">'.$lang118.'</div>';
} else { // If it exists
	$fullname = $member[0]['fullname'];
	$email = $member[0]['email'];
	$birthday = $member[0]['birthday'];
	$country = $member[0]['country'];
	$gender = $member[0]['gender'];
	$picture = $member[0]['picture'];
	
	$stmt=$PDO->prepare('SELECT id, title, date_publication FROM articles WHERE member_id = :id  ORDER BY id DESC LIMIT 10');
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$rslt = $stmt->fetchall(PDO::FETCH_ASSOC);
	$stmt->closecursor();
	
	define( 'PAGE_TITLE', $fullname );
	$load_views = true;	
}

if ( $load_views )
	require_once 'views/view_show.html';
?>