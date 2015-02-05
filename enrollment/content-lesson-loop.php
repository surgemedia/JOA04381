<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
	<header class="article-header">
		<h2 class="h2 news-heading"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		</header> <!-- end article header -->
		<section class="entry-content clearfix">
			
			<?php 
			
			echo '<div class="placeholder yellow"><span class="dashicons dashicons-welcome-learn-more"></span></div>';
			
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
			<footer class="article-footer">
				<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jbbtheme') . '</span> ', ', ', ''); ?></p>
				</footer> <!-- end article footer -->
				</article> <!-- end article -->