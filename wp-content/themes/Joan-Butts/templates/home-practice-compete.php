<h3 class="section-title">Lessons at a bridge club</h3>
<section class="practice-compete">
	<div class="clearfix">
		<div class="col-md-6 image-container">
			<?php $image = get_field('pratice_and_compete_bg'); ?>
			<img src="<?php echo $image['url']; ?>" height="<?php echo $image['height']; ?>" width="<?php echo $image['width']; ?>">
		</div>
		<div class="col-md-6 col-sm-12 col-xs-12 content">
			<?php the_field('pratice_and_compete'); ?>
		</div>
	</div>
	<a href="<?php the_field('practice_and_compete_link'); ?>" class="button register-button"><?php the_field('practice_and_compete_link_text'); ?></a>
</section>