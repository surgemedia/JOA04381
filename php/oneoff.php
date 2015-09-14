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
get_currentuserinfo();

$current_user = wp_get_current_user();

if ( is_user_logged_in() ) {
    print "LOGGEDIN";
} else {
    print "NOTLOGGEDIN";
}

/*
$customer_ref 	= $_POST["SubscriptionReferrer"];
$subscription_ref 	= $_POST["SubscriptionReference"];
*/

global $bp;
$the_user_id = $bp->loggedin_user->userdata->ID;
print $the_user_id;

$customer_ref 	= 53; //"graeme123";
$subscription_ref 	= "abc";

$str .= $subscription_ref . ",";

print $current_user->user_login;
print $current_user->ID;

$u = new WP_User( $customer_ref );

$role = $wpdb->prefix . 'capabilities';
$current_user->role = array_keys($current_user->$role);

// Remove role
$u->remove_role( 'royal' );
// Add role
//$u->add_role( 'royal' );

foreach($current_user->role as $role => $Role) {
	$str .= $Role . ",";
}

print $str;

/*
global $bp;
//$the_user_id = $bp->loggedin_user->userdata->ID;
xprofile_set_field_data( "fsid", $customer_ref, $subscription_ref, $is_required = false );
//$fsid = bp_get_profile_field_data('field=fsid&user_id='.bp_loggedin_user_id());
$fsid = bp_get_profile_field_data('field=fsid&user_id='.$customer_ref);

$str .= $fsid . ",";




$mailinfo		= "graeme@bridgeonline.co.nz";
$mailheaders 		= "From: www.bridgeonline.co.nz <graeme@bridgeonline.co.nz> \n";
$mailheaders 		.= "Reply-To: graeme@bridgeonline.co.nz";
$title 			= "fastspring-activated-client: " . $customer_ref;
$subject		= $str;
mail($mailinfo, $title, $subject, $mailheaders);
*/
	
?>


