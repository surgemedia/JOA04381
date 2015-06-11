<?php
/*==========  taxonomy for Modules  ==========*/

function modules_taxonomy() {

	$labels = array(
		'name'                       => _x( 'modules', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Module', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Lesson Modules', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'modules', array( 'lessons_post' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'modules_taxonomy', 0 );

// Register Custom Post Type
function lessons_post() {

	$labels = array(
		'name'                => _x( 'lessons', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Lesson', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Lessons', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Items', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'add_new_item'        => __( 'Add New Lesson', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'lesson', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array('title',"editor", "thumbnail"),
		'taxonomies'          => array( 'modules' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-welcome-learn-more',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'lesson', $args );

}

// Hook into the 'init' action
add_action( 'init', 'lessons_post', 0 );

function cap_content($cap) {
$content = get_the_content(); 
//get the content from wordpress
$b4trunk = implode(' ', array_slice(explode(' ', $content), 0, $cap)). '... '; 
//takes it out of the array then cuts it up into words and limits how many words it will show
//kinda like serving a cake : you unpack it, cut it up, and serve it on a plate
$trunk = strip_tags($b4trunk); 
echo $trunk; 
}



function next_post_button() {
	// Don't print empty markup if there's nowhere to navigate.

	$next= get_adjacent_post( true, '', false,'modules');

	if ( ! $next ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		
		<div class="nav-links">
			<?php				
				previous_post_link( '<div class="nav-next button">%link</div>',_x( 'Next <span class="meta-nav">&rarr;</span>', 'Next post link',     'base' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

?>
<?php  add_theme_support( 'post-thumbnails' ); ?>
