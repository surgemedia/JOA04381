
	<?php  if ( is_user_logged_in() ) {  ?>
	<?php
	$user = wp_get_current_user();
	$user_id = bp_loggedin_user_id();
	$avatarurl = bp_core_fetch_avatar( array( 'item_id' => $user_id,'type' => 'full', ) );
	?>
	<?php /*<div id="current-user">
		<?php  if (get_user_role()=='royal') {  ?>
			<i></i>
	<?php }  ?>
		
		<div class="display-img">
		<?php echo $avatarurl; ?></div>
		<div class="current_info">
		
			<h2><a href="<?php echo site_url().'/members/'.$user->user_login; ?>"> <?php echo $user->display_name; ?></h2></a>
			<a ><?php echo getSkillLevel(); ?></a>
			
		</div>
	</div>*/?>
	<?php }  else { ?>
	<?php if ( is_active_sidebar( 'sidebar1' ) ) { ?>
	<?php dynamic_sidebar( 'sidebar1' ); ?>
	<?php } ?>
	<?php } ?>
	<div id="current-product">
		<h3>Recommended books</h3>
		<?php
		$terms = get_the_terms( get_the_ID(), 'modules');
		if( !empty($terms) ) {
			$term = array_pop($terms);
			$custom_field = get_field('text_book', $term );
			for ($i=0; $i < count($custom_field); $i++) { 
				echo do_shortcode('[product id="'.$custom_field[$i].'"]');
			}
			
		}
	?>	
	</div>
	
	<div id="module-extras">
		<h3>Course Activites</h3>
		<ul>
			<li>
			<?php $groupslug = $GLOBALS['current_course_obj']->slug ?>
			<a class="btn btn-primary" href="<?php echo site_url(); ?>/groups/<?php echo $GLOBALS['group_single_slug'] ?>">Discuss this<span class="dashicons dashicons-groups"></span></a>
		</li>
		

		<li>
			<?php get_template_part('templates/button','upgrade-user');?>
		</li>
	
</ul>
