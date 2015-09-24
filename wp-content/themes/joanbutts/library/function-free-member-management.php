<?php
/*=========================================
=            Free Member Rules            =
=========================================*/
function create_role_free_role() {
      $role = get_role('customer')->capabilities;
      if(!get_role('free_member')){
      add_role( 'free_member', 'Free Member', $role );
      }
  }

function fix_free_members(){
// $blogusers = get_users('&role=customer');
// foreach ($blogusers as $user) {
//         $u->remove_role( 'customer' );
//         $u->add_role( 'free_member' );
//     }
}

// Change Woocommerce to Free Member
// function woocommerce_user_change(){
// $new_customer_data = apply_filters( 'woocommerce_new_customer_data', array(
//     'user_login' => $username,
//     'user_pass'  => $password,
//     'user_email' => $email,
//     'role'       => get_option( 'free_member' )
// ));
// }