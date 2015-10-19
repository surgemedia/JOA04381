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
					'posts_per_page'         => '-1',
                    'tax_query' => array(
                            'taxonomy' => 'tribe_events_cat',
                            'field'    => 'slug',
                            'terms'    => 'bridge-holiday',
                        ),
					// 'order'                  => 'ASC',
					'orderby'                => 'date'
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
				 <?php if( strtotime($text_date) < strtotime('now') ) { ?>
                <li class="holiday">
                    <!-- <img class="holiday-img" src="<?php the_sub_field('holiday_image'); ?>"> -->
                    <h3><?php the_title(); ?></h3>
                    <h5 class="date-blue"><?php echo $text_date ?></h5>
                      
                        
                <div class="slider">
                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-sm-12" id="carousel-bounding-box">
                            <div class="carousel slide" id="myCarousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="active item" data-slide-number="0">
                                        <img src="http://placehold.it/470x480&text=zero"></div>

                                    <div class="item" data-slide-number="1">
                                        <img src="http://placehold.it/470x480&text=1"></div>

                                    <div class="item" data-slide-number="2">
                                        <img src="http://placehold.it/470x480&text=2"></div>

                                    <div class="item" data-slide-number="3">
                                        <img src="http://placehold.it/470x480&text=3"></div>

                                    <div class="item" data-slide-number="4">
                                        <img src="http://placehold.it/470x480&text=4"></div>

                                    <div class="item" data-slide-number="5">
                                        <img src="http://placehold.it/470x480&text=5"></div>
                                    
                                    <div class="item" data-slide-number="6">
                                        <img src="http://placehold.it/470x480&text=6"></div>
                                    
                                    <div class="item" data-slide-number="7">
                                        <img src="http://placehold.it/470x480&text=7"></div>
                                    
                                    <div class="item" data-slide-number="8">
                                        <img src="http://placehold.it/470x480&text=8"></div>
                                    
                                    <div class="item" data-slide-number="9">
                                        <img src="http://placehold.it/470x480&text=9"></div>
                                    
                                    <div class="item" data-slide-number="10">
                                        <img src="http://placehold.it/470x480&text=10"></div>
                                    
                                    <div class="item" data-slide-number="11">
                                        <img src="http://placehold.it/470x480&text=11"></div>
                                    
                                    <div class="item" data-slide-number="12">
                                        <img src="http://placehold.it/470x480&text=12"></div>

                                    <div class="item" data-slide-number="13">
                                        <img src="http://placehold.it/470x480&text=13"></div>

                                    <div class="item" data-slide-number="14">
                                        <img src="http://placehold.it/470x480&text=14"></div>

                                    <div class="item" data-slide-number="15">
                                        <img src="http://placehold.it/470x480&text=15"></div>
                                </div>
                                <!-- Carousel nav -->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
           
            <div class="slider-thumbs">
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets">
                   <li class="col-sm-1">
                        <a class="thumbnail" id="carousel-selector-0">
                            <img src="http://placehold.it/150x150&text=zero">
                        </a>
                    </li>

                    <li class="col-sm-1">
                        <a class="thumbnail" id="carousel-selector-1"><img src="http://placehold.it/150x150&text=1"></a>
                    </li>

                    <li class="col-sm-1">
                        <a class="thumbnail" id="carousel-selector-2"><img src="http://placehold.it/150x150&text=2"></a>
                    </li>

                  
                </ul>
            </div>
           

           
           
                    
                </li>
           
			<?php
		}	
			}

				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();

			?>
			 </ul>
             <script>  jQuery(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: 5000
        });
 
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});
             </script>
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