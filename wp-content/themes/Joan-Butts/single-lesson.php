
<?php
resetUser();
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
$postion_in_module = array_search($post->post_name,$included_lessons);
$next_in_module = $included_lessons[$postion_in_module+1];
if($postion_in_module+1 <= count($included_lessons)){
	$next_in_module_link =  '/lesson/'.$next_in_module;
	$next_in_module_text =  'Next Lesson';
} 
if(strlen($next_in_module) <= 1){
	$next_in_module_link = '/learn/';
	$next_in_module_text =  'Choose another Module';
}
// debug("FSID".xprofile_get_field_data( 'fsid', $user_id, $is_required = false));
// debug(get_role('administrator'));

 ?>



			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				<header class="article-header">
					<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
					
					<?php get_field('lesson_overview'); ?>
			
				</header> <!-- end article header -->
				<section id="single-content" class="entry-content clearfix" itemprop="articleBody">
					<?php 
						$userRole = get_user_role();
						$freeLesson = get_field('free_lesson');
						if(($userRole =='administrator' || $userRole=='royal' || $freeLesson) && !empty(get_user_role())) {
							$rows = get_field('lessons_repeater');
							for ($i=0; $i <sizeof($rows) ; $i++) {
								// Should wrapped in a tag?
								$book_id = $rows[$i]['book_suggest'];
								echo $rows[$i]['title'];
								if ($rows[$i]['lesson_video']): ;
					?>
									<div class="embed-container">
										<?php echo $rows[$i]['lesson_video']; ?>
									</div>
								<?php endif; ?>
								<div class="actions">
								<?php
									$hands = $rows[$i]["lesson_hand"];
									if((get_user_role()=='administrator') || (get_user_role()=='royal') ){
										echo apply_filters( 'the_content',$hands); 
									} else {
										if(strlen($rows[$i]["lesson_hand"]) > 0){
											get_template_part('enrollment/message', 'please-login-hands' );
										}
									}
								?>
								<!-- <p><a class="button" href="<?php //echo get_permalink($book_id); ?>">Purchase book for more help</a></p> -->
								</div>
								<?php echo $rows[$i]['lesson_content'];  ?>
							<?php }
						} 
						else {
					?>
							<p>Lesson available only for Royal Members</p>
							<button class="btn btn-primary" onclick="location.href = '/upgrade'">
                              	Upgrade Now! <i class=" dashicons dashicons-welcome-learn-more"></i>
                          	</button>
					<?php
						}
					?>	
						
				</section> <!-- end article section -->
			</article> <!-- end article -->
						
			<div class="two_buttons">
				<?php $GLOBALS['group_single_slug'] = $terms[0]->slug ; ?>
				<a id="button1" class="button float-left" href="<?php echo site_url(); ?>/modules/<?php echo $GLOBALS['group_single_slug']; ?>">Back to Current Module</a>
				<?php 
					if(($userRole =='administrator' || $userRole=='royal') && !empty(get_user_role())) {
				?>
						<a id="nav-next-button" class="button nav-next" href="<?php echo site_url(); ?><?php echo $next_in_module_link; ?>"><?php echo $next_in_module_text; ?></a>
						<?php 
					}
					if(($userRole =='administrator' || $userRole=='royal' || $freeLesson) && !empty(get_user_role())) {
							$the_title = get_the_title();
							completeLessonButton( $the_title );
						?>
				<?php
					}
				?>
				
			</div>
						<?php endwhile;?>
						<?php endif;?>
						<?php //get_sidebar('learnsingle'); ?>
