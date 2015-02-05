<?php 
$user_id = bp_loggedin_user_id();
getEnrollment($user_id);
 ?>

<li class="module-loop">
<a href="<?php echo site_url(); ?>/modules/<?php echo $GLOBALS['current_course_obj']->slug; ?>">
  <h2>  <?php echo $GLOBALS['current_course_obj']->name; ?></h2>

  <p><?php echo $GLOBALS['current_course_obj']->description; ?></p>
      <?php get_template_part('enrollment/content', 'module-meta' ); ?>
       <?php 
if(getEnrollment($user_id) == $GLOBALS['current_course_obj']->name) { get_template_part('enrollment/message', 'already-enrolled' ); }
   ?>
    </a>
 </li>