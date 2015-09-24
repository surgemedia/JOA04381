<?php
	if(have_rows('box_navigation')) {
?>
		<section class="box-navigation">
			<div class="row">
<?php
				while(have_rows('box_navigation')): the_row();
?>
					<div class="col-md-2">
						<a href="<?php the_field('link'); ?>"><?php the_field('link_text'); ?>
							<span class="nav-link-color <?php the_field('color'); ?>"></span>
						</a>
					</div>
<?php
				endwhile;
?>
			</div>
		</section>
<?php
	}		
?>
