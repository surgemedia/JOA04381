<?php
/*
Template Name: Events Page
*/
?>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								<?php the_post_thumbnail( 'single-post-thumbnail', array('class' => 'home-intro-img')); ?>
									
									<header class="article-header">
	
										<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
										
									</header> <!-- end article header -->
									
								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
									
									<?php if(get_field('holidays')): ?>
 
										<ul>
									 
										<?php while(has_sub_field('holidays')): ?>
									 
											<li>
												<img class="holiday-img" src="<?php the_sub_field('holiday_image'); ?>">
												<h2><?php the_sub_field('holiday_name'); ?></h2>
												<h3 class="date-blue"><?php the_sub_field('holiday_date'); ?></h3>
												<p><?php the_sub_field('holiday_description'); ?></p>
												
												<a class="gray-button button-margin" href="<?php the_sub_field('flyer_upload'); ?>">Flyer</a>
												<a class="gray-button" href="<?php the_sub_field('schedule_upload'); ?>">Schedule</a>
												<a class="button float-right-clean" href="#">Register your interests</a>
												<?php //the_sub_field('current_past'); ?>
											</li>
									 
										<?php endwhile; ?>
									 
										</ul>
									 
									<?php endif; ?>
							</section> <!-- end article section -->

								<footer class="article-footer">
									<?php the_tags('<span class="tags">' . __('Tags:', 'jbbtheme') . '</span> ', ', ', ''); ?>

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
												<p><?php _e("This is the error message in the page.php template.", "jbbtheme"); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->
						<?php //get_sidebar('calendarevents'); ?>
						

				</div> <!-- end #inner-content -->

