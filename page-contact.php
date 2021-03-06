<?php
/*
Template Name: Contact Page
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
								<div class="contact-wrap">
									
									<header class="article-header contact-header">
	
										<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
										
									</header> <!-- end article header -->
									<ul>
										<li id="contact-address-icon"> PO Box 1570 New Farm, Brisbane, Australia, 4005</li>
										<li id="contact-tel-icon"> 0413 772 650</li>
										<li id="contact-email-icon"><a href="mailto:joan@joanbuttsbridge.com"> joan@joanbuttsbridge.com</a></li>
									</ul>
								</div>
								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
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
