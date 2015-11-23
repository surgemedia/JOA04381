<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
 
/*====================================
=            LOCAL CONFIG            =
====================================*/
// error_reporting(E_ALL); ini_set('display_errors', 1);

// Include local configuration
// if(file_exists(dirname(__FILE__) . '/local-config.php')) {
// 	include(dirname(__FILE__) . '/local-config.php');

// }



	define('WP_HOME','http://joanbutts.surgehost.com.au');
	define('WP_SITEURL','http://joanbutts.surgehost.com.au/');
// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'joanbutt_ickyboat57');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'joanbutt_l40i76');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'ku6sruzzxv8yt7w33wchg7u446sl64');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'jZ|1{j8d#~D-@iC+bG=HVJfIc-YmhRvZC^Mz9~-xb%MH>~<D#<wg.W<qkXIL.,,0');
define('SECURE_AUTH_KEY',  '1{f4!ms(%w<pR|2Z%Lk/}#v]+S>%4 O{vlmP3-:`rRTOJ9AFJN`fkWo[Hu/C+RQ|');
define('LOGGED_IN_KEY',    '(a91#G:-xcIgP$5U6o^)<r2x&`CjHYrkSN<S=|7.l}.pbY4#Fb}?sCk^|wcw-J-`');
define('NONCE_KEY',        '}5vl~-f+OmVtgs~aUI^OY;<Pl$jp+HDr;N0nYlA7BS-O5dY}OC;h*u@T|ItjpnhX');
define('AUTH_SALT',        'J?QSC+AJRa1~+[# [V8XnRnQ+UPJ]k1Uk|f::<l[Xr)^(IK&|1Q,%hr@:7*ye,8-');
define('SECURE_AUTH_SALT', '}1dnu4BH]4Jye@.O}cq|lXNktEQ:Ta^7>|rK-`cQgI,m8%]%m(a:pW>74||opB81');
define('LOGGED_IN_SALT',   '0/waYleJ|Zw4-&PC -q!y,T?~+u2Ls 9e3{Jy2cDV;KLrxjQ|UKVPD>K|4+Kc|A ');
define('NONCE_SALT',       'Dh3,+=~~y~stLvX|?Fgh<,a*kkmQR/tLs@}=@= *?n]g=jo|_ st0D]bgNk2|-ol');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'zjcvuc_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
	define( 'SCRIPT_DEBUG', false );
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
