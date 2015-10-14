<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<div class="login" id="theme-my-login<?php $template->the_instance(); ?>">
    <?php $template->the_action_template_message( 'login' ); ?>
    <?php $template->the_errors(); ?>

    <form name="loginform" id="loginform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'login' ); ?>" method="post">

        <div class="input-group">
            <label class="input-group-addon" for="user_login<?php $template->the_instance(); ?>"><?php _e( 'Username or Email', 'theme-my-login' ); ?></label>
            <input type="text" name="log" id="user_login<?php $template->the_instance(); ?>" class="form-control" value="<?php $template->the_posted_value( 'log' ); ?>" size="20" />
        </div>
        <div class="input-group">
            <label class="input-group-addon" for="user_pass<?php $template->the_instance(); ?>"><?php _e( 'Password', 'theme-my-login' ); ?></label>
            <input type="password" name="pwd" id="user_pass<?php $template->the_instance(); ?>" class="form-control" value="" size="20" autocomplete="off" />
        </div>
        <?php do_action( 'login_form' ); ?>
        <p class="forgetmenot">
        <input name="rememberme" type="checkbox" id="rememberme<?php $template->the_instance(); ?>" value="forever" />
        <label for="rememberme<?php $template->the_instance(); ?>"><?php esc_attr_e( 'Remember Me', 'theme-my-login' ); ?></label>
        </p>
        <ul id="login-action">
            <li class="pull-right"><a id="submit" class="btn btn-primary" >
                <input class="" type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Login', 'theme-my-login' ); ?>" />
                <input class="" type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'login' ); ?>" />
                <input class="" type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
                <input class="" type="hidden" name="action" value="login" />
            </a></li>
            <li><a href="/register" class="btn btn-blue">
                <span>Sign up for an Account</span>
            </a></li>
        </ul>


    </form>
    <?php $template->the_action_links( array( 'login' => false ) ); ?>
</div>