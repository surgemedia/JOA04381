<footer class="content-info" role="contentinfo">
  <div class="container">
    <div class="row">
    	<div class="col-md-4 image-container">
    		<?php $image = get_field('footer_image','option'); ?>
    		<img src="<?php echo $image['url']; ?>" height="<?php echo $image['height']; ?>" width="<?php echo $image['width']; ?>">
    	</div>
    	<div class="col-md-4 contact-details">
    		<h4>Contact Joan</h4>
    		<a href="mailto:<?php the_field('phone','option') ?>"><span>E</span><?php the_field('phone','option') ?></a>
    		<a href="tel:<?php the_field('email','option') ?>"><span>P</span><?php the_field('email','option') ?></a>
    	</div>
    	<div class="col-md-4 social-links">
    		<ul>
    			<?php
    				$links = get_field('social_links','option');
    				for($i=0; $i<count($links); $i++) {
    			?>
    					<li><a target="_blank" href="<?php echo $links[$i][link] ?>"><i class="<?php echo $links[$i][icon] ?>"></i></a></li>
    			<?php
    				}
    			?>
    		</ul>
    	</div>
    </div>
  </div>
</footer>
