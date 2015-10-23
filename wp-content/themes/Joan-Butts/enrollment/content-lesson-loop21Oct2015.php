<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
	<?php
		$userRole = get_user_role();
		$freeLesson = get_field('free_lesson');
		if(($userRole =='administrator' || $userRole=='royal' || $freeLesson) && !empty(get_user_role())) {
			$lessonHref = get_the_permalink();
		}
		else {
			$lessonHref = 'javascript:void(0);';
		}
	?>
	<a href="<?php echo $lessonHref ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
		<header class="article-header">
			<?php
			$user_id = bp_loggedin_user_id();
			?>
			<h2 class="h2 news-heading">
				<?php the_title(); ?>
			</h2>
			</header> <!-- end article header -->
			<section class="entry-content clearfix ">
				<?php if(($userRole =='administrator' || $userRole=='royal' || $freeLesson) && !empty(get_user_role())) {?>
					<?php
					$thumb_id = get_post_thumbnail_id();
					
					$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail', true)[0];
					
					if (strpos($thumb_url,'wp-include') < 0) {
					the_post_thumbnail();
					} else {
					echo '<div class="placeholder yellow col-lg-3 col-md-3 col-xs-3 pull-left hidden-xs"><span class="dashicons dashicons-welcome-learn-more"></span></div>';
					}
				}
				else {
					echo '<div class="placeholder yellow col-lg-3 col-md-3 col-xs-3 pull-left hidden-xs"><span class="dashicons dashicons-lock"></span></div>';
				}	
					?>

				<p class="col-lg-9 col-md-9 col-xs-12 pull-right">
					<?php $rows = get_field('lessons_repeater');
					$row = $rows[0]['lesson_overview'];
					$b4trunk = implode(' ', array_slice(explode(' ', $row), 0, 50)). '... ';
					$trunk = strip_tags($b4trunk);
					echo $trunk;
					?>
					<br>
					<?php
					get_template_part('templates/button','upgrade-user');
					?>
				</p>
				</section> <!-- end article section -->
			</a>
			<footer class="article-footer">
				<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jbbtheme') . '</span> ', ', ', ''); ?></p>
				</footer> <!-- end article footer -->
				<?php getProgress( get_the_title() ); ?>
				</article> <!-- end article -->
			</footer>