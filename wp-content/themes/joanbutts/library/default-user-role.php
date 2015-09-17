<?php
$new_customer_data = apply_filters( 'woocommerce_new_customer_data', array(
    'user_login' => $username,
    'user_pass'  => $password,
    'user_email' => $email,
    'role'       => get_option( 'default_role' )
) );
