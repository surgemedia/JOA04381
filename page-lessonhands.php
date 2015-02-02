<?php
/*
Template Name: Lesson Hands
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

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

								</header> <!-- end article header -->

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php if ( has_post_thumbnail() ) { the_post_thumbnail('feature-img'); } ?>
									<?php the_content(); ?>
									
									<header class="article-header">
										<?php $recent = new WP_Query("cat=81"); while($recent->have_posts()) : $recent->the_post();?>
									<h1 class="h2 news-heading"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline vcard"><?php
										printf(__('<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'jbbtheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), jbb_get_the_author_posts_link(), get_the_category_list(', '));
									?></p>

								</header> <!-- end article header -->
								
								<section class="entry-content clearfix">
									<?php the_post_thumbnail('feature-img-news', array( 'class' => "holiday-img attachment-post-thumbnail")); ?>
									<?php the_excerpt('Read more...'); ?>
								</section> <!-- end article section -->
									
									<?php endwhile; ?>
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
