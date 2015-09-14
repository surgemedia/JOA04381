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

$current_user = wp_get_current_user();

$customer_ref 		= $current_user->ID;

//$customer_ref 	= $_POST["SubscriptionReferrer"];
//$subscription_ref 	= $_POST["SubscriptionReference"];


//$data = "graeme1@graemetuffnell.com";
//wp_update_user( array ( 'ID' => $customer_ref, 'user_email' => $data ) ) ;

$u = new WP_User( $customer_ref );

echo "ok1-";

$role = $wpdb->prefix . 'capabilities';
$current_user->role = array_keys($current_user->$role);

foreach($current_user->role as $role => $Role) {
	echo $Role . ",";
}

echo "ok2-";
/*
global $bp;
$the_user_id = $bp->loggedin_user->userdata->ID;
$the_user_login = $bp->loggedin_user->userdata->user_login;
//xprofile_set_field_data( "fsid", $the_user_id, "new1", $is_required = false );
$field = "Opening 1NT shows:";
$fsid = bp_get_profile_field_data('field='.$field.'&user_id='.bp_loggedin_user_id());
echo $fsid;
*/

	
?>


