<?php

// Checking for permission
$load_views = true;
if ( !$connected ) {
	$load_views = false;
	echo '<div class="warning">'.$lang13.'</div>';
} elseif ( !$is_admin ) {
	$load_views = false;
	echo '<div class="warning">'.$lang14.'</div>';
}
?>