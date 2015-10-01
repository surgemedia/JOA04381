<?

$str = "info,";

require_once('../wp-config.php');
require_once('../wp-includes/wp-db.php');
require_once('../wp-includes/pluggable.php');
require_once('../wp-load.php');
require_once('../wp-includes/registration.php');
require_once('../wp-includes/author-template.php');

global $userdata;
global $current_user;
global $wpdb, $wp_roles;


//Get Customer Refer
$customer_ref 	= $_POST["SubscriptionReferrer"];

//Get Subscription Referance
$subscription_ref 	= $_POST["SubscriptionReference"];


$test_user = get_user_by( 'id',$customer_ref);
$test_user->remove_role( 'subscriber' );
$test_user->add_role( 'royal' );


global $bp;
//update FSID in buddpress fields
xprofile_set_field_data( "fsid", $customer_ref, $subscription_ref, $is_required = false );
$fsid = bp_get_profile_field_data('field=fsid&user_id='.$customer_ref);


$str .= $fsid . ",";
$mailinfo		= "joan@joanbuttsbridge.com";
$mailheaders 		= "From: Joan Butts <joan@joanbuttsbridge.com> \n";
$mailheaders 		.= "Reply-To: joan@joanbuttsbridge.com";
$title 			= "fastspring-activated-client: " . $customer_ref;
$subject		= $str;
mail($mailinfo, $title, $subject, $mailheaders);


/*===================================================
=            Send out Message to Members            =
===================================================*/
$client_info = $current_user->user_email;
$client_subject = "Joan Butts Bridge - Thanks for becoming a Royal Member";
$message = "Thanks for becoming a Royal Member of joanbuttsbridge. \n You now have access to all the features of the site. You’ll be able to play all the hands, either lesson hands (Learn section), or go to Play and Compete for endless hands with tips. \n \n You’ll receive my monthly newsletter too, and can watch videos on various lessons.  I’m adding to the Learn section all the time. \n \n If you have queries about the bidding, play or defence of any hands you play, please email me at joan@joanbuttbridge.com";
wp_mail($client_info , $client_subject, $message);
	
?>


