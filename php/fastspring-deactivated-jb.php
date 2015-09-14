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
get_currentuserinfo();


$subscription_ref 	= $_POST["SubscriptionReferrer"];

$user = get_userdatabylogin($subscription_ref);
$userid = $user->ID; // prints the id of the user

$u = get_user_by( "id", $userid );

$u->remove_role( 'royal' );
$u->remove_role( 'subscriber' );
$u->remove_role( 'exroyal' );

$u->add_role( 'exroyal' );

$mailinfo		= "graeme@bridgeonline.co.nz";
$mailheaders 		= "From: www.bridgeonline.co.nz <graeme@bridgeonline.co.nz> \n";
$mailheaders 		.= "Reply-To: graeme@bridgeonline.co.nz";
$title 			= "fastspring-deactivated-jb: " . $userid . " - " .  $subscription_ref;
$subject		= $str;
mail($mailinfo, $title, $subject, $mailheaders);


?>