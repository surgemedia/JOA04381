<?php
/*
Template Name: Results Page
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
									<?php the_content(); ?>
									
									<iframe class="results-iframe" src="http://www.cards.bridgeaustralia.org/resultslistbm.asp"></iframe>
	
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
