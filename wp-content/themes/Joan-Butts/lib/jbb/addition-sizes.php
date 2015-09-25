<?php 
// require_once('library/translation/translation.php'); // this comes turned off by default
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'jbb-thumb-600', 600, 150, true );
add_image_size( 'jbb-thumb-300', 300, 100, true );
add_image_size( 'feature-img', 300, 200);
add_image_size( 'feature-img-news', 250, 170);
 ?>