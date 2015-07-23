<?php 
// Register Custom Post Type
function holidays_post_type() {

	$labels = array(
		'name'                => _x( 'Holidays', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Holiday', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Holidays', 'text_domain' ),
		'name_admin_bar'      => __( 'Holidays', 'text_domain' ),
		'parent_item_colon'   => __( 'Holiday Item:', 'text_domain' ),
		'all_items'           => __( 'All Holiday', 'text_domain' ),
		'add_new_item'        => __( 'Add New Holiday', 'text_domain' ),
		'add_new'             => __( 'Add Holiday', 'text_domain' ),
		'new_item'            => __( 'New Holiday', 'text_domain' ),
		'edit_item'           => __( 'Edit Holiday', 'text_domain' ),
		'update_item'         => __( 'Update Holiday', 'text_domain' ),
		'view_item'           => __( 'View Holiday', 'text_domain' ),
		'search_items'        => __( 'Search Holiday', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'holiday', 'text_domain' ),
		'description'         => __( 'Holdiays', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'          => array( 'past_holiday' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-calendar-alt',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'holiday', $args );

}

// Hook into the 'init' action
add_action( 'init', 'holidays_post_type', 0 );

?>