<div id="sidebar1" class="sidebar fourcol first clearfix sidebar-layout" role="complementary">
<?php 
$user = wp_get_current_user();
//debug($user);
$user_id = bp_loggedin_user_id();
$avatarurl = bp_core_fetch_avatar( array( 'item_id' => $user_id,'type'     => 'full', ) );
 ?>
	<div id="current-user">
	<?php  if (get_user_role()=='administrator') {  ?>
			<i></i>
	<?php } ?>

	
		<div class="display-img">
		<?php echo $avatarurl; ?></div>
		<div class="current_info">
			<a href="<?php echo site_url(); ?>/members/<?php echo $user->user_login; ?>"><h2><?php echo $user->display_name; ?></h2></a> 
			<span><?php 
			$GLOBALS['level'] = xprofile_get_field_data( 'Bridge Skill', $user_id, $is_required = false );
			echo  $GLOBALS['level']; ?></span>
		</div>
	</div>


<?php if (!is_page('learn')) { ?>
	<div id="current-product">
		<h2>Recommened Books</h2>
		<?php  
		$field = get_field('text_book',$GLOBALS['current_course_obj']);
		//debug($field[0]);

		$GLOBALS['ID']=$field[0]->ID;
		

		echo do_shortcode('[product id="'.$GLOBALS['ID'].'"]')?>	
		
	</div>


	<div id="module-extras">
		<h2>Course Activites</h2>
		<ul>
			<li><span class="dashicons dashicons-groups"></span>
			<?php $groupslug = $GLOBALS['current_course_obj']->slug ?>
			<a href="<?php echo site_url(); ?>/groups/<?php echo $groupslug ?>">Discuss This</a>
			
			</li>
				
			<li class="yellow button"><span class="dashicons dashicons-awards"></span>
			<a href="<?php echo site_url(); ?>/upgrade ">Get Royal</a>
			</li>

			<li><span class="dashicons dashicons-heart"></span>
			<a>Rate This</a>
			</li>
		</ul>
	<?php 
	// Group Link text
	// Royal Member Link upgrade
    //Rate
	 ?>

	

	</div>
	<?Php } ?>
	<?php /* ?>
	<?php if ( is_active_sidebar( 'learn' ) ) : ?>
	<?php dynamic_sidebar( 'learn' ); ?>
	<?php else : ?>
	<!-- DO Nothing -->
	<?php endif;  */ 
	?>

</div>