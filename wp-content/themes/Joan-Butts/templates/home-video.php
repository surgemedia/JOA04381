<section class="site-video">
	<div class="row">
		<div class="col-md-6 video-container">
			<?php
				$image = get_field('site_video_thumbnail');
			?>
			<img class="video-thumbnail" src="<?php echo $image['url']; ?>" alt="Joan Butts Website Tour" height="<?php echo $image['height']; ?>" width="<?php echo $image['width'] ?>" data-toggle="modal" data-target="#site-video-modal">
			<span class="video-tag">Play video now</span>
		</div>
		<div class="col-md-6">
			<h4 class="video-title"><?php the_field('site_video_title'); ?></h4>
			<p><?php the_field('site_video_introduction'); ?></p>
		</div>
	</div>
</section>
<!-- Site Video Modal -->
<div class="modal fade" id="site-video-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	        <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title" id="myModalLabel">Website Tour</h4>
	        </div>
	        <div class="modal-body">
	            <iframe width="100%" height="515" src="<?php the_field('site_video'); ?>" frameborder="0" allowfullscreen></iframe>
	        </div>
	        <div class="modal-footer">
	            
	            <a href="/register"  class="button">Register Today!</a>
	        </div>
	    </div>
	</div>
</div>
