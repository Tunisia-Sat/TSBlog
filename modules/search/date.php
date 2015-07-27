<?php

// Page title
define( 'PAGE_TITLE', $lang136 );

// Searching
$date = $_GET['param'];

if ( !is_numeric($date) )
	$date = (int) $_GET['param'];

if ( $date > 12 || $date < 1 ) {
	$date = '01';
}
$year=date('Y');
$stmt=$PDO->prepare('SELECT id, title, member_id, date_publication FROM articles WHERE MONTH(FROM_UNIXTIME(date_publication)) = :date && YEAR(FROM_UNIXTIME(date_publication)) = :year ORDER BY id DESC');
$stmt->bindParam(':date', $date, PDO::PARAM_INT);
$stmt->bindParam(':year', $year, PDO::PARAM_INT);
$stmt->execute();
$arts = $stmt->fetchall(PDO::FETCH_ASSOC);
$stmt->closecursor();

// Load views
require_once 'views/view_date.html';

?>