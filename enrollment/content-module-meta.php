<ul class="each_modules_fields">	
				<li><span class="dashicons dashicons-format-video"></span>
				<p><?php the_field('video',$GLOBALS['current_course_obj']); ?></p>
				</li>
				<li><span class="dashicons dashicons-book-alt"></span>
				<p><?php the_field('text_book', $GLOBALS['current_course_obj']); ?></p>
				</li>
				<li><span class="dashicons dashicons-awards"></span>
				<p><?php the_field('text', $GLOBALS['current_course_obj']); ?></p>
				</li>
				<li><span class="dashicons dashicons-admin-comments"></span>
				<p><?php the_field('forum', $GLOBALS['current_course_obj']); ?></p>
				</li>
			</ul>