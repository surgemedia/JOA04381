<div id="sidebar1" class="sidebar fourcol first clearfix sidebar-layout" role="complementary">
<?php  if ( is_user_logged_in() ) {  ?>
<?php 
$user = wp_get_current_user();
$user_id = bp_loggedin_user_id();
$avatarurl = bp_core_fetch_avatar( array( 'item_id' => $user_id,'type'     => 'full', ) );
 ?>
	<div id="current-user">
	<?php  if (get_user_role()=='royal') {  ?>
			<i></i>
	<?php } ?>

	
		<div class="display-img">
		<?php echo $avatarurl; ?></div>
		<div class="current_info">
		<?php  ?>
			<h2><a href="<?php echo site_url().'/members/'.$user->user_login; ?>"> <?php echo $user->display_name; ?></h2></a>
		<a><?php  echo getSkillLevel(); ?></a>
		</div>
	</div>
<?php }  else { ?>
<?php if ( is_active_sidebar( 'sidebar1' ) ) { ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php } ?>
<?php } ?>
<?php if (!is_page('learn')) { ?>
	<div id="current-product">
		<h2>Recommended books</h2>
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
		<h2>Course Activites</h2>
		<ul>
			<li class="pink button"><span class="dashicons dashicons-groups"></span>
			<a>Discuss This</a>
			</li> 
				
			<li class="pink button"><span class="dashicons dashicons-awards"></span>
			<a href="<?php echo site_url(); ?>/upgrade ">Upgrade</a>
			</li> 

			
		</ul>
	</div>
	<?Php } else {
			 get_template_part('enrollment/message', 'user-levels' );	
		}?>
</div>