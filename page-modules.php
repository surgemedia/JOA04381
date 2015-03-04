<?php
/**
*
*Template Name: Learn Modules
*
*/
get_header(); ?>

<div id="content">
    <div id="inner-content" class="wrap clearfix">
        <div id="main" class="eightcol clearfix float-right" role="main">
            <div class="breadcrumbs">
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
                xprofile_set_field_data( 'Completed Modules', $user_id, $GLOBALS['completeModule'], $is_required = false );
                $completedmodules = xprofile_get_field_data( 'Completed Modules', $user_id, $is_required = false);
                
                if (strpos($completedmodules, $modules[0]->name) !== false &&
                    strpos($completedmodules, $modules[1]->name) !== false &&
                    strpos($completedmodules, $modules[2]->name) !== false) {
                    
                    xprofile_set_field_data( 'Bridge Skill', $user_id, "Beginner", $is_required = false );
                }

                if(strpos($completedmodules, $modules[3]->name) !== false &&
                        strpos($completedmodules, $modules[4]->name) !== false &&
                        strpos($completedmodules, $modules[5]->name) !== false){
                    
                    xprofile_set_field_data( 'Bridge Skill', $user_id, "Mid level", $is_required = false );
                }

                if(strpos($completedmodules, $modules[6]->name) !== false &&
                        strpos($completedmodules, $modules[7]->name) !== false &&
                        strpos($completedmodules, $modules[8]->name) !== false &&
                        strpos($completedmodules, $modules[9]->name) !== false){
                    xprofile_set_field_data( 'Bridge Skill', $user_id, "Advanced level", $is_required = false );
                }
                $GLOBALS['level'] = xprofile_get_field_data( 'Bridge Skill', $user_id, $is_required = false );
                ?>
                
            </div>
        </div>
        <?php get_sidebar('learn'); ?>
        <?php unset($GLOBALS['current_course_obj']); ?>
    </div>
</div>

<?php get_footer(); ?>