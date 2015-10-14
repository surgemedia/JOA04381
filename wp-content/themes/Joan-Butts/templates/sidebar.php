<?php  ?>

<?php 
wp_reset_postdata();
if(is_page()){
 $template_file = get_post_meta( get_the_ID(), '_wp_page_template', TRUE );
 // echo "Page Template ".$template_file;

} elseif(is_single()) {
$template_file = get_post_type();
 // echo "Single ".$template_file;

}
//debug( get_post_meta( get_the_id() ));
?>
<?php switch ($template_file) {
	case 'template-teachers.php':
		get_sidebar('teacher');
		break;
	case 'template-Leaderboard.php':
		get_sidebar('leaderboard');
		break;
	case 'template-modules.php':
		get_sidebar('learn');
		break;
	default:
		dynamic_sidebar('sidebar-primary');
		break;
} 
?>