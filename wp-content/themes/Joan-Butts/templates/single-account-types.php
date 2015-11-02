<div class="col-md-6">
	<div class="account-card">
		<h4 class="account-title"><?php the_title(); ?></h4>
		<p class="account-price">$ <?php the_field('price'); ?> / month</p>
		<ul> 
			<?php 
				$feature_list = get_field('features'); 
				for ($i = 0; $i < count($feature_list); $i++) { 
			?>
					<li><?php echo $feature_list[$i][feature]; ?></li> 
		
			<?php 
				} 
			?> 
		</ul>
		<?php get_template_part('templates/button','upgrade-user'); ?>
	</div>
</div>