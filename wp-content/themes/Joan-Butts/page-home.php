<?php
/*
Template Name: Home Page
*/
?>
<?php
get_header(); ?>
<?php /* ?>
<div id="home-banner-container" class="container">
    <img src="<?php
    bloginfo('template_directory'); ?>/library/images/welcome-to-joan-butts.png">
    <?php
    if (is_user_logged_in()) {
        print '<a class="big-pink-button pink-button-slider" href="/play/?game=set&amp;val=4">Free hand of the day</a>';
    }
    else {
        print '<a class="big-pink-button pink-button-slider" href="/register">Free hand of the day</a>';
    }
    ?>
</div>
<?php */ ?>
<div id="content-home" class="container">
    <div id="home-box-nav">
        <div class="inner">
            <div class="threecol-home col-lg-2 first">
                <a href="learn">
                <h2>Lessons Online</h2>
                <small>Find out more...</small>
                <span class="placeholder blue"><span class="dashicons dashicons-welcome-learn-more"></span></span>
                </a>
            </div>
            <div class="threecol-home col-lg-2">
                <a href="play-bridge-online">
                <h2>Practise &amp; Compete</h2>
                <small>Find out more...</small>
                <span class="placeholder blue"><span class="dashicons dashicons-awards"></span></span>
                </a>
            </div>
            <div class="threecol-home col-lg-2">
                <a href="/events-calendar/category/bridge-holiday/">
                <h2>Learn from Joan</h2>
                <small>Find out more...</small>
                <span class="placeholder blue"><span class="dashicons dashicons-store"></span></span>
                </a>
            </div>
            <div class="threecol-home col-lg-2">
                <a href="/event">
                <h2>Bridge Holidays</h2>
                <small> Find out more...</small>
                <span class="placeholder blue"><span class="dashicons dashicons-palmtree"></span></span>
                </a>
            </div>
            
            <div class="threecol-home col-lg-2">
                <a href="/books/">
                <h2>Bridge <br>Books</h2>
                <small> Find out more...</small>
                <span class="placeholder blue"><span class="dashicons dashicons-book-alt"></span></span>
                </a>
            </div>
            <div class="threecol-home col-lg-2 ">
               <a href="/play/?game=set&amp;val=4">
                <h2 class="">Free Hand of the Day</h2>
                <small> Find out more...</small>
                <span class="placeholder pink"><span class="dashicons dashicons-star-empty"></span></span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="">
<div class="container">
<h4 class="text-center">Upcoming Events</h4>
</div>
<?php
get_template_part('templates/home', 'events'); ?>
</div>
<div id="inner-content" class="container clearfix">
    <div id="main" class=" first clearfix" role="main">
        <?php
        if (have_posts()):
            while (have_posts()):
        the_post(); ?>
        <article id="post-<?php
            the_ID(); ?>" <?php
            post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
            <div class="row">
                <section class="col-lg-6">
                    <img src="<?php
                    bloginfo('template_directory'); ?>/library/images/welcome-to-joan-butts-small.png" alt="Joan Butts Small Logo">
                    <button id="play-video" type="button" class="button big-pink-button col-sm-12" data-toggle="modal" data-target="#myModal">
                    Play Video
                    </button>
                </section>
                <section class=" col-lg-6" itemprop="articleBody">
                    <header class="article-header">
                        <h1 class="page-title"><?php
                        the_title(); ?></h1>
                        </header> <!-- end article header -->
                        <?php
                        the_content(); ?>
                        <h2 class="page-title">About Joan</h2>
                        <?php
                        the_field('about_joan'); ?>
                        </section> <!-- end article section -->
                    </div>
                    </article> <!-- end article -->
                    <?php
                    endwhile; ?>
                    <?php
                    endif; ?>
                    </div>
</div>
                <div class="container">
                     <div id="home-feature" class=" first home-feature container">
                        <h2>Learn From The Experts</h2>
                        <hr>
                        <?php
                        echo do_shortcode('[featured_products per_page="4" columns="4"]'); ?>
                    </div>
                    </div>
                    <div id="practice" class="blue_bg sale-section" style="background-image:url('<?php echo get_field('pratice_and_compete_bg')[url] ?>');">
                        <div class="container">
                            <?php// debug(get_field('pratice_and_compete_bg')[url]); ?>
                        <div class="pull-right col-md-6">
                        <h4  >Practice and Complete</h4>

                            <?php the_field('pratice_and_compete'); ?>
                        </div>
                        </div>
                    </div>
                     <div id="live-lessons" class="sale-section background-cover"  style="background-image:url('<?php echo get_field('lessons_at_club_bg')[url]; ?>');">
                        <div class="container">
                        <div class="col-md-12">
                        <h4 class="">Lessons at a the bridge club</h4>
                            <?php the_field('lessons_at_club'); ?>
                        </div>
                        </div>
                    </div>
                     <div id="home-holidays" class="sale-section background-cover" style="background-image:url('<?php echo get_field('bridge_holiday_bg')[url]; ?>');">
                           <div class="container">
                        <div class="col-md-12">
                         <h4 class="">Lessons at a the bridge club</h4>
                            <?php 
                            $the_event = get_field('bridge_holiday'); ?>
                            <?php $the_event_meta = get_post_meta($the_event->ID); ?>
                            <?php $the_event_start = $the_event_meta[_EventStartDate]; ?>

                            <?php //debug($the_event_meta); ?>
                            <article>
                            <p><?php $text_date = date("M jS, Y", strtotime($the_event->EventStartDate));
                                echo $text_date; ?></p>
                              <h2> <?php  echo $the_event->post_title; ?></h2>
                              <p> <?php  echo $the_event->post_content; ?></p>
                              <div class="actions">
                                  <a class="button" href="<?php echo get_permalink($the_event->ID); ?>">View Event</a>
                                  <a class="button" href="/holidays/register/">Register</a>
                              </div>

                            </article>
                             
                            <?php //debug(get_field('bridge_holiday')); ?>
                        </div>
                        </div>
                    </div>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Website Tour</h4>
                                </div>
                                <div class="modal-body">
                                    <iframe width="100%" height="515" src="//www.youtube.com/embed/TWcd76cG3-M" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="modal-footer">
                                    
                                    <a href="/register"  class="button">Register Today!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    </div> <!-- end #inner-content -->
                    <?php
                    get_footer(); ?>
                    </div> <!-- end #content -->