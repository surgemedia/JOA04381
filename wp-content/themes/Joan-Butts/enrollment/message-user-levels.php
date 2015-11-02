<div class="track-skills">
	<h1 class="sidebar-title">Track Your Skills</h1>
	<div class="content">
		<h4>Welcome <?php echo $GLOBALS['level']; ?> to Joan Butts Bridge.</h4>
		<p>See your skill level increase as you complete modules.</p>
		<h4>New Player</h4>
		<p>Everyone has to start somewhere. This means you have completed 0 modules.</p>
		<h4>Beginner</h4>
		<p>This means you have completed the first 3 modules.</p>
		<h4>Intermediate</h4>
		<p>You have completed more than half the modules.</p>
		<h4>Advanced Player</h4>
		<p>You have completed all the modules!</p>
		<?php
			if(strlen(get_user_role())>0) {
		?>
			<button class="theme-button" onclick="resetProgressConfirmation();">
			    Reset Skill
			</button>
		<?php
			} 
		?>
	</div>
</div>