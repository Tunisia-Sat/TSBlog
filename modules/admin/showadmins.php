<?php

// Page title
define( 'PAGE_TITLE', $lang113 );

// Checking permission
require_once "config/adminCheck.php";

$stmt = $PDO->prepare('SELECT members_id FROM admins WHERE id=1');
$stmt->execute();
$rslt = $stmt->fetchAll();
$stmt->closecursor();

$members_id = explode(',', $rslt[0]['members_id']);

foreach($members_id as &$value) {
	$stmt = $PDO->prepare('SELECT fullname, email, gender, country, picture FROM members WHERE id=:id');
	$stmt->bindParam(':id', $value, PDO::PARAM_INT);
	$stmt->execute();
	$rslt=$stmt->fetchAll();
	echo'
		<table>
			<tr>
				<td>
					<img src="'.$rslt[0]['picture'].'" width="150" height="150" />
				</td>
				<td valign="top"">
					<table>
						<tr>
							<td>
								ID
							</td>
							<td>
								: '.$value.'
							</td>
						</tr>
						<tr>
							<td>
								<b>'.$lang27.'</b>
							</td>
							<td>
								: '.$rslt[0]['fullname'].'
							</td>
						</tr>
						<tr>
							<td>
								<b>'.$lang28.'</b>
							</td>
							<td>
								: '.$rslt[0]['email'].'
							</td>
						</tr>
						<tr>
							<td>
								<b>'.$lang58.'</b>
							</td>
							<td>
								: <img src="'.PATH.'uploads/flags/' . $rslt[0]['country'].'.png" />
							</td>
						</tr>
						<tr>
							<td>
								<b>'.$lang60.'</b>
							</td>
							<td>
								: '.$rslt[0]['gender'].'
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<hr />
	';
}

?>