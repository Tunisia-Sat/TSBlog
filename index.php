<?php

/*
** Script name      : TSBlog
** Script version   : 2
** Script developer : Beeekk
*/
function installed() {
	$filename = "./install/";
	return file_exists($filename));
}

if (!installed()) {
	header('Location: install/');
}
else {
	// Start session
	session_start();

	// Getting module
	$module = !empty($_GET['module']) ? $_GET['module'] : NULL ;

	// Getting action to do
	$action = !empty($_GET['action']) ? $_GET['action'] : NULL ;

	// The default module
	define( 'DEFAULT_MODULE', 'home' );

	// The default action
	define( 'DEFAULT_ACTION', 'default' );

	// Checking if module exists
	$module = !file_exists( dirname(__FILE__) . '/modules/' . $module . '/' ) ? DEFAULT_MODULE : $module;
	$module_path = dirname(__FILE__) . '/modules/' . $module . '/' ;

	// Checking if action exists
	$action = !file_exists( $module_path . $action . '.php' ) ? DEFAULT_ACTION : $action;
	$action_path = !file_exists( $module_path . $action . '.php' ) ? dirname(__FILE__) . '/modules/'. DEFAULT_MODULE .'/'. DEFAULT_ACTION .'.php' : $module_path . $action . '.php';

	// Connecting to the Database
	require_once dirname(__FILE__) . '/config/db.php';

	// Getting language
	if ( empty($_SESSION['lang']) )
		require_once dirname(__FILE__) . '/langs/fr.php';
	else {
		if ( file_exists(dirname(__FILE__) . '/langs/'.$_SESSION['lang'].'.php') )
			require_once dirname(__FILE__) . '/langs/'.$_SESSION['lang'].'.php';
		else
			require_once dirname(__FILE__) . '/langs/fr.php';
	}

	// Getting functions
	require_once dirname(__FILE__) . '/functions/functions.php';

	// Global settings
	define( 'PATH_DIRNAME', dirname(__FILE__));
	require_once dirname(__FILE__) . '/config/config.php';

	// Load module
	ob_start();
	require_once $action_path;
	$content=ob_get_contents();
	ob_end_clean();

	// Load template
	require_once dirname(__FILE__) . '/style/template.html';
}
?>