<?php
/**
*
*Template Name: Learn Modules
*
*/
?>
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header-left'); ?>
  <?php //get_template_part('templates/content', 'page'); ?>

    
<?php endwhile; ?>
                <article>
                    <ul id="module_list">
                        <?php
                        $taxonomies =  array(
                        'modules');
                        $args = array(
                        'orderby'           => 'none',
                        'order'             => 'ASC',
                        'hide_empty'        => false,
                        'exclude'           => array(),
                        'exclude_tree'      => array(),
                        'include'           => array(),
                        'number'            => '',
                        'fields'            => 'all',
                        'slug'              => '',
                        'name'              => '',
                        'parent'            => '',
                        'hierarchical'      => true,
                        'child_of'          => 0,
                        'get'               => '',
                        'name__like'        => '',
                        'description__like' => '',
                        'pad_counts'        => false,
                        'offset'            => '',
                        'search'            => '',
                        'cache_domain'      => 'core'
                        );
                        $modules = get_terms( $taxonomies, $args);
                        
                        for ($i=0; $i < sizeof($modules); $i++) {?>
                        <?php  $GLOBALS['current_course_obj'] = $modules[$i];
                         ?>
                        <?php get_template_part('enrollment/content', 'module-loop' ); ?>
                        <?php } ?>
                    </ul>
                </article>
                <?php 
                $user_id = getUser();
                 // Reset All Player Progress
                 // xprofile_set_field_data( 'Completed Modules', $user_id, "", $is_required = false );
                 // xprofile_set_field_data( 'Completed Lessons', $user_id, "", $is_required = false );
                 // xprofile_set_field_data( 'Bridge Skill', $user_id, "New Player", $is_required = false );

                
                $completedmodules = xprofile_get_field_data( 'Completed Modules', $user_id, $is_required = false);
                if (in_array($modules[0]->name,$completedmodules) !== false &&
                    in_array($modules[1]->name,$completedmodules) !== false &&
                    in_array($modules[2]->name,$completedmodules) !== false) {
                    xprofile_set_field_data( 'Bridge Skill', $user_id, "Beginner", $is_required = false );
                }

                if(in_array($modules[3]->name,$completedmodules) !== false &&
                        in_array($modules[4]->name,$completedmodules) !== false &&
                        in_array($modules[5]->name,$completedmodules) !== false){
                    
                    xprofile_set_field_data( 'Bridge Skill', $user_id, "intermediate", $is_required = false );
                }

                if( in_array($modules[0]->name,$completedmodules) &&
                    in_array($modules[1]->name,$completedmodules) &&
                    in_array($modules[2]->name,$completedmodules) &&
                    in_array($modules[3]->name,$completedmodules) &&
                    in_array($modules[4]->name,$completedmodules) &&
                    in_array($modules[5]->name,$completedmodules) &&
                    in_array($modules[6]->name,$completedmodules) &&
                    in_array($modules[7]->name,$completedmodules) &&
                    in_array($modules[8]->name,$completedmodules) &&
                    in_array($modules[9]->name,$completedmodules) ){
                    xprofile_set_field_data( 'Bridge Skill', $user_id, "Advanced Player", $is_required = false );
                }
                $GLOBALS['level'] = xprofile_get_field_data( 'Bridge Skill', $user_id, $is_required = false );
                
                ?>
            
     
        <?php unset($GLOBALS['current_course_obj']); ?>