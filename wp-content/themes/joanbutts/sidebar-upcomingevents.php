				<div id="sidebar-ue" class="sidebarue fourcol first clearfix sidebar-layout" role="complementary">

					<?php if ( is_active_sidebar( 'upcomingevents' ) ) : ?>

						<?php dynamic_sidebar( 'upcomingevents' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->

						
					<?php endif; ?>

				</div>