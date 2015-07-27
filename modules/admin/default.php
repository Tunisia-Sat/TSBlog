<?php

// Page title
define( 'PAGE_TITLE', $lang81 );

// Checking permission
require_once "config/adminCheck.php";

// Load views
if ( $load_views )
	require_once 'views/view_default.html';

?>
