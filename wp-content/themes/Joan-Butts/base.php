<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>
<?php //checks if its the game page ?>
<?php if(basename(get_permalink()) != 'play'): ?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <?php
    $image = get_field('background_image','option');
    if($image) {
      $styleString = 'style="background-image: url('.$image.')";';
    }
  ?>
  <body <?php echo $styleString ?> <?php body_class(); ?>>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div class="wrap container" role="document">
      <div class="content row">
        <main class="main" role="main">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Config\display_sidebar()) : ?>
          <aside class="sidebar" role="complementary">
            <?php include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>

<?php else: ?>
<?php //only gets game page if the slug is play ?>

          <?php include Wrapper\template_path(); ?>
<?php endif; ?>
