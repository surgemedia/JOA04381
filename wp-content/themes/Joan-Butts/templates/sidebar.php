<?php dynamic_sidebar('sidebar-primary'); ?>

<?php 
$template_file = get_post_meta( get_the_ID(), '_wp_page_template', TRUE );
echo "Page Template".$template_file 
debug(get_post_meta());
?>
