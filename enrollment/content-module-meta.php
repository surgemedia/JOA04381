<ul class="each_modules_fields">	
				<li><span class="dashicons dashicons-format-video"></span>
				<p><?php the_field('video',$GLOBALS['current_course_obj']); ?></p>
				</li>
				<li><span class="dashicons dashicons-book-alt"></span>
				<?php 
				$book_id =  get_field('text_book', $GLOBALS['current_course_obj']);
				 ?>
				<p><a href="<?php echo get_permalink($book_id[0]->ID); ?>">Buy the book for this lesson</a> 
				</p>
				</li>
				<li><span class="dashicons dashicons-awards"></span>
				<p><?php the_field('text', $GLOBALS['current_course_obj']); ?></p>
				</li>
				<li><span class="dashicons dashicons-admin-comments"></span>
				<p><a href="<?php the_field('forum', $GLOBALS['current_course_obj']); ?>">Discuss This</a>
				</p></li>
			</ul>
			