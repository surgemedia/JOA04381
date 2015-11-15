<?php

function get_user_role(){
	$user_ID = bp_loggedin_user_id();
if ( is_user_logged_in() ) {
	$user = new WP_User( $user_ID );
	if ( !empty( $user->roles ) && is_array( $user->roles ) ) {
		foreach ( $user->roles as $role )
			return $role;
	}
}
}
function resetUser() {
	if(get_user_role() !='administrator' & get_user_role()!='royal' & get_user_role()!='client') {
        wp_update_user(array('ID'=>getUser(),'role'=>'free_member'));
    }
}
?>