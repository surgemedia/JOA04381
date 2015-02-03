<?php get_header(); ?>
<div id="content">
	<div id="inner-content" class="wrap clearfix">
		<div id="main" class="eightcol first clearfix float-right" role="main">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				<header class="article-header">
					<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
					</header> <!-- end article header -->
					<section id="single-content" class="entry-content clearfix" itemprop="articleBody">
						
						<?php $rows = get_field('lessons_repeater');
						for ($i=0; $i <sizeof($rows) ; $i++) {
						// Should wrapped in a tag?
						echo $rows[$i]['title']; ?>
						<?php	if ($rows[$i]['lesson_video']): ;?>
						<div class="embed-container">
							<?php echo $rows[$i]['lesson_video']; ?>
						</div>
						<?php endif; ?>
						<div class="two_button">
							<?php
							$hands = $rows[$i]["lesson_hand"];
							// Trouble shoot why this isnt working.
							echo apply_filters( 'the_content',$hands); 
							?>
							<?php 
							//Get Product infomation out of the object 
							// Button2 is a pretty bad name, make it someing like lesson-product
							?>
							<a id="button2" class="button" href="">Purchase book for more help</a>
						</div>
						<?php echo $rows[$i]['lesson_content'];  ?>
						<?php }?>
						</section> <!-- end article section -->
						</article> <!-- end article -->
						<?php 
						//Goes back to module from lesson
						$terms = wp_get_post_terms( $post->ID, 'modules'); ?>
						<div class="two_buttons">
							<a id="button1" class="button" href="<?php echo site_url(); ?>/modules/<?php echo $terms[0]->slug; ?>">Back to Current Modules</a>
							<?php next_post_button(); ?>
						</div>
						<?php endwhile;?>
						<?php endif;?>
						</div> <!-- end #main -->
						<?php get_sidebar('learn'); ?>
						</div> <!-- end #inner-content -->
						</div> <!-- end #content -->
						<?php get_footer(); ?>