<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix float-right" role="main">
						    <h1 class=""><?php single_cat_title(); ?></h1>

	  <ul class="each_modules_fields">
      <li><span class="dashicons dashicons-video-alt"></span></li>
      <li><span class="dashicons dashicons-book-alt"></span></li>
      <li><span class="dashicons dashicons-desktop"></span></li>
      <li><span class="dashicons dashicons-universal-access"></span></li>
      </ul>

	<p id="each_module_desc"><?php echo category_description(); ?></p>



<?php
if (have_posts()) : while ( have_posts() ) : the_post(); ?>
							

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

								<header class="article-header">

									<h2 class="h2 news-heading"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
									<!-- <p class="byline vcard"><?php
										/*printf(__('<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'jbbtheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), jbb_get_the_author_posts_link(), get_the_category_list(', '));
									*/?></p> -->

								</header> <!-- end article header -->

								<section class="entry-content clearfix">
									<?php 
		if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail', array('itemprop' => 'image'));}?>
									<p>
									 <?php cap_content(60); ?>
									 </p>
								</section> <!-- end article section -->

								<footer class="article-footer">
									<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jbbtheme') . '</span> ', ', ', ''); ?></p>

								</footer> <!-- end article footer -->

								<?php // comments_template(); // uncomment if you want to use them ?>

							</article> <!-- end article -->

							<?php endwhile; ?>

									<?php if (function_exists('jbb_page_navi')) { ?>
											<?php jbb_page_navi(); ?>
									<?php } else { ?>
											<nav class="wp-prev-next">
													<ul class="clearfix">
														<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "jbbtheme")) ?></li>
														<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "jbbtheme")) ?></li>
													</ul>
											</nav>
									<?php } ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e("Oops, Post Not Found!", "jbbtheme"); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "jbbtheme"); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e("This is the error message in the index.php template.", "jbbtheme"); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->

						<?php get_sidebar(); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
