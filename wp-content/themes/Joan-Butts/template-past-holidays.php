<?php
/*
Template Name: Past Holiday Page
*/
?>

<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
    bcn_display();
    }?>
</div>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
    <?php the_post_thumbnail( 'single-post-thumbnail', array('class' => 'home-intro-img')); ?>

    <header class="article-header">

        <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

        </header> <!-- end article header -->


 <section id="upcoming-events" class="entry-content clearfix" itemprop="articleBody">
            <?php the_content(); ?>



            <ul id="holiday-list">
            <?php // WP_Query arguments
				$args = array (
					'post_type'              => array( 'tribe_events' ),
					'posts_per_page'         => 25,
                    'eventDisplay'=>        'past',
                    'tax_query' => array(
                            'taxonomy' => 'tribe_events_cat',
                            'field'    => 'slug',
                            'terms'    => 'bridge-holiday',
                        ),
					// 'order'                  => 'ASC',
					'orderby'                => 'ASC'
					);

				// The Query
				$event_query = new WP_Query( $args );
			
				
				// The Loop
				if ( $event_query->have_posts() ) {
					while ( $event_query->have_posts() ) {
						$event_query->the_post();  ?>
					<?php 
				$the_event = get_post();
				$text_date = date("M jS, Y", strtotime($the_event->EventStartDate));
				 ?>
				 <?php //if( strtotime($text_date) < strtotime('now') ) { ?>
                  <?php 
                $images = get_field('gallery'); 


               // debug( get_post_meta( get_the_id() ) );
               // debug(date("Y-m-d", strtotime($the_event->EventStartDate) ));
               // debug(date('Y-m-d'));
                if( $images AND strtotime($the_event->EventEndDate) < strtotime('now') ): ?>
                <li class="holiday">
                    <!-- <img class="holiday-img" src="<?php the_sub_field('holiday_image'); ?>"> -->
                    <h3><?php the_title(); ?></h3>
                    <h5 class="date-blue"><?php echo $text_date ?></h5>
                      
                       
                <div class="slider">
                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-sm-12" >
                            <div class="carousel slide galleryCarousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                <?php for ($i=0; $i < count($images); $i++) {
                                    // debug($images[$i]['sizes']);
                                    if($i == 0) { 
                                        $active = "active";
                                    } else {
                                         $active = "";
                                    }
                                   if(strlen($images[$i]['sizes']['thumbnail']) > 0) {
                                    ?>  
                                  
                                    <div class="<?php echo $active; ?> item" data-slide-number="<?php echo $i; ?>">
                                        <img src="<?php echo $images[$i]['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
                                    </div>
                                    <?php  } } ?>
                                <!-- Carousel nav -->
                                <a class="left carousel-control" href="#sliderGallery-<?php echo get_the_id(); ?>" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#sliderGallery-<?php echo get_the_id(); ?>" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
           
            <div class="slider-thumbs">
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets">
                  <?php for ($i=0; $i < count($images); $i++) { if(strlen($images[$i]['sizes']['thumbnail']) > 0) { ?>
                  
                   <li class="col-md-2 col-sm-6 col-xs-6">
                        <a class="thumbnail" id="carousel-selector-<?php echo $i; ?>">
                            <img src="<?php echo $images[$i]['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>">
                        </a>
                    </li>
                 <?php } } ?>
                  
                </ul>
            </div>
                </li>
           <?php endif; ?>
			<?php
		// }	
			}

				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();

			?>
			 </ul>
            </section> <!-- end article section -->
<?php /* ?>
        <section class="entry-content clearfix" itemprop="articleBody">
            <?php the_content(); ?>

            <?php if(get_field('holidays')): ?>

            <ul id="holiday-list">

                <?php while(has_sub_field('holidays')): ?>

                <li>
                    <img class="holiday-img" src="<?php the_sub_field('holiday_image'); ?>">
                    <h2><?php the_sub_field('holiday_name'); ?></h2>
                    <h3 class="date-blue"><?php the_sub_field('holiday_date'); ?></h3>
                    <p><?php the_sub_field('holiday_description'); ?></p>
                    <div class="holiday-buttons">
                        <a class="gray-button button-margin" href="<?php the_sub_field('flyer_upload'); ?>">Flyer</a>
                        <a class="gray-button" href="<?php the_sub_field('schedule_upload'); ?>">Schedule</a>
                        <a class="button float-right-clean" href="/holidays/register/">Register your interests</a>
                        <?php //the_sub_field('current_past'); ?>
                    </div>
                </li>

                <?php endwhile; ?>

            </ul>

            <?php endif; ?>
            </section> <!-- end article section -->
<?php */ ?>
           
                </article> <!-- end article -->
                <?php endwhile; else : ?>
                
                <?php endif; ?>
                <?php //get_sidebar(); ?>