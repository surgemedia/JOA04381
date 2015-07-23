<ul class="each_modules_fields">
				<?php if (get_field('video',$GLOBALS['current_course_obj'])): ?>
				<li><span class="dashicons dashicons-format-video"></span>
				<p><?php the_field('video',$GLOBALS['current_course_obj']); ?></p>
				</li>
				<?php endif ?>

				<?php if(get_field('text_book', $GLOBALS['current_course_obj'])): ?>
				<li><span class="dashicons dashicons-book-alt"></span>
				<?php $book_id =  get_field('text_book', $GLOBALS['current_course_obj']);?>
				
				<p><a href="<?php echo get_permalink($book_id[0]); ?>">Buy the recommended book</a> 
				</p>
				</li>
				<?php endif ?>

				<?php if (get_field('text', $GLOBALS['current_cqelourse_obj'])): ?>
				<li><span class="dashicons dashicons-awards"></span>
				<p><?php the_field('text', $GLOBALS['current_course_obj']); ?></p>
				</li>
				<?php endif ?>
				<?php if (get_field('forum', $GLOBALS['current_course_obj'])): ?>
				<li><span class="dashicons dashicons-admin-comments"></span>
				<p><a href="<?php the_field('forum', $GLOBALS['current_course_obj']); ?>">Discuss this</a>
				</p></li>
				<?php endif ?>
				
			</ul>


