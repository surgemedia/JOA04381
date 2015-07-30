<?php
if (is_user_logged_in()) { ?>
<p>
	<a class="button pink" href="/upgrade"><?php
    _e('UPGRADE TO PLAY LESSON HANDS') ?></a>
</p>
<?php
} 
else { ?>
<p>
	<a class="button pink" href="/register"><?php
    _e('Please Login to play hands') ?></a>
</p>
<?php
} ?>