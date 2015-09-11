<?php
/*/
Plugin Name: MakeSomeButtons
Plugin URI: www.skybridgeclub.net
Description: Buttons depending on user priveleges
Version: 4
Date: 2015, Aug 06
Author: Graeme Tuffnell
/*/
function basic_content_replace_buttons ($text)
{
	
	global $userdata;
	global $current_user;
	global $wpdb, $wp_roles;
	get_currentuserinfo();
			

	$sethandsstart = "";
	$sethandsend = "";
	$sethandstipsstart = "";
	$sethandtipsend = "";
	
	$sethandsfreestart = "";
	$sethandsfreeend = "";	
	$sethandstipsfreestart = "";
	$sethandtipsfreeend = "";

        $lessonhandsstart = "";
        $lessonhandsend = "";
	
	if ( is_user_logged_in() ) {
	  $myRole = "none";
	  $role = $wpdb->prefix . 'capabilities';
	  $current_user->role = array_keys($current_user->$role);
	  foreach($current_user->role as $role => $Role) {
	    if ($Role == "administrator" || $Role == "royal") {
		$myRole = $Role;
	    }
	  }
	  if ($myRole == "none") {		
		$sethandsstart = "<a class='";
		$sethandsend = " button icon-play button_filled button_blue' href='/play-bridge-online/'>Upgrade to play lesson hands</a>";
		$sethandstipsstart = "<a class='";
		$sethandstipsend = " button icon-play button_filled button_blue' href='/play-bridge-online/'>Upgrade to play tips hands</a>";
	  } else {
		$sethandsstart = "<a class='button icon-play button_filled button_blue' href='/play/?game=hands&val=";
		$sethandsend = "'>PLAY LESSON HANDS</a>";
		$sethandstipsstart = "<a class='button icon-play button_filled button_blue' href='/play/?game=hands&level=0&val=";
		$sethandstipsend = "'>PLAY TIPS HANDS</a>";	
	  }  
          
	  $sethandsfreestart = "<a class='button icon-play button_filled button_blue' href='/play/?game=hands&val=";
	  $sethandsfreeend = "'>PLAY LESSON HANDS</a>";
	  $sethandstipsfreestart = "<a class='button icon-play button_filled button_blue' href='/play/?game=hands&level=0&val=";
	  $sethandstipsfreeend = "'>PLAY TIPS HANDS</a>";
          $lessonhandsstart = "<a class='button icon-play button_filled button_blue' href='/play/?game=coffee&val=";
          $lessonhandsend = "'>PLAY LESSON HANDS</a>";
	} else {
		$sethandsstart = "<a class='";
		//$sethandsend = "' href='/login/' >login to play lesson hands</a>";
		$sethandsend = "' href='/wp-login.php' >login to play lesson hands</a>";
		
		$sethandsfreestart = "<a class='";
		//$sethandsend = "' href='/login/' >login to play lesson hands</a>";
		$sethandsfreeend = "' href='/wp-login.php' >login to play lesson hands</a>";
		
		$sethandstipsstart = "<a class='";
		//$sethandstipsend = "' href='/login/' >login to play tips hands</a>";		
		$sethandstipsend = "' href='/wp-login.php' >login to play tips hands</a>";
		
		$sethandstipsfreestart = "<a class='";		
		//$sethandstipsfreeend = "' href='/login/' >login to play tips hands</a>";
		$sethandstipsfreeend = "' href='/wp-login.php' >login to play tips hands</a>";
	}
	
	$text = str_replace("[sethands]",$sethandsstart,$text);
	$text = str_replace("[/sethands]",$sethandsend,$text);
	$text = str_replace("[sethandsfree]",$sethandsfreestart,$text);
	$text = str_replace("[/sethandsfree]",$sethandsfreeend,$text);
	$text = str_replace("[sethandstips]",$sethandstipsstart,$text);
	$text = str_replace("[/sethandstips]",$sethandstipsend,$text);
	$text = str_replace("[sethandstipsfree]",$sethandstipsfreestart,$text);
	$text = str_replace("[/sethandstipsfree]",$sethandstipsfreeend,$text);
	$text = str_replace("[lessonhands]",$lessonhandsstart,$text);
	$text = str_replace("[/lessonhands]",$lessonhandsend,$text);
	return $text;
}

add_filter("the_content","basic_content_replace_buttons");
//add_filter("the_title","basic_content_replace_buttons");
?>