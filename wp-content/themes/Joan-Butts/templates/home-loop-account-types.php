<section class="clearfix">
	<div class="account-types">
		<h3 class="title">Lessons - Online</h3>
		<div class="description"><?php the_field('lessons-online_text'); ?></div>
		<div class="row">
	  	<?php 
			  // WP_Query arguments
			$args = array (
			  'post_type'              => array( 'account_type' ),
			);

			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
			  while ( $query->have_posts() ) {
			    $query->the_post();
		?>
				
		<?php
			    get_template_part('templates/single-account-types');
			  }
			} else {
			    // get_template_part('templates','single','account-types');
			}

			// Restore original Post Data
			wp_reset_postdata();
		?>
		</div>
	</div>
</section>