<?php
  /*
Plugin Name: Suit Symbols
Plugin URI:  http://bridgeteaching.com/2011/09/we-have-created-a-suit-symbol-plugin-for-wordpress/
Description: Easily add suit symbols to your blog via !C !D !H !S for club, diamond, heart, spade 
Version: 1.0
Author: Kitty Cooper
Author URI: http://openskywebdesign.com
License: GPL3

Copyright 2011 kitty cooper  (email : kitty@openskywebdesign.com)

    This file is part of the suit-symbols plugin for wordpress.

    suit-symbols is paid software that you can modify
    under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    suit-symbols is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
    
*/
function suit_symbol($text) {    
 $suits = array ("C","D","H","S");
 foreach ($suits as $suit) {
    $symbol = '<img src="' . WP_PLUGIN_URL . '/suit-symbols/symbols/'.$suit.'.gif" width="13" height="11" border="0">';
    $text =str_replace('!'.$suit,$symbol,$text); 
    $text =str_replace('!'.strtolower($suit),$symbol,$text); 
 }  
 return $text;
 }  

function suit_symbol_head() {
    //maybe we will need this some day
}
// Pre-2.6 compatibility
if ( ! defined( 'WP_CONTENT_URL' ) )
      define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( ! defined( 'WP_CONTENT_DIR' ) )
      define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
      define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR' ) )
      define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' ); 
      
add_filter('the_title', 'suit_symbol');       
add_filter('the_content', 'suit_symbol');
add_filter('the_excerpt', 'suit_symbol');
add_filter('comment_text', 'suit_symbol');
add_filter('comment_excerpt', 'suit_symbol');  
add_action('wp_head', 'suit_symbol_head');
?>
