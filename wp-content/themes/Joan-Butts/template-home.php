<?php
/**
 * Template Name: Home
 */
?>

<?php while (have_posts()) : the_post(); ?> 
	<?php get_template_part('templates/home','box-nav') ?>
	<?php get_template_part('templates/home', 'events'); ?>
<?php endwhile; ?>
