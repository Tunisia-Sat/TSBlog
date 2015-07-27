<?php

// Page title
define( 'PAGE_TITLE', $lang108 );

// Checking permission
require_once "config/adminCheck.php";

// Editing ...
if ( $_POST ) {
	$id = $_POST['id'];
	if ( !is_numeric($id) ) 
		echo '<div class="error">'.$lang101.'</div>';
	else {
		$stmt = $PDO->prepare('SELECT * FROM members WHERE id=:id');
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		// Member does not exist
		if ( $stmt->rowCount() == 0 )
			echo '<div class="error">'.$lang102.'</div>';
		else {
			$stmt2 = $PDO->prepare('SELECT members_id FROM admins WHERE id=1');
			$stmt2->execute();
			$rslt = $stmt2->fetch(PDO::FETCH_ASSOC);
			$stmt2->closecursor();
			$members_id = explode(',', $rslt['members_id']);
			if ( !in_array($id, $members_id) )
				echo '<div class="error">'.$lang109.'</div>';
			else {
				$array=array();
				foreach($members_id as &$value) {
					if($value!=$id)
						$array[] = $value;
				}
				$members_id = implode(',', $array);
				$stmt3 = $PDO->prepare('UPDATE admins SET members_id=:membersid WHERE id=1');
				$stmt3->bindParam(':membersid', $members_id, PDO::PARAM_STR);
				$stmt3->execute();
				$stmt3->closecursor();
				echo '<div class="success">'.$lang110.'</div>';
				$load_views = false;
			}
		}
		$stmt->closecursor();
	}
}

// Load views
if ( $load_views )
	require_once 'views/view_removeadminsmember.html';

?>