<h3 class="section-title">Books: Learn from the experts</h3>
<section class="products-carousel">
	<div id="products-carousel" class="carousel slide" data-ride="carousel" data-interval="false">
		<div class="carousel-inner" role="listbox">
			<?php 
				// WP_Query arguments
				$args = array (
					'post_type'              => array( 'product' ),
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
						
						 
			?>
							<?php echo $startCarousel; ?>	
								<div class="product-obj col-md-2">
									<div class="image-container"><?php the_post_thumbnail(); ?></div>
									<div class="title-container"><p class="title"><?php the_title(); ?></p></div>
									<?php echo do_shortcode('[add_to_cart  id="'.get_the_ID().'"]') ?>
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
					<a class="right carousel-control" href="#products-carousel" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					    <span class="more">More</span>
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