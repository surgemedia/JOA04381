<?php  if ( is_user_logged_in() ) {  ?>

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
