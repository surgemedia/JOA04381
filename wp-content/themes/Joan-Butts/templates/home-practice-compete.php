<h3 class="section-title">Play Bridge Online</h3>
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
	<?php
		switch(get_user_role()) {
        	case 'royal':
    ?>
    			<a href="/play-bridge-online/" class="theme-button">Start Today!</a>
    <?php
        		break;
        	case 'administrator':
    ?>
    			<a href="/play-bridge-online/" class="theme-button">Start Today!</a>
    <?php
        		break;
        	case 'free_member':
        		$the_user_id = $bp->loggedin_user->userdata->ID;
    ?>
    			<a href="http://sites.fastspring.com/joanbuttsbridge/product/joanbuttsplaybridgeonline?action=adds&referrer=<?php echo $the_user_id ?>" class="theme-button">Upgrade</a>
    <?php    		
        		break;
        	default :
    ?>
    			<a class="theme-button" href="/register/">Register Today!</a>
    <?php
        		break;
        }
	?>
</section>