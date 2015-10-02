<?php
/**
 * Template Name: Home
 */
?>

<?php while (have_posts()) : the_post(); ?> 
	<?php get_template_part('templates/home','box-nav') ?>
	<?php get_template_part('templates/home', 'events'); ?>
	<?php get_template_part('templates/home', 'video'); ?>
	<?php get_template_part('templates/home','loop-account-types'); ?>
	<?php get_template_part('templates/home','practice-compete'); ?>
	<?php get_template_part('templates/home','lessons'); ?>
	<?php get_template_part('templates/home','bridge-holidays'); ?>
	<?php get_template_part('templates/home','products'); ?>
<?php endwhile; ?>
