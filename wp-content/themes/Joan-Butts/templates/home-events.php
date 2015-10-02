<section class="events-carousel">
	<div id="events-carousel" class="carousel slide" data-ride="carousel" data-interval="false">
		<div class="carousel-inner" role="listbox">
			<?php 
				// WP_Query arguments
				$args = array (
					'post_type'              => array( 'tribe_events' ),
					// 'posts_per_page'         => '6',
					// 'order'                  => 'ASC',
					'orderby'                => 'date'
					);

				// The Query
				$event_query = new WP_Query( $args );
				$i=0;
				// The Loop
				if ( $event_query->have_posts() ) {
					while ( $event_query->have_posts() ) {
						$event_query->the_post(); 
						if($i==0) { //1st item in carousel should be active
							$activeClass = 'active'; 
						}
						if($i % 5 == 0 ) { //5 events should fit in 1 item of carousel
							$startCarousel = '<div class="item '.$activeClass.'">'; 
							$endCarousel = '';
						}
						elseif (($i+1)%5 == 0) { //after 5 events close the item of carousel
							$startCarousel = '';
							$endCarousel = '</div>';
						}
						else {
							$startCarousel = '';
							$endCarousel = '';
						}
						$the_event = get_post();
						$text_date = date("M jS, Y", strtotime($the_event->EventStartDate));
			?>
							<?php echo $startCarousel; ?>	
								<div class="event-obj">
									<p><?php the_title(); ?></p>
									<p><?php echo $text_date ?></p>
								</div>
							<?php echo $endCarousel; ?>	
						<?php //debug(get_post());
						//debug(get_post_meta(get_the_id()));	 ?>

			<?php 	
						$activeClass = '';
						$i++;	
				 	}
				 	if($i%5 != 0) { //if last item in carousel has less than 5 events, while loop doesnt close item. hence checking and closing here
			?>
						</div>
			<?php
				 	}
			?>
					</div> <!-- Close of carousel-inner-->
					<!-- Controls -->
					<a class="left carousel-control" href="#events-carousel" role="button" data-slide="prev">
					    <span class="icon-chevron" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#events-carousel" role="button" data-slide="next">
					    <span class="icon-chevron right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					</a>
			<?php
				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();

			?>

		
	</div>
</section>