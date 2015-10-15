<?php
/*
Template Name: Videos Page
*/
?>

							<!-- <div class="breadcrumbs">
							    <?php if(function_exists('bcn_display'))
							    {
							        bcn_display();
							    }?>
							</div> -->
<?php
// WP_Query arguments
$args = array (
	'post_type'              => array( 'video' ),
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
    // do something
		?>

		<?php the_title(); ?>



<?php	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();
?>

							
