<?php
/*
Template Name: Game Screen
*/
?>
<?php // get_header(); ?>
<?
require_once('wp-config.php');
require_once('wp-includes/wp-db.php');
require_once('wp-includes/pluggable.php');
require_once('wp-load.php');
require_once('wp-includes/registration.php');

if(is_user_logged_in()) {
autoUpgrade();

global $userdata;
global $current_user;
global $wpdb, $wp_roles;

// $role = $wpdb->prefix . 'capabilities';
// $current_user->role = array_keys($current_user->$role);

// $myRole = "none";
// foreach($current_user->role as $role => $Role) {
//     if ($Role == "royal" || $Role == "administrator" || $Role == "administrator") {
// 	$myRole = $Role;
//     }
// }

$myRole = get_user_role();


$confirmation = "CONFIRM";

if ( is_user_logged_in() ) {
    //
} else {
    $confirmation = "NOTLOGGEDIN";
}


$bidsys = "";

$str = bp_get_profile_field_data('field=2&user_id='.$current_user->ID);
if ($str == "5 cards" OR strlen($str) <= 0) {
	$bidsys .= "y";
} else {
	$bidsys .= "n";
}
$str = bp_get_profile_field_data('field=15&user_id='.$current_user->ID);
if ($str == "15-17 hcp" OR strlen($str) <= 0) {
	$bidsys .= "y";
} else {
	$bidsys .= "n";
}
$str = bp_get_profile_field_data('field=11&user_id='.$current_user->ID);
if ($str == "Weak" OR strlen($str) <= 0 ) {
	$bidsys .= "y";
} else {
	$bidsys .= "n";
}
$str = bp_get_profile_field_data('field=6&user_id='.$current_user->ID);
if ($str == "Yes" OR strlen($str) <= 0) {
	$bidsys .= "y";
} else {
	$bidsys .= "n";
}

	$bidsys .= "n";

$txt = '<script>var confirmation = "' . $confirmation . '"; var role = "' . $myRole . '"; var mydomain = "joanbuttsbridge.com"; var userid = ' . $current_user->ID . '; var username = "' . $current_user->user_login . '"; var bidsys = "'.$bidsys.'"; var gamebg = "http://bridge2go.com/Live/Images/play-screen-empty-room.jpg"; var cardstyle = "none"; var characters = "http://skybridgeclub.com/images/play-screen.png"; </script>';
print $txt;

}

?>
<html>
<head>

<link rel="stylesheet" type="text/css" href="http://bridge2go.com/Live/JavaScripts/Game/GameCss.php?thismydomain=joanbuttsbridge&GAMEBG=httpCOLONPLUSPLUSjoanbuttsbridge.comPLUSwp-contentPLUSthemesPLUSjoan-buttsPLUSgame_graphicsPLUSplay-screen.png&CARDSTYLE=none&CHAR=httpCOLONPLUSPLUSjoanbuttsbridge.comPLUSwp-contentPLUSthemesPLUSjoan-buttsPLUSgame_graphicsPLUSplay-screen.png&">

<style>
html,
  body.customize-support {
    background-color: rgb(114, 190, 221);
    /*margin: 0px;*/
}
</style>
<?php 
$lesson_id = $_GET['id'];
// echo $lesson_id;
$lesson_post = get_post($_GET['id']);
$lesson_meta = get_post_meta($_GET['id'])['free_lesson'][0];

?>
</head>
<body>

<?php 


if(!is_user_logged_in()){
  echo '<script> window.location.replace("http://joanbuttsbridge.com/register");</script>';
  };


  if( get_user_role() =='free_member' && $_GET['val'] != 4 && $lesson_meta != 1) {
  echo '<script> window.location.replace("http://joanbuttsbridge.com/almost-there");</script>';
  };

  if(is_user_logged_in()) {
?>

    <div id='gamebody'>Please wait a moment...</div>

    <div id='saveshare'></div>

    <div id='gamecomments'></div>

    <!-- <div id="actions">
      <a href="javascript:history.go(-1);" class="button">
        Exit Game
      </a>
    </div> -->
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
<?php 
  } 
?>

</body>
</html>
