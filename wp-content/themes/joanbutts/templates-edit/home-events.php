<div id="events">
<?php 
// WP_Query arguments
$args = array (
	'post_type'              => array( 'tribe_events' ),
	'posts_per_page'         => '6',
	'order'                  => 'ASC',
	'orderby'                => 'date'
	);

// The Query
$event_query = new WP_Query( $args );

// The Loop
if ( $event_query->have_posts() ) {
	while ( $event_query->have_posts() ) {
		$event_query->the_post(); ?>
	<?php 
		$the_event = get_post();
		$text_date = date("M jS, Y", strtotime($the_event->EventStartDate));
	?>
	<div class="event-obj col-md-2">
		<h4><?php the_title(); ?></h4>
		<span class="start"><?php echo $text_date ?></span>
	</div>
		<?php //debug(get_post());
		//debug(get_post_meta(get_the_id()));	 ?>

<?php 		
 	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();

?>


</div>