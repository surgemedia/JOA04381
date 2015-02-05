<?php 
function enrollmentButton($course){
	$output = debug($course);
	$output .= bp_loggedin_user_id();
	$user_id = bp_loggedin_user_id();
	xprofile_set_field_data( 'current-course', $user_id, $course->term_id, $is_required = false );
	echo $output;
}
?>