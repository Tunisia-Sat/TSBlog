<?php

// Page title
define( 'PAGE_TITLE', $lang47 );

// Registration ...
$load_views = true;

if ( $connected ) {
	$load_views = false;
	echo '<div class="warning">'.$lang38.'</div>';
}

if ( $_POST ) {
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$password = $_POST['password']; 
	$password_conf = $_POST['password_conf'];
	$captcha = $_POST['captcha'];
	$captcha_OK = $_SESSION['captcha'];
	if ( empty($fullname) )
		echo '<div class="error">'.$lang39.'</div>';
	elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL ) ) 
		echo '<div class="error">'.$lang40.'</div>';
	elseif ( strlen($password) < 8 ) 
		echo '<div class="error">'.$lang41.'</div>';
	elseif ( $password != $password_conf ) 
		echo '<div class="error">'.$lang42.'</div>';
	elseif ( md5($captcha) != $captcha_OK ) 
		echo '<div class="error">'.$lang43.'</div>';
	else {
		
		$stmt = $PDO->prepare('SELECT id FROM members WHERE email = :email ');
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->rowCount();
		$stmt->closecursor();
		if($count>0) {
			echo '<div class="error">'.$lang44.'</div>';
		} else {
			$load_views = false;
			$password = md5($password);
			$country = $_POST['country'];
			$gender =  $_POST['gender'];
			$birthday = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
			if ( $gender == 'Female') 
				$picture = PATH . 'uploads/pictures/default_female.jpg';
			else
				$picture = PATH . 'uploads/pictures/default_male.jpg';
			$stmt = $PDO->prepare('INSERT INTO members(fullname, email, password, country, birthday, gender, picture) VALUES(:fullname, :email, :password, :country, :birthday, :gender, :picture)');
			$stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
			$stmt->bindParam(':email', $email, PDO::PARAM_STR);
			$stmt->bindParam(':password', $password, PDO::PARAM_STR);
			$stmt->bindParam(':country', $country, PDO::PARAM_STR);
			$stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR);
			$stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
			$stmt->bindParam(':picture', $picture, PDO::PARAM_STR);
			$stmt->execute();
			$stmt->closecursor();
			echo '<div class="success">'.$lang45.'</div>';
		}
	}
		
}

// Load views
if ( $load_views )
	require_once 'views/view_register.html';

?>