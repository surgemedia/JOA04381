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
 <?php  $GLOBALS['current_course_obj'] = $modules[$i]; ?>
  <?php get_template_part('enrollment/content', 'module-loop' ); ?>
  <?php unset($GLOBALS['current_course_obj']); ?>
<?php } ?>

</ul>
</article>
    

</div>
</div>
<?php get_sidebar('learn'); ?>
</div>
</div>
    

<?php get_footer(); ?>
