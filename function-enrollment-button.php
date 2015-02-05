<?php 
function getEnrollment($user){
	$current_course = xprofile_get_field_data( 'Current Course', $user, $multi_format = 'comma' );
	return $current_course;
}


function enrollmentButton($course){
	if(isset($_GET['enroll'])){
	$url_var = $_GET['enroll'];
	} else { $url_var = false;}
	$user_id = bp_loggedin_user_id();
	$current_course = getEnrollment($user_id);

	//Check clicked and Dont enroll twice.
	if(true == $url_var && $course->name != $current_course){
	xprofile_set_field_data( 'Current Course', $user_id, $course->name, $is_required = false );
	get_template_part('enrollment/message', 'currently-enrolled' );
	}
	if($course->name == $current_course){ 
	get_template_part('enrollment/message', 'already-enrolled' );
	}

	if(true != $url_var && $course->name != $current_course){ 
	get_template_part('enrollment/part', 'enroll-button' );
	}
}



?>