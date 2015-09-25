<?php 
/*
 * Woocommerce support.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'base_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'base_wrapper_end', 10);

function base_wrapper_start() {
  echo '<div class="twelvecol clearfix float-right">';
}

function base_wrapper_end() {
  echo '</div>';
}
add_theme_support( 'woocommerce' );
 ?>