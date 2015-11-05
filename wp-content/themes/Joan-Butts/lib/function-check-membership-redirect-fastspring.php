<?php
function checkMembershipRedirectFastspring() {
	//wp_update_user(array('ID'=>getUser(),'role'=>'administrator'));
	$user = bp_loggedin_user_id();
	//xprofile_set_field_data( 'Membership', $user, '6843', $is_required = false );
	// debug(getFreeTrialId());
	$membership = xprofile_get_field_data( 'Membership', $user);
	// debug($membership);
	$fsid = xprofile_get_field_data( 'fsid', $user);
	// debug($fsid);
	// debug(get_user_role());
	// debug(getUser());
	// debug($_GET["r"]);
	
	if($membership=='Royal Member' && strlen($fsid)<=0 && strlen($_GET["r"])<=0){ //executes if user selected Royal Membership in registration page

		echo '<script type="text/javascript">
			var url = "http://sites.fastspring.com/joanbuttsbridge/product/joanbuttsplaybridgeonline?action=adds&referrer="+'.$user.';
			var r = confirm("Pay now to be a Royal member?");
			if(r==true) {
				location.href=url;
			}
			else {
				location.href=location.href+"?r=f";
			}
		  </script>';
	}
	elseif($membership=='Royal Member' && strlen($fsid)>0 && get_user_role()!='administrator') { //executes if user cancels his subscripition
		$response = new DOMDocument();
		$response->load('https://api.fastspring.com/company/skybridgeclub/subscription/'.$fsid.'?user=apiuser&pass=bustleable');
		if(strpos($response->textContent,'inactive')>=0) {
			xprofile_set_field_data( 'Membership', $user, getFreeTrialId(), $is_required = false );
			wp_update_user(array('ID'=>getUser(),'role'=>'free_member'));
		}
	}
	//If Confirmation to proceed to Royal Membership payment is false, set role, membership back to Free Trial
	if($_GET["r"]=='f') {
		xprofile_set_field_data( 'Membership', $user, getFreeTrialId(), $is_required = false );
		wp_update_user(array('ID'=>getUser(),'role'=>'free_member'));
	}
	//wp_update_user(array('ID'=>getUser(),'role'=>'administrator'));
}

//Get IDs of Account Types
function getFreeTrialId() {
	$args = array (
		'post_type'              => array( 'account_type' ),
		'name'			 => 'free-trial',
	);

	// The Query
	$query = new WP_Query( $args );
	// The Loop
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			return get_post()->ID;
		}
	} else {
		return '';
	}

	// Restore original Post Data
	wp_reset_postdata();
}
function getRoyalId() {
	$args = array (
		'post_type'              => array( 'account_type' ),
		'name'			 => 'royal-member',
	);

	// The Query
	$query = new WP_Query( $args );
	// The Loop
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			return get_post()->ID;
		}
	} else {
		return '';
	}

	// Restore original Post Data
	wp_reset_postdata();
}