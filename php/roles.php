<?

require_once('../wp-config.php');
require_once('../wp-includes/wp-db.php');
require_once('../wp-includes/pluggable.php');
require_once('../wp-load.php');
require_once('../wp-includes/registration.php');
require_once('../wp-includes/author-template.php');


global $userdata;
global $current_user;
global $wpdb, $wp_roles;

// $test_user = get_user_by( 'id',26595);
// $test_user->remove_role( 'subscriber' );
// $test_user->add_role( 'royal' );
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
echo "<pre>";
print_r($current_user);
echo "</pre>";
 ?>
<?php // echo "<pre>".$test_user."</pre>"; ?>
</body>
</html>
<?php 
// $client_info = 'alexanderddking@gmail.com';
// $client_subject = "Joan Butts Bridge - Thanks for becoming a Royal Member";
// $message = "Thanks for becoming a Royal Member of Joan Butts Bridge. \n You now have access to all the features of the site. You’ll be able to play all the hands, either lesson hands (Learn section), or go to Play and Compete for endless hands with tips. \n \n You’ll receive my monthly newsletter too, and can watch videos on various lessons.  I’m adding to the Learn section all the time. \n \n If you have queries about the bidding, play or defence of any hands you play, please email me at joan@joanbuttbridge.com";
// wp_mail('alexanderddking@gmail.com', $client_subject, $message);
 ?>
