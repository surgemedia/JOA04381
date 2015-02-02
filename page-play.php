<?php
/*
Template Name: Game Screen
*/
?>

<?
require_once('wp-config.php');
require_once('wp-includes/wp-db.php');
require_once('wp-includes/pluggable.php');
require_once('wp-load.php');
require_once('wp-includes/registration.php');

global $userdata;
global $current_user;
global $wpdb, $wp_roles;
get_currentuserinfo();
		
$role = $wpdb->prefix . 'capabilities';
$current_user->role = array_keys($current_user->$role);

$myRole = "none";
foreach($current_user->role as $role => $Role) {
    if ($Role == "royal" || $Role == "administrator" || $Role == "administrator") {
	$myRole = $Role;
    }
}

$confirmation = "CONFIRM";

if ( is_user_logged_in() ) {
    //
} else {
    $confirmation = "NOTLOGGEDIN";
}


$bidsys = "";

$str = bp_get_profile_field_data('field=2&user_id='.$current_user->ID);
if ($str == "5 cards") {
	$bidsys .= "y";
} else {
	$bidsys .= "n";
}
$str = bp_get_profile_field_data('field=15&user_id='.$current_user->ID);
if ($str == "15-17 hcp") {
	$bidsys .= "y";
} else {
	$bidsys .= "n";
}
$str = bp_get_profile_field_data('field=18&user_id='.$current_user->ID);
if ($str == "Weak") {
	$bidsys .= "y";
} else {
	$bidsys .= "n";
}
$str = bp_get_profile_field_data('field=6&user_id='.$current_user->ID);
if ($str == "Yes") {
	$bidsys .= "y";
} else {
	$bidsys .= "n";
}

	$bidsys .= "n";

$txt = '<script>var confirmation = "' . $confirmation . '"; var role = "' . $myRole . '"; var mydomain = "joanbuttsbridge.com"; var userid = ' . $current_user->ID . '; var username = "' . $current_user->user_login . '"; var bidsys = "'.$bidsys.'"; var gamebg = "http://bridge2go.com/Live/Images/play-screen-empty-room.jpg"; var cardstyle = "none"; var characters = "http://skybridgeclub.com/images/play-screen.png"; </script>';
print $txt;

?>



<html>
<head>



</head>
<body>
	

<?
/*
    print $confirmation . "<br>";
    foreach($current_user->role as $role => $Role) {
        print $Role . ",";
    }
*/
?>

<?
/*
    $current_user = wp_get_current_user();	
    echo 'Username: ' . $current_user->user_login . '<br />';
    echo 'User email: ' . $current_user->user_email . '<br />';
    echo 'User first name: ' . $current_user->user_firstname . '<br />';
    echo 'User last name: ' . $current_user->user_lastname . '<br />';
    echo 'User display name: ' . $current_user->display_name . '<br />';
    echo 'User ID: ' . $current_user->ID . '<br />';
    
<form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
    <input type="text" name="user_login" value="Username" id="user_login" class="input" />
    <input type="text" name="user_email" value="E-Mail" id="user_email" class="input"  />
    <?php do_action('register_form'); ?>
    <input type="submit" value="Register" id="register" />
</form>
*/


?>



<div id='gamebody'>Please wait a moment...</div>

<div id='saveshare'>.</div>

<div id='gamecomments'>.</div>

<?
/*
    
*/
?>
<script src='http://bridge2go.com/Live/JavaScripts/Game/bridgeapi1.js'></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-306711-17', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
