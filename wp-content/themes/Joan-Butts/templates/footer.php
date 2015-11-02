<footer class="content-info" role="contentinfo">
  <div class="container">
    <div class="clearfix">
    	<div class="col-md-4 image-container">
    		<?php $image = get_field('footer_image','option'); ?>
    		<img src="<?php echo $image['url']; ?>" height="<?php echo $image['height']; ?>" width="<?php echo $image['width']; ?>">
    	</div>
    	<div class="col-md-4 contact-details">
    		<h4>Contact Joan</h4>
    		<a href="mailto:<?php the_field('phone','option') ?>"><span>E</span><?php the_field('phone','option') ?></a>
    		<a href="tel:<?php the_field('email','option') ?>"><span>P</span><?php the_field('email','option') ?></a>
    	   <a class="theme-button" href="#" data-toggle="modal" data-target="#newsletter-modal">Sign up for my free newsletter</a>
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
<!-- Modal -->
<div class="modal fade" id="newsletter-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Newsletter Signup</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="http://marginmediadigital.createsend.com/t/j/s/hkkiuj/" method="post">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="cm-name" id="name" placeholder="Your Name">
            </div>
          </div>
          <div class="form-group">
            <label for="hkkiuj-hkkiuj" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="cm-hkkiuj-hkkiuj" id="hkkiuj-hkkiuj" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="theme-button">Subscribe</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
