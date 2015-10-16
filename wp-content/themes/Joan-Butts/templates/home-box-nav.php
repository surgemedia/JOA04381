<?php
	if(have_rows('box_navigation')) {
?>
		<section class="box-nav">
			<ul>
<?php
				while(have_rows('box_navigation')) : the_row();
?>
			
					<li class="col-md-2">
						
						<a class="link-card" href="<?php the_sub_field('link'); ?>">
							<span class="link-color <?php echo get_sub_field('color'); ?>"></span>
							<h3 class="link-text"><?php the_sub_field('link_text'); ?></h3>
						</a>
					</li>
<?php
				endwhile;
?>
			</ul>
		</section>
<?php
	}
?>
