<?php
/* Welcome to jbb :)
Thanks to the fantastic work by jbb users, we've now
the ability to translate jbb into different languages.

Developed by: Eddie Machado
URL: http://themble.com/jbb/
*/



// Adding Translation Option
load_theme_textdomain( 'jbbtheme', get_template_directory() .'/library/translation' );
	$locale = get_locale();
	$locale_file = get_template_directory() ."/library/translation/$locale.php";
if ( is_readable($locale_file) ) require_once($locale_file);








?>