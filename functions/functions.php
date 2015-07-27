<?php

// CatpchaGen
function captcha() {
	echo '
		<fieldset>
		<legend>Captcha</legend>
		<img src= "'.PATH.'captcha/captcha.php" /> <br />
		<input type="text" id="captcha" name="captcha" id="captcha" maxlength="5"/>
		</fieldset>
	';
}

// Generate a form
function form($array, $legend, $submit, $first, $last, $captcha=false) {
	if ($first)
		echo"<form method='post' action=''>";

	echo '<fieldset>';
	echo '<legend>'.$legend.'</legend>';
	
	foreach($array as &$value) {
		if ( $value['type'] != 'radio' && $value['label'] != '' )
			echo '<label for="'.$value['name-id'].'">'.$value['label'].'</label>';
		
		// Text, Email, Password 
		if ( $value['type'] == 'text' || $value['type'] == 'email' || $value['type'] == 'password' ) {
			echo '<input type="'.$value['type'].'" name="'.$value['name-id'].'" id="'.$value['name-id'].'" value="';
				if ( $value['value'] ) {
					if ( $_POST ) 
						echo $_POST[$value['name-id']];
					elseif ( !empty($value['valuebyuser']) )
						echo $value['valuebyuser'];
				}elseif ( !empty($value['valuebyuser']) )
					echo $value['valuebyuser'];
			echo '" />';
		}
		if ( $value['type'] == 'textarea' ) {
			echo '<textarea cols="'.$value['cols'].'" rows="'.$value['rows'].'" name="'.$value['name-id'].'" id="'.$value['name-id'].'">';
			if ( $value['value'] ) {
				if ( $_POST ) 
					echo $_POST[$value['name-id']];
				elseif ( !empty($value['valuebyuser']) )
					echo $value['valuebyuser'];
			}elseif ( !empty($value['valuebyuser']) )
					echo $value['valuebyuser'];
			
			echo '</textarea>';
		}
		if ( $value['type'] == 'radio' ) {
			echo '<input type="'.$value['type'].'" name="'.$value['name-id'].'" id="'.$value['name-id'].'" value="'.$value['value'].'"';
			if ( $value['checked'] )
			  echo ' checked="checked" ';
			echo '/>'.$value['label'];
		}
		if ( $value['type'] == 'select' ) {
			echo '<select name="'.$value['name-id'].'" id="'.$value['name-id'].'">';
				foreach ( $value['options'] as $key=>$v ) {
					echo '<option value="'.$key.'">'.$v.'</option>';
				}
			echo '</select>';
		}
	}
	echo"</fieldset>";
	
	if ( $captcha )
		captcha();

	if ( $last ) {
		echo "<input type='submit' value='".$submit."'/>";
		echo"</form>";
	}
}

// Hightlight a word in a string
function hightlight($str, $keywords = ''){
	$keywords = preg_replace('/\s\s+/', ' ', strip_tags(trim($keywords))); // filter

	$style = 'highlight';
	$style_i = 'highlight_important';

	/* Apply Style */

	$var = '';

	foreach(explode(' ', $keywords) as $keyword)
	{
	$replacement = "<span style='color:red;'>".$keyword."</span>";
	$var .= $replacement." ";

	$str = str_ireplace($keyword, $replacement, $str);
	}

	$str = str_ireplace(rtrim($var), "<span style='color:red;'>".$keywords."</span>", $str);

	return $str;
}

?>