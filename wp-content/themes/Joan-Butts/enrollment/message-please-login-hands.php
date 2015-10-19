<?php
	if (is_user_logged_in()) { 
?>
		<?php
		    global $bp;
		    $the_user_id = $bp->loggedin_user->userdata->ID;
		    $upgradeSub = 'http://sites.fastspring.com/joanbuttsbridge/product/joanbuttsplaybridgeonline?action=adds&referrer='.$the_user_id;
		?>
		<p>
			<a class="button btn-primary" href="<?php echo $upgradeSub; ?>"><?php
		    _e('UPGRADE TO PLAY LESSON HANDS') ?></a>
		</p>
	<?php
	} 
	else { ?>
		<p>
			<a class="button btn-primary" href="/register"><?php
		    _e('Please Login to play hands') ?></a>
		</p>
<?php
	} 
?>