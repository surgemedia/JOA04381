<header class="banner" role="banner">
    <div class="container">
        <div class="page-header">
            <div class="logo-container">
                <a class="brand col-md-6 col-sm-5 col-xs-12" href="<?= esc_url(home_url('/')); ?>">
                <?php
                        $image = get_field('logo','option');
                            if(strlen($image['url']) > 0){
                ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>">
                <?php } else{ ?>
                <h1>Joan Butts Bridge</h1>
                <?php } ?>
                </a>
                <div class="user-container col-md-5 col-sm-7 col-xs-12">
                    <?php get_template_part('templates/header','user-container');?>
                </div>
            </div>

        </div>
        <nav class="navbar navbar-default col-xs-12 ">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-navigation" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse " id="primary-navigation">
                <?php
                            if (has_nav_menu('primary_navigation')) :
                                wp_nav_menu(['theme_location' => 'primary_navigation','depth'=> 7,'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
                            endif;
                ?>
        

            </div>
        </nav>
    </div>
</header>
<!-- Login modal box -->
<div class="modal fade" id="mylogin" tabindex="-1" role="dialog" aria-labelledby="myLoginpopup">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Login to Play Bridge</h4>
            </div>
            <div class="modal-body">
                <?php echo do_shortcode('[theme-my-login login_template="theme-my-login/login-form.php"]'); ?>
            </div>
        </div>
    </div>
</div>