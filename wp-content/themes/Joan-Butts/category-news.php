<header class="article-header">

        <h1 class="page-title" itemprop="headline">News</h1>

 </header>

<ul id="news-list">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<li id="post-<?php the_ID(); ?>" class="news" role="article" itemscope itemtype="http://schema.org/BlogPosting">
  
    <h3 class="news-title"><?php the_title(); ?></h3>
    <h5 class="date-blue"><?php echo $text_date ?></h5>
    <p>  <?php the_content(); ?></p>
    <div class="news-buttons">
      <a class="btn view-details" href="<?php echo get_permalink(); ?>">View Details</a>
    </div>


  <!-- end article section -->
<?php /* ?>
        <section class="entry-content clearfix" itemprop="articleBody">
            <?php the_content(); ?>

            <?php if(get_field('newss')): ?>

            <ul id="news-list">

                <?php while(has_sub_field('holidays')): ?>

                <li>
                    <img class="holiday-img" src="<?php the_sub_field('holiday_image'); ?>">
                    <h2><?php the_sub_field('holiday_name'); ?></h2>
                    <h3 class="date-blue"><?php the_sub_field('holiday_date'); ?></h3>
                    <p><?php the_sub_field('holiday_description'); ?></p>
                    <div class="holiday-buttons">
                        <a class="gray-button button-margin" href="<?php the_sub_field('flyer_upload'); ?>">Flyer</a>
                        <a class="gray-button" href="<?php the_sub_field('schedule_upload'); ?>">Schedule</a>
                        <a class="button float-right-clean" href="/holidays/register/">Register your interests</a>
                        <?php //the_sub_field('current_past'); ?>
                    </div>
                </li>

                <?php endwhile; ?>

            </ul>

            <?php endif; ?>
            </section> <!-- end article section -->
<?php */ ?>
           
                </article> <!-- end article -->
                <?php endwhile; else : ?>
                
                <?php endif; ?>
                <?php //get_sidebar(); ?>
</ul>