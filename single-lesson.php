
<?php get_header(); 
$terms = wp_get_post_terms( $post->ID, 'modules');
$current_term_slug = $terms[0]->slug;
$included_lessons = array();
?>
<?php 
function next_module_button(){
	if ($GLOBALS['next_button_visual'] = true) {
	?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links">
			<a href="/learn" class="button">Pick a new module</a>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php }
	} ?>

<?php 
$custom_terms = get_terms('modules');

foreach($custom_terms as $custom_term) {
    wp_reset_query();
    $args = array('post_type' => 'lesson',
        'tax_query' => array(
            array(
                'taxonomy' => 'modules',
                'field' => 'slug',
                'terms' => $custom_term->slug,
            ),
        ),
     );

     $loop = new WP_Query($args);
     if($loop->have_posts()) {
       if($custom_term->slug == $current_term_slug){

        while($loop->have_posts()) : $loop->the_post();
           array_push($included_lessons, $post->post_name);
        endwhile;
     }
     }
}
debug(array_search($post->post_name,$included_lessons));
 ?>


<div id="content">
	<div id="inner-content" class="wrap clearfix">
		<div id="main" class="eightcol first clearfix float-right" role="main">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				<header class="article-header">
					<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
					
					<?php get_field('lesson_overview'); ?>
			
					</header> <!-- end article header -->
					<section id="single-content" class="entry-content clearfix" itemprop="articleBody">
						
						<?php $rows = get_field('lessons_repeater');

						for ($i=0; $i <sizeof($rows) ; $i++) {
						// Should wrapped in a tag?
						$book_id = $rows[$i]['book_suggest'];
						echo $rows[$i]['title']; ?>
						<?php	if ($rows[$i]['lesson_video']): ;?>
						<div class="embed-container">
							<?php echo $rows[$i]['lesson_video']; ?>
						</div>
						<?php endif; ?>
						<div class="actions">
							<?php
							$hands = $rows[$i]["lesson_hand"];
							if((get_user_role()=='administrator') || (get_user_role()=='royal')){
							echo apply_filters( 'the_content',$hands); 
							} else {
								get_template_part('enrollment/message', 'please-login-hands' );
							}
							?>
							<!-- <p><a class="button" href="<?php echo get_permalink($book_id); ?>">Purchase book for more help</a></p> -->
						</div>
						<?php echo $rows[$i]['lesson_content'];  ?>
						<?php }?>
						</section> <!-- end article section -->
						</article> <!-- end article -->
						
						<div class="two_buttons">
							<?php $GLOBALS['group_single_slug'] = $terms[0]->slug ; ?>
							<a id="button1" class="button" href="<?php echo site_url(); ?>/modules/<?php echo $GLOBALS['group_single_slug']; ?>">Back to Current Module</a>
							
							<?php 
							next_post_button(); 
							// next_module_button();
							 $the_title = get_the_title();
							// $the_tile1 = str_replace('&#8217;', "'", $the_title);
							// $the_tile2 = str_replace('’',"'", $the_title1);

							completeLessonButton( $the_title );
							?>
						</div>
						<?php endwhile;?>
						<?php endif;?>
						</div> <!-- end #main -->
						<?php get_sidebar('learnsingle'); ?>
						</div> <!-- end #inner-content -->
						</div> <!-- end #content -->
						<?php get_footer(); ?>