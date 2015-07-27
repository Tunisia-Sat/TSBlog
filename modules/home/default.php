<?php

// Page title
define( 'PAGE_TITLE', $lang2 );

// Getting categories
$stmt = $PDO->prepare('SELECT * FROM categories ORDER BY id DESC');
$stmt->execute();
$rslt = $stmt->fetchall(PDO::FETCH_ASSOC);
$stmt->closecursor();

// Load views
require_once 'views/view_default.html';

?>

