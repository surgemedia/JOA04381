<div class="col-md-6">
	<div class="account-card">
		<h4 class="account-title"><?php the_title(); ?></h4>
		<p class="account-price"><?php the_field('price'); ?></p>
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
		<a href="<?php the_field('button_link'); ?>" class="button register-button"><?php the_field('button_text'); ?></a>
	</div>
</div>