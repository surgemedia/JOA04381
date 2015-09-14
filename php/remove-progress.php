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
$user_id = getUser();
// $current_user = wp_get_current_user();
echo '<pre>'.$user_id.'<pre>';

  //Reset All Player Progress
  xprofile_set_field_data( 'Completed Modules', $user_id, "", $is_required = false );
  xprofile_set_field_data( 'Completed Lessons', $user_id, "", $is_required = false );
  xprofile_set_field_data( 'Bridge Skill', $user_id, "New Player", $is_required = false );
	
?>
