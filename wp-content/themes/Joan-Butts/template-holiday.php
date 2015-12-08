<?php
/*
Template Name: Holiday Page
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
        <?php the_content(); ?>
        </header> <!-- end article header -->
 <section id="upcoming-events" class="entry-content clearfix" itemprop="articleBody">
            <ul id="holiday-list">
            <?php // WP_Query arguments
                $GLOBAL['page'] = $post->post_name;
                switch ($GLOBAL['page']) {
                    case 'upcoming-holidays':
                        $terms = 'bridge-holiday';
                        $class = 'bridge-holiday';
                        break;
                    case 'timetable':
                        $terms = array('live-lessons','live-lessons-at-other-clubs');
                        $class = 'live-lessons';
                        break;
                    case 'events':
                        $terms = array('abf-teacher-training-programmes');
                        $class = 'teacher-education';
                        break;
                    default:
                        $terms = '';
                        $class = 'default';
                        break;
                }
                $args = array (
					'post_type'              => array( 'tribe_events' ),
                    'posts_per_page'         => -1,
                    'eventDisplay'=>        'present',
                    'tax_query' => array( array (
                            'taxonomy' => 'tribe_events_cat',
                            'field'    => 'slug',
                            'terms'    => $terms,
                            ),
                        ),
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

				 <?php /*if( strtotime($text_date) > strtotime('now') ) {*/ ?>
                <li class="holiday <?php echo $class ?>">
                    <?php
                        if(get_sub_field('holiday_image')) { ?>
                            <img class="holiday-img" src="<?php the_sub_field('holiday_image'); ?>">
                    <?php } ?>
                    <h3 class="holiday-title"><?php the_title(); ?></h3>
                    <h5 class="date-blue"><?php echo $text_date ?></h5>
                    <p>  <?php the_content(); ?></p>
                    <div class="holiday-buttons">
                        
                            <?php if(get_field('flyer')){ ?>
                            <a target="_blank" class="btn" href="<?php the_field('flyer'); ?>">Flyer</a>
                            <?php } else { ?>
                            <a target="_blank" class="btn disabled" href="#">Flyer Coming Soon</a>
                            <?php } ?>

                            <?php if(strlen(get_field('schedule'))){ ?>
                            <a target="_blank" class="btn" href="<?php the_field('schedule'); ?>">Schedule</a>
                           
                              <?php } else { ?>
                            <a target="_blank" class="btn disabled" href="#">Schedule Coming Soon</a>
                            <?php } ?>
                       
                        <a class="btn view-details" href="<?php echo get_permalink(); ?>">View Details</a>
                    </div>
                </li>
           
			<?php
		// }	
			}

				} else {
					echo "no post";// no posts found
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