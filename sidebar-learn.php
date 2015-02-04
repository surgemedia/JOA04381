<div id="sidebar1" class="sidebar fourcol first clearfix sidebar-layout" role="complementary">
<?php 
$user = wp_get_current_user();
$user_id = bp_loggedin_user_id();
$avatarurl = bp_core_fetch_avatar( array( 'item_id' => $user_id,'type'     => 'full', ) );
 ?>
	<div id="current-user">

	<?php do_shortcode('[eyesonly level="royal"]<i class="royal"></i>[/eyesonly]'); ?>

	
		<div class="display-img">
		<?php echo $avatarurl; ?></div>
		<div class="current_info">
			<h2><?php echo $user->display_name; ?></h2>
			<a href="">Beginner</a>
		</div>
	</div>
	<div id="current-product">
	<?php //do_shortcode ?>
	</div>
	<div id="module-extras">
	<?php 
	// Group Link 
	// Royal Member Link
	//Rate
	?>
	</div>
	<?php /* ?>
	<?php if ( is_active_sidebar( 'learn' ) ) : ?>
	<?php dynamic_sidebar( 'learn' ); ?>
	<?php else : ?>
	<!-- DO Nothing -->
	<?php endif;  */ 
	?>

</div>