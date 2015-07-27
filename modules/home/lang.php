<?php

// Page title
define( 'PAGE_TITLE', 'Languages' );

// Getting language
$_SESSION['lang'] = isset($_GET['param']) ? $_GET['param'] : NULL ; 

header("Location: ".PATH."");

?>