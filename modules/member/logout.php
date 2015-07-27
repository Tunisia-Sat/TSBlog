<?php

// Page title
define( 'PAGE_TITLE', $lang48 );

// Logout ...
echo '<div class="info">'.$lang46.' ...</div>';
session_destroy();

?>
<meta http-equiv="refresh" content="1; url=<?php echo PATH ?>" />