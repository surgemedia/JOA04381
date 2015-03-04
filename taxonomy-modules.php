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
			
			<?php  /*
			$user_id = bp_loggedin_user_id();
			if (bp_has_profile($user_id)) : ?>
			<?php while (bp_profile_groups()) : bp_the_profile_group(); ?>
			<?php while (bp_profile_fields()) : bp_the_profile_field(); ?>
			<?php if (bp_field_has_data()) : ?>
			<?php $fieldname = strip_tags(bp_get_the_profile_field_name()) ?>
			<?php debug($fieldname); ?>
			<?php  //xprofile_set_field_data( 'Current Course', $user_id, $course->name, $is_required = false ); ?>
			<?php // echo xprofile_get_field_data( 'Current Course', $user_id, $multi_format = 'comma' ) ?>
			<?php endif; ?>
			<?php endwhile; ?>
			<?php endwhile; ?>
			<?php endif;?> */ ?>
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
