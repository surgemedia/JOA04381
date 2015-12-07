<?php
/*
Template Name: Videos Page
*/
?>
<?php
// WP_Query arguments
$args = array (
    'post_type'              => array( 'video' ),
    'order'                  => "ASC",
    'posts_per_page'         => '-1',
);

// The Query
$query = new WP_Query( $args );
// debug(sizeof($query->posts));
// The Loop
if ( $query->have_posts() ) {?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
            <?php the_post_thumbnail( 'single-post-thumbnail', array('class' => 'home-intro-img')); ?>
                
                <header class="article-header">

                    <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
                    
                </header> <!-- end article header -->
                <?php 
                    // if(!empty(get_user_role())) {
                ?>
                <section class="entry-content clearfix" itemprop="articleBody">
                <ul id="video_list">
<?php
    while ( $query->have_posts() ) {
        $query->the_post();
    // do something
        ?>
                <li class="cpt-li">
                    <div class="row col-lg-5 pull-left"><?php the_field('video'); ?></div>
                    <div class="col-lg-7 col-lg-push-1">
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_content(); ?></p>
                    </div>
                    
                </li>

<?php   }?>
        </ul>
        </section> <!-- end article section -->
        <?php
           
        ?>
            <!-- <footer class="article-footer">
                <?php the_tags('<span class="tags">' . __('Tags:', 'jbbtheme') . '</span> ', ', ', ''); ?>

            </footer> --> <!-- end article footer -->
            
</article> <!-- end article -->

<?php
} else {
    // no posts found
}

// Restore original Post Data
wp_reset_postdata();
?>