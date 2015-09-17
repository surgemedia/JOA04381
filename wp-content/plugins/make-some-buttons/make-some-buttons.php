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

	$sethandsfreestart = "<a class='button icon-play button_filled button_blue' href='/play/?game=hands&val=";
	$sethandsfreeend = "'>PLAY LESSON HANDS</a>";
	$sethandstipsfreestart = "<a class='button icon-play button_filled button_blue' href='/play/?game=hands&level=0&val=";
	$sethandstipsfreeend = "'>PLAY TIPS HANDS</a>";
    $lessonhandsstart = "<a class='button icon-play button_filled button_blue' href='/play/?game=coffee&val=";
    $lessonhandsend = "'>PLAY LESSON HANDS</a>";
	
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