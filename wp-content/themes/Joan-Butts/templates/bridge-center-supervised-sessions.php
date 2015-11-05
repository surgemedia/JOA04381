
    <?php // WP_Query arguments
        $args = array (
		'post_type'              => array( 'tribe_events' ),
              'posts_per_page'         => 5,
              'eventDisplay'=>        'present',
              'tax_query' => array( array (
                      'taxonomy' => 'tribe_events_cat',
                      'field'    => 'slug',
                      'terms'    => 'supervised-sessions',
                      ),
                  ),
              'orderby'                => 'ASC'
		);
	    // The Query
		$event_query = new WP_Query( $args );
	
		
		// The Loop
		if ( $event_query->have_posts() ) {
			?>
			<section class="supervised-sessions">
				<h2>Supervised Sessions</h2>
				<p>Ask for advice from your tutor. Each session starts with a practice hand with Joan. No need to come with a partner.</p>
				<ul id="holiday-list">
					<?php
					while ( $event_query->have_posts() ) {
						$event_query->the_post();  ?>
						<?php 
						$the_event = get_post();
						$text_date = date("M jS, Y", strtotime($the_event->EventStartDate));
						 ?>
					    <?php /*if( strtotime($text_date) > strtotime('now') ) {*/ ?>
				            <li class="holiday live-lessons">
				                <?php
				                    if(get_sub_field('holiday_image')) { ?>
				                        <img class="holiday-img" src="<?php the_sub_field('holiday_image'); ?>">
				                <?php } ?>
				                <h3 class="holiday-title"><?php the_title(); ?></h3>
				                <h5 class="date-blue"><?php echo $text_date ?></h5>
				                <p>  <?php the_content(); ?></p>
				                <div class="holiday-buttons">
				                    <a class="btn view-details" href="<?php echo get_permalink(); ?>">View Details</a>
				                </div>
				            </li>
				        
					    <?php
					// }	
					}
					?>
				</ul>	
			</section>
			<?php
		} else {
			// no posts found
		}
	// Restore original Post Data
		wp_reset_postdata();
?>