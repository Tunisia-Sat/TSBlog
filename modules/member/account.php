<?php

// Page title
define( 'PAGE_TITLE', $lang55 );


// Checking session
$load_views = true;
if ( !$connected ) {
	$load_views = false;
	echo '<div class="warning">'.$lang56.'</div>';
}

// Update the picture
$ext = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

if ( !empty($_POST['picture_submit']) ) {
	if ( $_FILES['picture']["error"] > 0 ) 
		echo '<div class="error">'.$lang65.'</div>';
	elseif ( $_FILES['picture']['size'] > MAX_SIZE_PICTURE ) 
		echo '<div class="error">'.$lang66.'</div>';
	elseif ( !in_array(strtolower(  substr(  strrchr($_FILES['picture']['name'], '.')  ,1)  ),$ext) )
		echo '<div class="error">'.$lang67.'</div>';
	else {

		$file_ext = strtolower(  substr(  strrchr($_FILES['picture']['name'], '.')  ,1)  );
		$filename = $_SESSION['member']['id'].'.'.$file_ext;

		$rslt = move_uploaded_file($_FILES['picture']['tmp_name'], PATH_DIRNAME.'/uploads/pictures/'.$filename);
		
		if ( $rslt ) {
			echo '<div class="success">'.$lang68.'</div>';
			$id = $_SESSION['member']['id'];
			$picture= PATH.'uploads/pictures/'.$filename;
			$stmt = $PDO->prepare('UPDATE members SET picture= :picture WHERE id= :id');
			$stmt->bindParam(':picture', $picture, PDO::PARAM_STR);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closecursor();
			$_SESSION['member']['picture'] = $picture;
		} else
			echo '<div class="error">'.$lang69.'</div>';
	}
} elseif($_POST) {
// Updating the password
	$password_curr = md5($_POST['password_curr']);
	$password_new= $_POST['password_new'];
	$password_conf = $_POST["password_conf"];
	if ( $password_curr != $_SESSION['member']['password'] )
		echo '<div class="error">'.$lang70.'</div>';
	elseif ( strlen($password_new) < 8 ) 
		echo '<div class="error">'.$lang71.'</div>';
	elseif( $password_new != $password_conf )
		echo '<div class="error">'.$lang42.'</div>';
	else {
		$password = md5($password_new);
		$id = $_SESSION['member']['id'];
		$stmt = $PDO->prepare('UPDATE members SET password=:password WHERE id=:id');
		$stmt->bindParam(':password', $password, PDO::PARAM_STR);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		$stmt->closecursor();
		$_SESSION["member"]["password"] = $password;
		echo '<div class="success">'.$lang72.'</div>';
	}
}

// Load views
if ( $load_views )
	require_once 'views/view_account.html';
?>