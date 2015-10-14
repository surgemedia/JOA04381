<?php
$user_id = bp_loggedin_user_id();
getEnrollment($user_id);
?>

<li class="module-loop">
<a href="<?php
echo site_url(); ?>/modules/<?php
echo $GLOBALS['current_course_obj']->slug; ?>">
 
  <h2>  <?php
$currentModuleName = $GLOBALS['current_course_obj']->name;
echo $currentModuleName; ?></h2>
</a>
  
	<?php
$module_lessons = array();
$completedlesson = xprofile_get_field_data('Completed Lessons', $user_id, $is_required = false);
$args = array('post_type' => 'lesson', 'orderby' => 'date', 'order' => 'ASC', 'tax_query' => array(array('taxonomy' => 'modules', 'field' => 'term_id', 'terms' => $GLOBALS['current_course_obj']->term_id,),),);
$loop = new WP_Query($args);
if (have_posts()):
    while ($loop->have_posts()):
        $loop->the_post(); ?>
				
				<?php
        array_push($module_lessons, get_the_title()); ?>
				
				<?php
    endwhile; ?>
				<?php
endif; ?>				
				<?php

//debug($module_lessons);
$completedlessons = explode(',', $completedlesson);

//debug($completedlessons);
$count = 0;
for ($i = 0; $i < sizeof($module_lessons); $i++) {
    if (in_array($module_lessons[$i], $completedlessons)) {
        $count+= 1;
    }
}

//echo $count;
if ($count == $GLOBALS['current_course_obj']->count) {
    get_template_part('enrollment/badge', 'completed');
     //get 'Completed' badage, Full star
    
    $GLOBALS['completeModule'] = $GLOBALS['completeModule'] . "," . $currentModuleName;
    echo $GLOBALS['completeModule'];
} 
else {
    if ($count < $GLOBALS['current_course_obj']->count && $count > 0 && getEnrollment($user_id) == $GLOBALS['current_course_obj']->name) {
        get_template_part('enrollment/badge', 'uncomplete');
    }
     //get 'half-Compl' badage, half star
    
}
?> 
				
  <p><?php
echo $GLOBALS['current_course_obj']->description; ?></p>
      <?php
get_template_part('enrollment/content', 'module-meta'); ?>
       <?php

if (getEnrollment($user_id) == $GLOBALS['current_course_obj']->name) {
    get_template_part('enrollment/message', 'already-enrolled');
}
?>
             
 </li>