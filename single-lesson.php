
<?php get_header(); 
//$terms = wp_get_post_terms( $post->ID, 'modules');
debug($terms[0]->slug);
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
						
						<?php $book_id =  get_field('text_book',$terms[0]);
						$book_id_id = $book_id[0]->ID; ?>
						<?php $rows = get_field('lessons_repeater');
						for ($i=0; $i <sizeof($rows) ; $i++) {
						// Should wrapped in a tag?
						echo $rows[$i]['title']; ?>
						<?php	if ($rows[$i]['lesson_video']): ;?>
						<div class="embed-container">
							<?php echo $rows[$i]['lesson_video']; ?>
						</div>
						<?php endif; ?>
						<div class="actions">
							<?php
							$hands = $rows[$i]["lesson_hand"];
							// Trouble shoot why this isnt working.
							//echo do_shortcode($hands);
							echo apply_filters( 'the_content',$hands); 
							?>
							
							<p><a class="button" href="<?php echo get_permalink($book_id); ?>">Purchase book for more help</a></p>
						</div>
						<?php echo $rows[$i]['lesson_content'];  ?>
						<?php }?>
						</section> <!-- end article section -->
						</article> <!-- end article -->
						
						<div class="two_buttons">
							<?php $GLOBALS['group_single_slug'] = $terms[0]->slug ; ?>
							<a id="button1" class="button" href="<?php echo site_url(); ?>/modules/<?php echo $GLOBALS['group_single_slug']; ?>">Back to Current Modules</a>
							<?php next_post_button(); 
							completeLessonButton(get_the_title());
							?>
						</div>
						<?php endwhile;?>
						<?php endif;?>
						</div> <!-- end #main -->
						<?php get_sidebar('learnsingle'); ?>
						</div> <!-- end #inner-content -->
						</div> <!-- end #content -->
						<?php get_footer(); ?>