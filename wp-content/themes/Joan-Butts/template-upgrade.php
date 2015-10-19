<?php
/**
 * Template Name: Upgrade Member
 */
?>

<?php while (have_posts()) : the_post(); ?>
<?php /*  <?php get_template_part('templates/page', 'header'); ?>
 

<?php 
get_template_part('templates/loop','account-types');
 get_template_part('templates/button', 'upgrade-user');
echo do_shortcode('[theme-my-login login_template="theme-my-login/login-form.php"]');
?> */?>
<?php echo "Upgrade Page"; 
	$customer_ref 	= $_GET["SubscriptionReferrer"];
	$subscription_ref 	= $_GET["SubscriptionReference"];
	debug($customer_ref);
	debug($subscription_ref);
	xprofile_set_field_data( "fsid", $customer_ref, $subscription_ref, $is_required = false );
	wp_update_user(array('ID'=>$customer_ref,'role'=>'royal'));
?>

<?php endwhile; ?>