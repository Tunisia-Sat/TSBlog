<?php

// Setting the connection
$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'blog';

// Connecting ...
try {
	$PDO = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
}
catch( PDOException $e ) {
	die('We cannot connect to the database, please check your settings.');
}

?>