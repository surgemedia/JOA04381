<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>
			
			<div id="home-banner-container" class="wrap">
				<img src="<?php bloginfo('template_directory'); ?>/library/images/welcome-to-joan-butts.png">	

<?
if ( is_user_logged_in() ) {
    print '<a class="big-pink-button pink-button-slider" href="/play/?game=set&amp;val=4">Free hand of the day</a>';
} else {
    print '<a class="big-pink-button pink-button-slider" href="/register">Free hand of the day</a>';
}
?>
				
	

			</div>
			
			<div id="content-home">
				<div id="home-box-nav">
				<div class="inner">
												<div class="threecol-home first">
												<a href="<?php the_field( 'home_box_1_link', 'option' ); ?>">
													<h2><?php the_field( 'home_box_1', 'option' ); ?></h2>
													<small>Find out more...</small>
													<span class="placeholder yellow"><span class="dashicons dashicons-welcome-learn-more"></span></span>
													</a>
												</div>
												<div class="threecol-home">
												<a href="<?php the_field( 'home_box_2_link', 'option' ); ?>">
													<h2><?php the_field( 'home_box_2', 'option' ); ?></h2>
													<small>Find out more...</small>
													<span class="placeholder yellow"><span class="dashicons dashicons-awards"></span></span>
													</a>
												</div>
												<div class="threecol-home">
												<a href="<?php the_field( 'home_box_3_link', 'option' ); ?>">
													<h2><?php the_field( 'home_box_3', 'option' ); ?></h2> 
													<small>Find out more...</small>
													<span class="placeholder yellow"><span class="dashicons dashicons-store"></span></span>
													</a>
												</div>
												<div class="threecol-home">
												<a href="<?php the_field( 'home_box_4_link', 'option' ); ?>">
													<h2><?php the_field( 'home_box_4', 'option' ); ?></h2>
													<small>	Find out more...</small>
													<span class="placeholder yellow"><span class="dashicons dashicons-calendar"></span></span>
													</a>
												</div>
												
											</div>

						</div>
				<div id="inner-content" class="wrap clearfix">
						
						<div id="main" class="twelvecol first clearfix" role="main">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix eightcol-home'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>
									


								</header> <!-- end article header -->

								<section class="entry-content clearfix site-intro" itemprop="articleBody">
								<div class="content">
									<p>Welcome to Joan Butts Bridge, We offer a great selection of tool to get you into bridge fast and have fun.</p>
									<p>If you are just starting out or a seasoned bridge player, 
									Joan Butts Bridge offers <a href="/learn">Lessons</a> for beginners and <a href="/play-bridge-online">Online Practice</a> for skilled players.</p>
									
									</div>
									
								</section> <!-- end article section -->

								<section class="entry-content clearfix about-joan" itemprop="articleBody">
								<?php the_post_thumbnail( 'single-post-thumbnail', array('class' => 'home-intro-img')); ?>
								<div class="content">
									<?php the_content(); ?>
									</div>
									<div class="actions">
									<a class="button button-margin" href="/about-joan/">About Joan</a>
									<?php 
								if (!is_user_logged_in() ) {
								echo	'<a class="button" href="/register/">Register</a>';
								} else {
									echo '<a class="button" href="/upgrade/">Become a Royal Member</a>';
								}

									?>
									</div>
								</section> <!-- end article section -->

								<footer class="article-footer">
									<p class="clearfix"><?php the_tags('<span class="tags">' . __('Tags:', 'jbbtheme') . '</span> ', ', ', ''); ?></p>

								</footer> <!-- end article footer -->

								<?php comments_template(); ?>

							</article> <!-- end article -->
							
							<?php endwhile; else : ?>
									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e("Oops, Post Not Found!", "jbbtheme"); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "jbbtheme"); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e("This is the error message in the page-custom.php template.", "jbbtheme"); ?></p>
										</footer>
									</article>

							<?php endif; ?>
							<div class="twelvecol ">
								<iframe width="100%" height="515" src="//www.youtube.com/embed/TWcd76cG3-M" frameborder="0" allowfullscreen></iframe>
							</div>
							<div class="twelvecol first home-feed">
								<div class="fourcol first home-feed-border">
									<h2>Latest News</h2>
									<?php $recent = new WP_Query("cat=63&showposts=2"); while($recent->have_posts()) : $recent->the_post();?>
										<a href="<?php the_permalink() ?>" rel="bookmark">
											<h3 class="home-feed-heading"><?php the_title(); ?></h3>
										</a>
											<?php the_excerpt(); ?>
									<?php endwhile; ?>
									<a href="/news/" class="excerpt-read-more">View All News</a>
								</div>
								<div class="fourcol home-feed-border">
									<h2>Upcoming Events</h2>
									
									<?php get_sidebar('upcomingevents'); ?>
									<!--
									<?php $recent = new WP_Query("cat=61&showposts=2"); while($recent->have_posts()) : $recent->the_post();?>
										<a href="<?php the_permalink() ?>" rel="bookmark">
											<h3 class="home-feed-heading"><?php the_title(); ?></h3>
										</a>
											<?php the_excerpt(); ?>
									<?php endwhile; ?>
									-->
									
								</div>
								<div class="fourcol latest-vid">
									<h2>Latest Videos</h2>
									<!--									
									<?php $recent = new WP_Query("cat=69&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>

										<iframe width="230" height="160" src="http://www.youtube.com/embed/yE7gScP7n4M<?php the_field('yE7gScP7n4M'); ?>?rel=0" frameborder="0" allowfullscreen></iframe>
									<?php endwhile; ?>
									-->
									<iframe width="230" height="160" src="http://www.youtube.com/embed/yE7gScP7n4M<?php the_field( 'yE7gScP7n4M' ); ?>?rel=0" frameborder="0" allowfullscreen></iframe>
									
									<a href="/learn/videos/" class="excerpt-read-more">View All Videos</a>
								</div>
							</div>
							
							<div class="twelvecol first home-feature">
								<h2>Learn From The Experts</h2>
								
								<?php echo do_shortcode('[featured_products per_page="4" columns="4"]'); ?>
							</div>
						</div> <!-- end #main -->


				</div> <!-- end #inner-content -->

<?php get_footer();					 ?>
			</div> <!-- end #content -->
