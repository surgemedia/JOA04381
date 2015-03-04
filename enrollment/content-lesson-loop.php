<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
		<header class="article-header">
			<?php
			$user_id = bp_loggedin_user_id();
			?>
			<h2 class="h2 news-heading">
			<?php the_title(); ?>
			</h2>
			</header> <!-- end article header -->
			<section class="entry-content clearfix">
				<?php
				$thumb_id = get_post_thumbnail_id();
				
				$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail', true)[0];
				
				if (strpos($thumb_url,'wp-include') < 0) {
				the_post_thumbnail();
				} else {
				echo '<div class="placeholder yellow"><span class="dashicons dashicons-welcome-learn-more"></span></div>';
				}
				
				?>
				<p>
					<?php $rows = get_field('lessons_repeater');
					$row = $rows[0]['lesson_content'];
					$b4trunk = implode(' ', array_slice(explode(' ', $row), 0, 50)). '... ';
					$trunk = strip_tags($b4trunk);
					echo $trunk;
					?>
				</p>
				</section> <!-- end article section -->
			</a>
			<footer class="article-footer">
				<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jbbtheme') . '</span> ', ', ', ''); ?></p>
				</footer> <!-- end article footer -->
				<?php getProgress( get_the_title() ); ?>
				</article> <!-- end article -->