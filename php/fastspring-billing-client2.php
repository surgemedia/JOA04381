<?php
// require_once('../wp-config.php');
function debug($data) {
//makes debuging easier with clear values
    echo '<pre>';
    print_r($data); 
    echo '</pre>';
}

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
if(isset($_GET["subscription_ref"])){
$subscription_ref 	= $_GET["subscription_ref"];
 debug($subscription_ref);
}
// debug($customer_ref);


function reportEmail($subject){
	$mailinfo		= "joan@joanbuttsbridge.com";
	$mailheaders 		= "From: www.joanbuttsbridge.com <joan@joanbuttsbridge.com> \n";
	$mailheaders 		.= "Reply-To: joan@joanbuttsbridge.com";
	$title 			= "FS BILLING";
	mail($mailinfo, $title, $subject, $mailheaders);
}
// reportEmail($customer_ref);
if($customer_ref == null) {
  	echo "missing username";
} else {
	echo 'username found';
	$redirectToUrl = null;
	// if( length($subscription_ref) <= 0 ) {
	// 	echo 'Returning member found';
	//   	$redirectToUrl = "http://sites.fastspring.com/$store_id/product/$product_id?referrer=".$customer_ref;
	// } else {
		// echo 'Redirecting you now';
  $subscription_ref = 'JBB150913-7450-86126S';
  $response = new DOMDocument();
  $response->load('https://api.fastspring.com/company/skybridgeclub/subscription/JBB150913-7450-86126S?user=apiuser&pass=bustleable');
  $redirectToUrl = $response->getElementsByTagName("customerUrl")->item(0)->nodeValue;
  debug($response);

	header("Location: $redirectToUrl");
}
?>

