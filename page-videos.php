<?php
/*
Template Name: Videos Page
*/
?>
<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol clearfix float-right" role="main">
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
									
								<section class="entry-content clearfix" itemprop="articleBody">
									
								<ul>
									<?php $recent = new WP_Query("cat=69"); while($recent->have_posts()) : $recent->the_post();?>
										<li class="cpt-li">
											<iframe width="300" height="200" src="http://www.youtube.com/embed/<?php the_field('video_id'); ?>?rel=0" frameborder="0" allowfullscreen></iframe>
											<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
											<?php the_content(); ?>
										</li>
									<?php endwhile; ?>
								</ul>
									
									<?php if(get_field('videos')): ?>
 
										<ul>
									 
										<?php while(has_sub_field('videos')): ?>
									 
											<li class="cpt-li">
												<iframe width="300" height="200" src="http://www.youtube.com/embed/<?php the_sub_field('video_link'); ?>?rel=0" frameborder="0" allowfullscreen></iframe>
												<h2><?php the_sub_field('video_name'); ?></h2>
												<p><?php the_sub_field('video_description'); ?></p>
												
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

						<?php get_sidebar(); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>