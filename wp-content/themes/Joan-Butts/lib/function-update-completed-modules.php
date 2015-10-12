<?php 
function updateCompletedModules() {
	$user_id = getUser();
	$status = xprofile_get_field_data( 'Completed Lessons', $user_id );
   	$status = wptexturize($status);
   	$texture_list = rtrim($status,",");
	$texture_list = explode(",",$texture_list);
	if(strlen($status)>0) {
		// echo "if loop<br>";
		//Update Completed Module
		// WP_Query arguments
			$post_type = 'lesson';
			$tax = 'modules';
			$tax_terms = get_terms($tax);
			$tax_terms['remaining'] = array();
			if ($tax_terms) {
				// debug($tax_terms);
 			    foreach ($tax_terms  as $tax_term) {
 			        $args=array(
 			           'post_type' => $post_type,
 			           "$tax" => $tax_term->slug,
 			           'post_status' => 'publish',
 			           'posts_per_page' => -1,
 			           'caller_get_posts'=> 1
 			        ); 

 		  	        $my_query = null;
 			        $my_query = new WP_Query($args);
 			        if( $my_query->have_posts() ) {
 			            // echo 'List of '.$post_type . ' where the taxonomy '. $tax . '  is '. $tax_term->name;
 			            $tax_terms['remaining'].array_push($tax_terms['remaining'][$tax_term->name]);
 			            // $tax_terms['completed'].array_push($tax_terms['completed'][$tax_term->name]);
 			            // $tax_terms['total'][$tax_term->name]=0;
 			            $tax_terms['remaining'][$tax_term->name]=0;
 			            while ($my_query->have_posts()) : $my_query->the_post();
 			            	$tax_terms['remaining'][$tax_term->name]++;
 			            	// echo "the title is ".get_the_title();
 			            	// debug($texture_list)
 			            	if(in_array(get_the_title(),$texture_list)) {
 			            		$tax_terms['remaining'][$tax_term->name]--;
 			            	}
 			            	?>
 			            	<?php/*<p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p> */?>
 			            	<?php

 			            endwhile;

 			        }
 			        wp_reset_query();
 			    }
 			    foreach ($tax_terms['remaining'] as $remaining => $value) {
 			    	if($value==0) {
 			    		$completedModule = xprofile_get_field_data( 'Completed Modules', $user_id);
 			    		$completedModule = rtrim($completedModule,",");
 			    		$completedModule = explode(",",$completedModule);
 			    		if(!in_array($remaining, $completedModule)) {
 			    			$completedModule = implode(",", $completedModule);
							$completedModule .= ",".$remaining;
							xprofile_set_field_data( 'Completed Modules', $user_id, $completedModule, $is_required = false );
							// debug($completedModule)	;
						}
 			    		// echo $remaining." - completed<br>";
 			    	}
 			    	else {
 			    		// echo $remaining." - remaining<br>";
 			    	}
 			    }
 			    // $completedModule = xprofile_get_field_data( 'Completed Modules', $user_id);
 			    // debug($completedModule);
 			    // debug($tax_terms);
			}
	}
	else {
		// echo "else loop<br>";
		xprofile_set_field_data( 'Completed Modules', $user_id, '', $is_required = false );
	}
}