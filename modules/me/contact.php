<?php

// Page title
define( 'PAGE_TITLE', $lang9 );

//Sending the message
require_once 'views/view_contact_top.html';
$load_views = true;

if ( $_POST ) {
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$captcha = $_POST['captcha'];
	$captcha_OK = $_SESSION['captcha'];

	if ( empty($fullname) )
		echo '<div class="error">'.$lang39.'</div>';
	elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL ) ) 
		echo '<div class="error">'.$lang40.'</div>';
	elseif ( empty($message ) )
		echo '<div class="error">'.$lang78.'</div>';
	elseif ( md5($captcha) != $captcha_OK ) 
		echo '<div class="error">'.$lang43.'</div>';
	else {
		$to = EMAIL_ADRESS;
		$subject = $fullname.$lang79;
		$headers = 'From: '.$email. '\r\n' .
		           'Reply-To: '.$email. '\r\n' .
		           'X-Mailer: PHP/' . phpversion();
		 mail($to, $subject, $message, $headers);
		 echo '<div class="success">'.$lang80.'</div>';
		 $load_views = false;
	}
}

// Load view
if ( $load_views )
	require_once 'views/view_contact.html';
?>
