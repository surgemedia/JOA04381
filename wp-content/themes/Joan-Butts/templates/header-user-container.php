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
	if((get_user_role()=='administrator') || (get_user_role()=='royal')) {
		$response->load('https://api.fastspring.com/company/skybridgeclub/subscription/'.$subscription_ref.'?user=apiuser&pass=bustleable');
		$editSubscription = $response->getElementsByTagName("customerUrl")->item(0)->nodeValue;
		// debug(get_user_role());
	}
	$upgradeSub = 'http://sites.fastspring.com/'.$store_id.'/product/'.$product_id.'?action=adds&referrer='.$the_user_id;
	// debug($response);
	echo "-->";
	?>
	 <?php 
	 if(get_user_role()=='administrator' || (get_user_role()=='free_member')){ ?>
	 	<a class="header-link" href="<?php echo $upgradeSub ?>"><i class="icon-spade"></i>Upgrade</a>
	<?php }; 
	// debug($editSubscription);
	if( ((get_user_role()=='administrator') || ( get_user_role()=='royal')) && strlen($editSubscription)>0){ ?>
	 	<a class="header-link" href="<?php echo $editSubscription; ?>"><i class="icon-spade"></i>Manage Subscription</a>
	 <?php }; //is_royal ?>
	 	<a class="header-link" href="<?php echo wp_logout_url(home_url()); ?>"><i class="icon-club"></i>Logout</a>
<?php 
	$user = wp_get_current_user();
    $user_id = bp_loggedin_user_id();
    $avatarurl = bp_core_fetch_avatar( array( 'item_id' => $user_id,'type'     => 'full', ) );
?>
	<div id="header-user" class="row">
        <div class="current_info col-md-9 col-sm-8 col-xs-9">
            <h3 class="username"><a href="<?php echo site_url().'/login/'.$user->user_login; ?>"> <?php echo $user->user_login; ?></a></h3>
            <span><?php echo getSkillLevel(); ?></span><i class="icon-diamond"></i>
            <span><?php 
            	switch(get_user_role()) {
            		case 'royal':
            			echo "Royal Member";
            			break;
            		case 'administrator':
            			echo "Administrator";
            			break;
            		case 'free_member':
            			echo "Free Member";
            			break;
            		default :
            			echo "Welcome";
            			break;
            	}
            	?>
            </span>
        </div>
        <div class="display-img col-md-3 col-sm-4 col-xs-3">
         	<?php if (get_user_role()=='royal' OR get_user_role()=='administrator') { ?>
        		<i class="crown"></i> <!--For Crown-->
        	<?php  } ?>
            <?php echo $avatarurl; ?>
        </div>
    </div>
<?php
} else { ?>
 	<a class="header-link" href="/register/"><i class="icon-heart"></i>Register</a>
	<a class="header-link" data-toggle="modal" data-target="#mylogin" ><i class="icon-spade" ></i> Login</a>
<?php }; ?>

