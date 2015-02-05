<?php get_header(); ?>
<div id="content">
	<div id="inner-content" class="wrap clearfix">

		<div id="main" class="eightcol first clearfix float-right" role="main">
			<h1 class=""><?php single_cat_title(); ?></h1>
			<ul class="each_modules_fields">
				<?php
				$term_name = get_query_var('modules');
				$A = get_term_by('slug',$term_name,'modules');
				?>
				<li><span class="dashicons dashicons-video-alt"></span><?php the_field('video',$A); ?></li>
				<li><span class="dashicons dashicons-book-alt"></span><?php the_field('text_book', $A); ?></li>
				<li><span class="dashicons dashicons-desktop"></span><?php the_field('text', $A); ?></li>
				<li><span class="dashicons dashicons-universal-access"></span><?php the_field('forum', $A); ?></li>
			</ul>
			<p id="each_module_desc"><?php echo category_description(); ?></p>
			<?php enrollmentButton($A); ?>
			<?php echo bp_profile_field_data( 'field=About Me' ); ?>

			<?php
			$args = array( 'post_type' => 'lesson','orderby' => 'date','order' => 'ASC','tax_query' => array(
					array(
						'taxonomy' => 'modules',
						'field'    => 'term_id',
						'terms'    => $A->term_id,
					),
				),);
			$loop = new WP_Query( $args );
			if (have_posts()) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				<header class="article-header">
					<h2 class="h2 news-heading"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					</header> <!-- end article header -->
					<section class="entry-content clearfix">
						
						<?php if ( has_post_thumbnail() )
						{ the_post_thumbnail('thumbnail', array('itemprop' => 'image'));}?>
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
							<?php endwhile; ?>
							<?php endif; ?>
							</div> <!-- end #main -->
							<?php get_sidebar(); ?>
							</div> <!-- end #inner-content -->
							</div> <!-- end #content -->
							<?php get_footer(); ?>