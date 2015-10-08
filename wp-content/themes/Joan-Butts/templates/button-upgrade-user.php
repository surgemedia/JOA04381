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
$response = new DOMDocument();
$response->load('https://api.fastspring.com/company/skybridgeclub/subscription/'.$subscription_ref.'?user=apiuser&pass=bustleable');
$editSubscription = $response->getElementsByTagName("customerUrl")->item(0)->nodeValue;
$upgradeSub = 'http://sites.fastspring.com/'.$store_id.'/product/'.$product_id.'?referrer="'.$the_user_id.'"';
 ?>
 <?php if(!(get_user_role()=='administrator') || (get_user_role()=='royal')){ ?>
 <a class="btn btn-primary" href="<?php echo $upgradeSub ?>">Upgrade</a>
<?php }; ?>
<?php if( (get_user_role()=='administrator') || ( get_user_role()=='royal') ){ ?>
 <a class="btn btn-primary" href="<?php echo $editSubscription; ?>">Manage Subscription</a>
 <?php }; //is_royal ?>
<?php } else { ?>
 <a class="btn btn-primary" href="/register/">Register Today!</a>
<?php }; ?>

