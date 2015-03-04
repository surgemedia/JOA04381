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

	if(true != $url_var && -1 >= strpos($completedlesson,$lesson)){
		get_template_part('enrollment/part', 'lesson-button' ); //"Complete Lesson";
		} 
	if($url_var){	
		$completedlesson .= $lesson.",";
		xprofile_set_field_data( 'Completed Lessons', $user_id, $completedlesson, $is_required = false );
		get_template_part('enrollment/message', 'currently-completed' ); //"Congrats,You completed the lesson";
	}
	if( true != $url_var && strpos($completedlesson,$lesson) !== false){
		get_template_part('enrollment/message', 'already-completed' ); //"You have already completed the lesson"
		}
	} else {
		get_template_part('enrollment/message', 'please-login' );
	}
}

function getProgress($lesson){
	$user_id = getUser();
	$status = xprofile_get_field_data( 'Completed Lessons', $user_id, $is_required = false );
	$GLOBALS['count_complete'] = 1;
	if (strpos($status, $lesson) !== false) {
		get_template_part('enrollment/badge', 'completed' ); }}

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