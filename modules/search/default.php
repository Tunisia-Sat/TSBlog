<?php

// Page title
define( 'PAGE_TITLE', $lang136 );

// Searching ... 
$tag = $_GET['param'];

$stmt=$PDO->prepare("SELECT * FROM articles WHERE title LIKE '%".$tag."%' OR content LIKE '%".$tag."%' ORDER BY id DESC");
$stmt->execute();
$arts = $stmt->fetchall(PDO::FETCH_ASSOC);
$stmt->closecursor();

// Load view
require_once 'views/view_tag.html';

?>