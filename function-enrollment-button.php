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
	if(isset($_GET['finished-lesson'])){
	$url_var = $_GET['finished-lesson'];
	} else { $url_var = false;}
	$user_id = getUser();
	$current_course = getEnrollment($user_id);

	if(true == $url_var && $course->name != $current_course){
		get_template_part('enrollment/message', 'not-enrolled' );	
	}
	if(true != $url_var && $course->name != $current_course){
		get_template_part('enrollment/part', 'lesson-button' );
		completeLesson($user_id,$lesson);
	}	
	if(true == $url_var && $course->name == $current_course){
		get_template_part('enrollment/message', 'please-login' );
	}
	$currentProgress = xprofile_get_field_data( 'Completed Lessons', $user_id, $is_required = false );

	//add a lesson completion to the table
	//xprofile_set_field_data( 'Completed Lessons', $usert_id, $currentProgress + 1);
	//debug($current_course);
	//debug($currentProgress);

}
function completeLesson($user_id,$lesson){
	$currentProgress = xprofile_get_field_data( 'Completed Lessons', getUser(), $is_required = false );
	
	debug($lesson."=lesson");
	array_push($currentProgress,'5852');
	debug($currentProgress);
	xprofile_set_field_data( 'Completed Lessons', getUser(), '5852');

	$after = xprofile_get_field_data( 'Completed Lessons', getUser(), $is_required = false );
	echo '<hr>';
	debug($after);

}

function completeCourse(){

}

function getProgress($module,$user_id,$current_post){
	$status = xprofile_get_field_data( 'Completed Lessons', $user_id, $module->name, $is_required = false );
	for ($i=0; $i < sizeof($status); $i++) {
		$clean_cp = strip_tags(str_replace(" ", "-", $current_post));
		$clean_stat = strip_tags(str_replace(" ", "-", $status[$i]));
		if($clean_stat == $clean_cp){
			get_template_part('enrollment/badge', 'completed' );
		} else {
				//echo $clean_cp." ".$clean_stat;
		}
	}
	
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
?>