<?php
/** Constants */
$email 			= "joan@joanbuttsbridge.com";
$mailheaders 		= "From: Joan Butts <joan@joanbuttsbridge.com> \n";
$mailheaders 		.= "Reply-To: $email";
$title			= "fastspring-billing";
$company_id 		= "skybridgeclub";
$store_id 		= "joanbuttsbridge";
$product_id 		= "joanbuttsplaybridgeonline";
$api_username 		= "apiuser";
$api_password 		= "bustleable";
/** Vars */
$customer_ref 		= $_GET["customer_ref"];
$subscription_ref 	= $_GET["subscription_ref"];

function reportEmail($subject){
	$mailinfo		= "joan@joanbuttsbridge.com";
	$mailheaders 		= "From: www.joanbuttsbridge.com <joan@joanbuttsbridge.com> \n";
	$mailheaders 		.= "Reply-To: joan@joanbuttsbridge.com";
	$title 			= "FS BILLING";
	mail($mailinfo, $title, $subject, $mailheaders);
}
reportEmail($customer_ref);

if($customer_ref == null) {
  	echo "missing username";
} else {

	/** Set $redirectToUrl */
	$redirectToUrl = null;
	if($subscription_ref == null) {
	  	$redirectToUrl = "http://sites.fastspring.com/$store_id/product/$product_id?referrer=".$customer_ref;
	} else {
		 $url =  "https://api.fastspring.com/company/".$company_id."/subscription/".$subscription_ref."?user=".$api_username."&pass=".$api_password;		
		 $c = curl_init($url);
		 curl_setopt($c, CURLOPT_RETURNTRANSFER, true); 
		 $string = curl_exec($c);
		 $pieces = explode("<customerUrl>", $string);
		 $pieces1 = $pieces[1];
		 $pieces2 = explode("</customerUrl>", $pieces1);
		 $redirectToUrl = $pieces2[0];
	}
	/** Redirects to sign-up or subscription page */
	header("Location: $redirectToUrl");
}
?>

