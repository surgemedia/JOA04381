<?php
function getUser(){
$user = bp_loggedin_user_id();
	return $user;
}
function getEnrollment($user){
	$current_course = xprofile_get_field_data( 'Current Module', $user, $multi_format = 'comma' );
	return $current_course;
}

function completeLessonButton($lesson) {
	if(is_user_logged_in()){
	if(isset($_GET['finished-lesson'])){
	$url_var = $_GET['finished-lesson'];
	} else { $url_var = false;}
	$user_id = getUser();
	$completedlesson = xprofile_get_field_data( 'Completed Lessons', $user_id, $is_required = false);	
	// debug($completedlesson);
	//echo "<br><br><hr>";
	$texture_title = wptexturize($lesson);
	$texture_list = wptexturize($completedlesson);

	// debug("texturize ".wptexturize($lesson));
	// debug("texturize ".wptexturize($completedlesson));
	//debug($encoded_list);

	// debug(urlencode($completedlesson));
	//var_dump( strpos($texture_list,$texture_title) );

	if( true != $url_var && false != strpos($texture_list,$texture_title)){
		get_template_part('enrollment/message', 'already-completed' ); //"You have already completed the lesson"
		}
	} else {
		// get_template_part('enrollment/message', 'please-login' );
	}
	if(true != $url_var && false == strpos($texture_list,$texture_title)){
		get_template_part('enrollment/part', 'lesson-button' ); //"Complete Lesson";
		} 
	if($url_var){	
		$completedlesson = xprofile_get_field_data( 'Completed Lessons', $user_id);
		// debug($completedlesson)	;
		$completedlesson = trim($completedlesson,",");
		// debug($completedlesson)	;
 		$completedlesson = explode(",",$completedlesson);
 		// debug($completedlesson)	;
 	  	if(!in_array($lesson, $completedlesson)) {
 	  		$completedlesson = implode(",", $completedlesson);
 	  		// debug($completedlesson)	;
			$completedlesson .= ",".$lesson;
			// debug($completedlesson)	;
			xprofile_set_field_data( 'Completed Lessons', $user_id, $completedlesson, $is_required = false );
			// debug($completedModule)	;
		}	
		// debug($completedlesson);
		echo '<p class="hide">';
		updateCompletedModules(); //function to update completed modules in buddypress fields
		echo '</p>';
		get_template_part('enrollment/message', 'currently-completed' ); //"Congrats,You completed the lesson";

	}
	
}

function getProgress($lesson){
	$user_id = getUser();
	$status = xprofile_get_field_data( 'Completed Lessons', $user_id, $is_required = false );
	//sanitized
	$texture_title = wptexturize($lesson);
	$texture_list = wptexturize($status);
	$texture_list = trim($texture_list,",");
	$texture_list = explode(",",$texture_list);
	// debug($texture_list);
	// debug(in_array($texture_title,$texture_list));
	$GLOBALS['count_complete'] = 1;
	// if (false != strpos($texture_list,$texture_title)) {
	if (in_array($texture_title,$texture_list)) {
		get_template_part('enrollment/badge', 'completed' ); }
	}

function enrollmentButton($course){
	if(is_user_logged_in()){
		if(isset($_GET['enroll'])){
			$url_var = $_GET['enroll'];
			} else { $url_var = false;}
		$user_id = bp_loggedin_user_id();
		$current_course = getEnrollment($user_id);
		//Check clicked and Dont enroll twice.
		if(true == $url_var && $course->name != $current_course){
		xprofile_set_field_data( 'Current Module', $user_id, $course->name, $is_required = false );
		get_template_part('enrollment/message', 'currently-enrolled' ); 
		}
		if($course->name == $current_course){
		get_template_part('enrollment/message', 'already-enrolled' );
		}
		if(true != $url_var && $course->name != $current_course){
			get_template_part('enrollment/part', 'enroll-button' ); 
		  }
	} else {
		get_template_part('enrollment/message', 'please-login' );
	}
}


function getSkillLevel(){
	return xprofile_get_field_data( 'Bridge Skill', getUser(), $is_required = false );
}
?>