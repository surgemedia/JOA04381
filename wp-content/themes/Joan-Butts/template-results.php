<?php
/*
Template Name: Results Page
*/
?>


			<div id="container">
						<div id="main" class="eightcol clearfix float-right" role="main">
							<div class="breadcrumbs">
							    <?php if(function_exists('bcn_display'))
							    {
							        bcn_display();
							    }?>
							</div>
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								<?php the_post_thumbnail( 'single-post-thumbnail', array('class' => 'home-intro-img')); ?>
									
									<header class="article-header">
	
										<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
										
									</header> <!-- end article header -->
									
								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
									
									<iframe class="results-iframe" src="http://www.cards.bridgeaustralia.org/resultslistbm.asp"></iframe>
	
							</section> <!-- end article section -->


							</article> <!-- end article -->

							<?php endwhile; else : ?>
								<pre>No Content</pre>
							<?php endif; ?>

						</div> <!-- end #main -->

					

				</div> <!-- end #inner-content -->
