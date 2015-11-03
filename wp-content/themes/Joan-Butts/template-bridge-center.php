<?php
/*
Template Name: Bridge Centre Page
*/
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
    <?php the_post_thumbnail( 'single-post-thumbnail', array('class' => 'home-intro-img')); ?>
        <header class="article-header">
            <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </header> <!-- end article header -->
        <section class="bridge-center-lessons">
            <h2>Lessons</h2>
            <p>Joan give all lessons, from beginner to advanced. Next courses are:</p>
            <?php get_template_part('templates/bridge-center','lessons'); ?>
        </section>
        <section class="duplicate-games">
            <h2>Duplicate Games</h2>
            <p>Regular masterpointed games are offered three times a week. Contact us if you need a partner. Pam Schoen's number is: 0422378016</p>
            <?php get_template_part('templates/bridge-center','duplicate-games'); ?>
        </section>
        <section class="supervised-sessions">
            <h2>Supervised Sessions</h2>
            <p>Ask for advice from your tutor. Each session starts with a practice hand with Joan. No need to come with a partner.</p>
            <?php get_template_part('templates/bridge-center','supervised-sessions'); ?>
        </section>
        <section class="static-iframes">
            <iframe src="https://maps.google.com.au/maps?q=3+Amy+St,+Albion+QLD&amp;ie=UTF8&amp;hq=&amp;hnear=3+Amy+St,+Albion+Queensland+4010&amp;gl=au&amp;t=m&amp;ll=-27.469897,153.049507&amp;spn=0.011423,0.036392&amp;z=14&amp;iwloc=A&amp;output=embed" width="1081" height="380" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
            <small><a style="color: #0000ff; text-align: left;" href="https://maps.google.com.au/maps?q=3+Amy+St,+Albion+QLD&amp;ie=UTF8&amp;hq=&amp;hnear=3+Amt+St,+Albion+Queensland+4010&amp;gl=au&amp;t=m&amp;ll=-27.469897,153.049507&amp;spn=0.011423,0.036392&amp;z=14&amp;iwloc=A&amp;source=embed">View Larger Map</a></small>
            <h2>Results</h2>
            <iframe class="results-iframe" style="border: 0px;" src="http://www.cards.bridgeaustralia.org/resultslistbm.asp" width="1083" height="800"></iframe>
        </section>
    </article> <!-- end article -->
<?php endwhile; else : ?>
                
<?php endif; ?>
<?php //get_sidebar(); ?>