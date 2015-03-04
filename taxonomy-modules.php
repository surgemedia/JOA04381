<?php get_header();
$term_name = get_query_var('modules');
$GLOBALS['current_course_obj'] = get_term_by('slug',$term_name,'modules');
?>
<div id="content">
	<div id="inner-content" class="wrap clearfix">
		<div id="main" class="eightcol first clearfix float-right" role="main">
			<h1 class=""><?php single_cat_title(); ?></h1>
			<?php get_template_part('enrollment/content', 'module-meta' ); ?>
			<p id="each_module_desc"><?php echo category_description(); ?></p>
			<?php enrollmentButton($GLOBALS['current_course_obj']); ?>
			
			<div id="module-lessons">
				<?php
				$args = array( 'post_type' => 'lesson','orderby' => 'date','order' => 'ASC','tax_query' => array(
						array(
							'taxonomy' => 'modules',
							'field'    => 'term_id',
							'terms'    => $GLOBALS['current_course_obj']->term_id,
						),
					),);
				$loop = new WP_Query( $args );
				if (have_posts()) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php get_template_part('enrollment/content', 'lesson-loop' ); ?>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
			</div> <!-- end #main -->
			<?php get_sidebar('learn'); ?>
			</div> <!-- end #inner-content -->
			</div> <!-- end #content -->
			<?php get_footer();
			unset($GLOBALS['current_course_obj']);
			?>
