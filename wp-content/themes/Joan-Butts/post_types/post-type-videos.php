<?php 
// Register Custom Post Type
function video_post_type() {

	$labels = array(
		'name'                => _x( 'Videos', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Video', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Videos', 'text_domain' ),
		'name_admin_bar'      => __( 'Videos', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Video:', 'text_domain' ),
		'all_items'           => __( 'All videos', 'text_domain' ),
		'add_new_item'        => __( 'Add New Video', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Video', 'text_domain' ),
		'edit_item'           => __( 'Edit Video', 'text_domain' ),
		'update_item'         => __( 'Update Video', 'text_domain' ),
		'view_item'           => __( 'View Video', 'text_domain' ),
		'search_items'        => __( 'Search Video', 'text_domain' ),
		'not_found'           => __( 'Video Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Video Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Video', 'text_domain' ),
		'description'         => __( 'Videos', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', ),
		'taxonomies'          => array( 'video_categories'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-video',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'video', $args );

}
add_action( 'init', 'video_post_type', 0 );

// Register Custom Taxonomy
function video_taxonomy() {

	$labels = array(
		'name'                       => _x( 'categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Category', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'video_categories', array( 'video' ), $args );

}
add_action( 'init', 'video_taxonomy', 0 );