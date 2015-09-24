<?php
/*=========================================
=            Free Member Rules            =
=========================================*/
function create_role_free_role() {
       // remove_role( 'subscriber' );
       // remove_role( 'customer' );
       $role = get_role('free_member')->capabilities;
      if( get_role('free_member')->capabilities){
      	 add_role( 'free_member', 'Free Member', $role );
      }
  }

function fix_free_members(){
$blogusers = get_users($blogID.'&role=subscriber');
foreach ($blogusers as $user) {
        $u->remove_role( 'customer' );
        $u->add_role( 'free_member' );
    }
}

// Change Woocommerce to Free Member
function woocommerce_user_change(){
$new_customer_data = apply_filters( 'woocommerce_new_customer_data', array(
    'user_login' => $username,
    'user_pass'  => $password,
    'user_email' => $email,
    'role'       => get_option( 'free_member' )
));
}