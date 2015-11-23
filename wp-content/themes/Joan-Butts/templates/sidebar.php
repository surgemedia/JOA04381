<?php  ?>

<?php 
wp_reset_postdata();
if(is_page()){
 $template_file = get_post_meta( get_the_ID(), '_wp_page_template', TRUE );
 // echo "Page Template ".$template_file;

} elseif(is_single()) {
$template_file = get_post_type();
 // echo "Single ".$template_file;

} elseif(is_tax()) {
	$template_file = get_post_type();
	// debug($template_file);
}
//debug( get_post_meta( get_the_id() ));
?>
<?php switch ($template_file) {

		case 'template-teachers.php':
			get_sidebar('teacher');
			break;
		case 'template-Leaderboard.php':
			if(strlen(get_user_role())>0) {
				get_sidebar('leaderboard');
			}
			break;
		case 'template-modules.php':
			get_sidebar('learn');
			break;
		case 'lesson':
			get_sidebar('learnsingle');
			break;
		default:
		wp_reset_postdata();
		// debug( get_field('sidebar_navigation'));
			if(sizeof(get_field('sidebar_navigation')) > 0) { ?>
			<h3><?php get_field('sidebar_title') ?></h3>
			<ul>
			<?php
			// ---------------------
			$side_args = array ( 
				'post_type' => 'page',
				'post__in' => get_field('sidebar_navigation'), );  $sidebar_query = new WP_Query( $side_args );
			if ( $sidebar_query->have_posts() ) { while ( $sidebar_query->have_posts() ) { $sidebar_query->the_post(); ?>
					<!-- Get Link -->
					<li><a href="<?php echo get_permalink(); ?> "><?php the_title(); ?></a></li>
			<?php	} } wp_reset_postdata();
			// ---------------------
			} 
			?>
			</ul>
			<?php
			dynamic_sidebar('sidebar-primary');
			break;
	} 

?>
	