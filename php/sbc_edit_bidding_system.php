<?


require_once('../wp-config.php');
require_once('../wp-includes/wp-db.php');
require_once('../wp-includes/pluggable.php');
require_once('../wp-load.php');

global $bp;
$the_user_id = $bp->loggedin_user->userdata->ID;

//$field = "1M";
$field = 2;
$field_2 = $_POST["field_2"];
if (isset($field_2)) {
   xprofile_set_field_data( $field, $the_user_id, $field_2, $is_required = false );
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



header("Location: http://www.joanbuttsbridge.com/play-bridge-online/");
	
?>


