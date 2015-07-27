<?php
if (!isset($_POST) || empty($_POST)) {
	include_once 'denied.php';
} else {
	echo "Installation en cours ...";
	//Get the database informations
	$host	=	$_POST['host'];
	$data	=	$_POST['dbname'];
	$user	=	$_POST['user'];
	$pass	=	$_POST['pass'];
	$prfx	=	$_POST['prefix'];
	
	//Get the administrator information
	$fstname=	$_POST['firstname'];
	$lstname=	$_POST['lastname'];
	$passwrd=	$_POST['adminpass'];
	$email	=	$_POST['email'];
	
	//this part is to be modifyed to verify if the shell is accessible
	//to the client, if we can execute commands via shell so we add all
	//the databes, else we use PDO to add it using multiple queries
	$sqlcode = fopen("db.sql", "r");
	$command = "mysql -h {$host} -D {$data} -u{$user} -p{$pass} < $sqlcode";
	echo $command;
	$createTables = shell_exec($command);
}
?>