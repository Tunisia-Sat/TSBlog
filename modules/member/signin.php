<?php

// Page title
define( 'PAGE_TITLE', $lang49 );

// Logging in
$load_views = true;

if ( $connected ) {
	$load_views = false;
	echo '<div class="warning">'.$lang50.'</div>';
}

if ( $_POST ) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$captcha = $_POST['captcha'];
	$captcha_OK = $_SESSION['captcha'];
	
	if ( !filter_var($email, FILTER_VALIDATE_EMAIL ) ) 
		echo '<div class="error">'.$lang40.'</div>';
	elseif( md5($captcha) != $captcha_OK )
		echo '<div class="error">'.$lang43.'</div>';
	else {
		$stmt = $PDO->prepare('SELECT * FROM members WHERE email = :email AND password = :password ');
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':password', $password, PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count>0) {
		$load_views = false;
			echo '<div class="success">'.$lang53.'</div>';
			$rslt = $stmt->fetch(PDO::FETCH_ASSOC);
			$_SESSION['member'] = $rslt;
			echo '<meta http-equiv="refresh" content="1; url='.PATH.'member/account" />';
		} else {
			echo '<div class="error">'.$lang54.'</div>';
		}
		$stmt->closecursor();
	}
		
}

// Load views
if ( $load_views )
	require_once 'views/view_signin.html';

?>