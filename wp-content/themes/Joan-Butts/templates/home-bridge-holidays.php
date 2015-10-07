<h3 class="section-title">Bridge Holidays</h3>
<section class="bridge-holidays" style="background-image: url('<?php the_field('bridge_holiday_bg');?>');">
	<div class="row">
		<div class="col-md-6 content">
			<?php
				$post_object = get_field('bridge_holiday');
				if( $post_object ): 

					// override $post
					$post = $post_object;
					setup_postdata( $post ); 

					$the_event = get_post();
					$text_date = date("M jS, Y", strtotime($the_event->EventStartDate));
			?>
				    	<h3><?php the_title(); ?></h3>
						<h3 class="date"><?php echo $text_date ?></h3>
				    	<?php the_content(); ?>
				    <?php wp_reset_postdata(); ?>
				<?php endif; ?>
		</div>
		<div class="col-md-6"></div>
	</div>
	<a href="<?php the_field('bridge_holidays_link'); ?>" class="button register-button"><?php the_field('bridge_holidays_link_text'); ?></a>
</section>