<?


require_once('../../../wp-config.php');
require_once('../../../wp-includes/wp-db.php');
require_once('../../../wp-includes/pluggable.php');
require_once('../../../wp-load.php');


global $bp;
// debug($bp);
debug($bp->loggedin_user->ID);
$current_user = wp_get_current_user();
    /**
     * @example Safe usage: $current_user = wp_get_current_user();
     * if ( !($current_user instanceof WP_User) )
     *     return;
     */
    echo 'Username: ' . $current_user->user_login . '<br />';
    echo 'User email: ' . $current_user->user_email . '<br />';
    echo 'User first name: ' . $current_user->user_firstname . '<br />';
    echo 'User last name: ' . $current_user->user_lastname . '<br />';
    echo 'User display name: ' . $current_user->display_name . '<br />';
    echo 'User ID: ' . $current_user->ID . '<br />';

debug("Current id ".get_current_user_id());
$the_user_id = $bp->loggedin_user->ID;

//$field = "1M";
$field = 2;
$field_2 = $_POST["field_2"];
if (isset($field_2)) {
   xprofile_set_field_data( $field, $the_user_id, $field_2, $is_required = false );
   // echo "field: ".$field." id: ".$the_user_id." field_2: ". $field_2;
}

//$field = "1NT";
$field = 15;
$field_15 = $_POST["field_15"];
if (isset($field_15)) {
   xprofile_set_field_data( $field, $the_user_id, $field_15, $is_required = false );
}

//$field = "2x";
$field = 18;
$field_18 = $_POST["field_18"];
if (isset($field_18)) {
   xprofile_set_field_data( $field, $the_user_id, $field_18, $is_required = false );
}

//$field = "xfers;
$field = 6;
$field_6 = $_POST["field_6"];
if (isset($field_6)) {
   xprofile_set_field_data( $field, $the_user_id, $field_6, $is_required = false );
}

// echo "field_2: " .$_POST["field_2"] . " field_15: " . $_POST["field_15"] . " field_18: " . $_POST["field_18"] . " field_6: " . $_POST["field_6"];

// header("Location: http://www.joanbuttsbridge.com/play-bridge-online/");
	
?>


