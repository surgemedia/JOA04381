<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="eightcol first clearfix float-right" role="main">
						<h1 class="archive-title"><span><?php _e('Search Results for:', 'jbbtheme'); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

								<header class="article-header">

									<h3 class="search-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<p class="byline vcard"><?php
										printf(__('<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'jbbtheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), jbb_get_the_author_posts_link(), get_the_category_list(', '));
									?></p>

								</header> <!-- end article header -->

								<section class="entry-content">
										<?php the_excerpt('<span class="read-more">' . __('Read more &raquo;', 'jbbtheme') . '</span>'); ?>

								</section> <!-- end article section -->

								<footer class="article-footer">

								</footer> <!-- end article footer -->

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
											<h1><?php _e("Sorry, No Results.", "jbbtheme"); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e("Try your search again.", "jbbtheme"); ?></p>
										</section>
										<footer class="article-footer">
												
										</footer>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->

							<?php get_sidebar(); ?>

					</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>