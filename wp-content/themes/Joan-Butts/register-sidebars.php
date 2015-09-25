<?php 
function jbb_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'jbbtheme'),
		'description' => __('The first (primary) sidebar.', 'jbbtheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'id' => 'upcomingevents',
		'name' => __('Upcoming Events', 'jbbtheme'),
		'description' => __('Upcoming Events widget on home page', 'jbbtheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'id' => 'calendarevents',
		'name' => __('Calendar Events', 'jbbtheme'),
		'description' => __('Calendar Events sidebar', 'jbbtheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'learnsingle',
		'name' => __('learnsingle', 'jbbtheme'),
		'description' => __('Learn Single Sidebar', 'jbbtheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
    register_sidebar(array(
		'id' => 'learn',
		'name' => __('learn', 'jbbtheme'),
		'description' => __('Learn Section Sidebar', 'jbbtheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	?>