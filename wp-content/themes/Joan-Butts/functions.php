<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/utils.php',                 // Utility functions
  'lib/init.php',                  // Initial theme setup and constants
  'lib/wrapper.php',               // Theme wrapper class
  'lib/conditional-tag-check.php', // ConditionalTagCheck class
  'lib/config.php',                // Configuration
  'lib/assets.php',                // Scripts and stylesheets
  'lib/titles.php',                // Page titles
  'lib/extras.php',                // Custom functions
  'lib/nav-walker.php',            // Navigation compatible with bootstrap & Sage
  'lib/woocommerce-support.php',   // Woocommerce Support
  'lib/jbb/admin.php',             // Admin funcion - legacy
  'lib/jbb/addition-sizes.php',    // Admin funcion - legacy
  'post_types/action-post-type-account-types.php',    // Accounts from the home page
  'post_types/action-post-type-modules.php',    // Accounts from the home page
  'lib/acf-option-page.php',       // Options Page
  'lib/function-getuserrole.php',  // Get User Role
  'lib/function-enrollment-button.php',  // Get Enrollment
  'lib/function-debug.php',  // Get Enrollment
  'lib/fastspring.php',  // Fast Spring Class
  'lib/function-update-completed-modules.php',  // Update completed modules
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
