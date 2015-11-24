<?php
/**
* Template Name: Almost there Upgrade Now
*/
?>
<?php while (have_posts()) : the_post(); ?>
<?php   if(is_user_logged_in()){ ?>
<?php get_template_part('templates/page', 'header-left'); ?>
<?php get_template_part('templates/content', 'page'); ?>
<section class="clearfix">
    <div id="almost_there" class="account-types">
        <div class="row">
            <?php
                        // WP_Query arguments
                        $args = array (
                                        'post_type'              => array( 'account_type' ),
                        );
                        // The Query
                        $query = new WP_Query( $args );
                        // The Loop
                        if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                        $query->the_post();
            ?>
            <div class="col-md-6">
                <div class="account-card">
                    <h4 class="account-title"><?php the_title(); ?></h4>
                    <?php
                                        if(!get_field('price')) {
                                        $style="style='visibility:hidden'";
                                        }
                                        else {
                                        $style ='';
                                        }
                    ?>
                    <p class="account-price" <?php echo $style ?>>$ <?php the_field('price'); ?> / month</p>
                    <ul>
                        <?php
                                                $feature_list = get_field('features');
                                                for ($i = 0; $i < count($feature_list); $i++) {
                        ?>
                        <li><?php echo $feature_list[$i][feature]; ?></li>
                        <?php
                                                }
                        ?>
                    </ul>
                    <?php   if(get_field('price')) { ?>
                    <?php
                    if(is_user_logged_in()){
                    global $bp;
                    $the_user_id = $bp->loggedin_user->userdata->ID;
                    if(xprofile_get_field_data( 'fsid', $the_user_id )){
                    $subscription_ref = xprofile_get_field_data( 'fsid', $the_user_id );
                    }
                    $email 			= "joan@joanbuttsbridge.com";
                    $mailheaders 		= "From: Joan Butts <joan@joanbuttsbridge.com> \n";
                    $mailheaders 		.= "Reply-To: $email";
                    $title			= "fastspring-billing";
                    $company_id 		= "skybridgeclub";
                    $store_id 		= "joanbuttsbridge";
                    $product_id 		= "joanbuttsplaybridgeonline";
                    $api_username 		= "apiuser";
                    $api_password 		= "bustleable";
                    echo '<!--';
                    $response = new DOMDocument();
                    if((get_user_role()=='administrator') || ( get_user_role()=='royal')) {
                    $response->load('https://api.fastspring.com/company/skybridgeclub/subscription/'.$subscription_ref.'?user=apiuser&pass=bustleable');
                    $editSubscription = $response->getElementsByTagName("customerUrl")->item(0)->nodeValue;
                    }
                    $upgradeSub = 'http://sites.fastspring.com/'.$store_id.'/product/'.$product_id.'?action=adds&referrer='.$the_user_id;
                    debug($response);
                    echo "-->";
                    ?>
                    <?php
                    if(get_user_role()=='administrator' || (get_user_role()=='free_member')){ ?>
                    <a class="theme-button pad-5" href="<?php echo $upgradeSub ?>">Upgrade Now!</a>
                    <?php };
                    if( (get_user_role()=='administrator') || ( get_user_role()=='royal') ){ ?>
                    <a class="theme-button pad-5" href="<?php echo $editSubscription; ?>">Manage Subscription</a>
                    <?php }; //is_royal ?>
                    <?php
                    } else { ?>
                    <a class="theme-button" href="/register/">Register Today!</a>
                    <?php }; ?>

                    <?php }  else { ?>
                    <a class="theme-button" href="/">Free Member</a>
                    <?php } ?>
                </div>
            </div>
            <?php
                        }
                        } else {
                        // get_template_part('templates','single','account-types');
                        }
                        // Restore original Post Data
                        wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<?php  } else {
    // echo '<script> window.location.replace("http://joanbuttsbridge.com/register");</script>';
  } ?>
<?php endwhile; ?>