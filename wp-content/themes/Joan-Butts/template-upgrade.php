<?php
/**
 * Template Name: Upgrade Member
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
 

<?php 
get_template_part('templates/loop','account-types');
 get_template_part('templates/button', 'upgrade-user');
?>
<?php endwhile; ?>