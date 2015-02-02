				<div id="sidebar1" class="sidebar fourcol first clearfix sidebar-layout" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->

						<div class="alert alert-help">
							<p><?php _e("Please activate some Widgets.", "jbbtheme");  ?></p>
						</div>

					<?php endif; ?>

				</div>