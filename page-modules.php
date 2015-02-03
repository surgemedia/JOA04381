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


<article id="lessons">
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

  <h2> <a href="<?php echo site_url(); ?>/modules/<?php echo $modules[$i]->slug; ?>"> <?php echo $modules[$i]->name; ?></a></h2>
  <p><?php echo $modules[$i]->description; ?></p>
    <ul class="modules_fields">
      <li><span class="dashicons dashicons-video-alt"></span><?php the_field('video', $modules[$i]); ?></li>
      <li><span class="dashicons dashicons-book-alt"></span><?php the_field('text_book', $modules[$i]); ?></li>
      <li><span class="dashicons dashicons-desktop"></span><?php the_field('text', $modules[$i]); ?></li>
      <li><span class="dashicons dashicons-universal-access"></span><?php the_field('forum', $modules[$i]); ?></li>
    </ul>
  <hr>
<?php } ?>
</article>
    

</div>
</div>
<?php get_sidebar('learn'); ?>
</div>
</div>
    

<?php get_footer(); ?>
