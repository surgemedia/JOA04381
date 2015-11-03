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
<?php 
	$customer_ref 	= $_GET["SubscriptionReferrer"];
	$subscription_ref 	= $_GET["SubscriptionReference"];
	// debug($subscription_ref);
	xprofile_set_field_data( "fsid", $customer_ref, $subscription_ref, $is_required = false );
	xprofile_set_field_data( 'Membership', $customer_ref, getRoyalId(), $is_required = false );
	wp_update_user(array('ID'=>$customer_ref,'role'=>'royal'));
?>
<h3>Congratulations! Royal Member of Joanbutts Bridge</h3>
<p>You now have access to all the features of the site.</p>
<p>You’ll be able to play all the hands, either lesson hands (Learn section), or go to Play and Compete for endless hands with tips.</p>
<p>You’ll receive my monthly newsletter too, and can watch videos on various lessons.  I’m adding to the Learn section all the time.</p><br>
<p>If you have queries about the bidding, play or defence of any hands you play, please email me at joan@joanbuttbridge.com</p>

<?php endwhile; ?>