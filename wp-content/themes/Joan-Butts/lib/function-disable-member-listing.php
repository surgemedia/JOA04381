<?php 
function disable_directory_members() {
global $bp, $wp_query;
$bp->is_directory = false;
bp_core_redirect( $bp->root_domain );
}
add_action( ‘bp_core_action_directory_members’, ‘disable_directory_members’, 2 );
 ?>