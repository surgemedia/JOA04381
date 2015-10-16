<header class="banner" role="banner">
    <div class="container">
        <div class="page-header">
            <div class="logo-container">
                <a class="brand col-md-4 col-sm-6 col-xs-12" href="<?= esc_url(home_url('/')); ?>">
                <?php
                        $image = get_field('logo','option');
                            if(strlen($image['url']) > 0){
                ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>">
                <?php } else{ ?>
                <h1>Joan Butts Bridge</h1>
                <?php } ?>
                </a>
                <div class="user-container col-md-4 col-sm-6 col-xs-12">
                    <?php
                            if(is_user_logged_in()) {
                                $user = wp_get_current_user();
                                $user_id = bp_loggedin_user_id();
                                    $avatarurl = bp_core_fetch_avatar( array( 'item_id' => $user_id,'type'     => 'full', ) );
                    ?>
                    <div id="header-user" class="col-sm-12">
                       
                        <div class="display-img col-md-4 col-sm-4 col-xs-4">
                         <?php if (get_user_role()=='royal' OR get_user_role()=='administrator') { ?>
                        <i class="crown"></i> <!--For Crown-->
                        <?php  } ?>
                            <?php echo $avatarurl; ?>
                        </div>
                        <div class="current_info col-md-8 col-sm-8 col-xs-8">
                            <h2><a href="<?php echo site_url().'/login/'.$user->user_login; ?>"> <?php echo $user->display_name; ?></a></h2>
                            <span><?php echo getSkillLevel(); ?></span>
                            <?php
                                                    if(get_user_role()!='royal') {
                            ?>
                            <ul class="actions">
                                <li>
                                    <?php
                                        $the_user_id = $bp->loggedin_user->userdata->ID;
                                        $upgradeSub = 'http://sites.fastspring.com/joanbuttsbridge/product/joanbuttsplaybridgeonline?referrer="'.$the_user_id.'"';
                                    ?>
                                    <a class="btn btn-yellow" href="<?php echo $upgradeSub ?>">Upgrade <i class=" dashicons dashicons-awards"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-primary" href="<?php echo wp_logout_url(); ?>">Logout <i class=" dashicons dashicons-external"></i></a>
                                </li>
                            </ul>
                            <?php
                                                    }
                            ?>

                        </div>
                    </div>
                    <?php
                            }
                            else {
                    ?>
                    <div class="login-container text-right">
                        <a class="button" href="/register"><i class="icon-heart"></i>Register</a>
                        <a class="button" data-toggle="modal" data-target="#mylogin" ><i class="icon-spade" ></i> Login</i></a>
                    </div>
                    <?php
                            }
                    ?>
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