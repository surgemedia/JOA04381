			
			<div class="push"></div>
		</div> <!-- end #container -->
		
		<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap clearfix">
					<div class="twelvecol first">
								<div class="fourcol first footer-col">
									<img src="<?php bloginfo('template_directory'); ?>/library/images/footer-deck-cards.png">
								</div>
								<div class="fivecol footer-left-margin footer-margin">
									<div id="footer-social">
										<ul>
											<li><a class="social-media-icon-youtube" title="Follow on YouTube" href="http://www.youtube.com/channel/UCtXsxzMcvnMgz0rOxVLrwhA">YouTube</a></li>
							<li><a class="social-media-icon-facebook" title="Like on Facebook" href="http://www.facebook.com/joanbuttsbridgeteacher">Facebook</a></li>
							<li><a class="social-media-icon-twitter" title="Follow on Twitter" href="https://twitter.com/joanbuttsbridge">Twitter</a></li>
										</ul>
									</div>
									<h2>Contact Joan</h2>
									<p><span class="light-blue">E</span> <a href="mailto:joan@joanbuttsbridge.com">joan@joanbuttsbridge.com</a></p>
									<p><span class="light-blue">P</span> <a href="tel:0413772650">0413 772 650</a></p>
									<p><a class="big-pink-button inline" href="#inline_content">Sign up for my newsletter ></a></p>
									<span id="footer-tag">Website design <a href="http://www.marginmedia.com.au">Margin Media</a></span>
									<!-- This contains the hidden content for inline calls -->
									<div style="display:none">
										<div id="inline_content" style="padding:10px; background:#fff;">
											<form action="http://marginmediadigital.createsend.com/t/j/s/hkkiuj/" method="post" id="subForm">
												<table cellspacing="0" cellpadding="4" border="0">
													<tr valign="top">
														<td colspan="2" style="text-align:center;"><h2>Newsletter Signup</h2></td>
													</tr>
													<tr valign="top">
														<td align="right"><label for="name">Name:</label></td>
														<td><input type="text" name="cm-name" id="name" size="20" /></td>
													</tr>
													<tr valign="top">
														<td align="right"><label for="hkkiuj-hkkiuj">Email address:</label></td>
														<td><input type="text" name="cm-hkkiuj-hkkiuj" id="hkkiuj-hkkiuj" size="20" /></td>
													</tr>
													<tr valign="top">
														<td></td>
														<td><input class="button popup-button" type="submit" value="Subscribe" /></td>
													</tr>
												</table>
											</form>
										</div>
									</div>
								</div>
								<?PHP /* ?>
								<div class="threecol">
									<div id="card-deck">
										<div class="card-deck-card card-deck-one">
											<a href="/learn/">
												<h3>Bridge Lessons</h3>
												<img src="<?php bloginfo('template_directory'); ?>/library/images/footer-bridgelessons.jpg">
											</a>
										</div>
										<div class="card-deck-card card-deck-two">
											<a href="/holidays/">
												<h3>Bridge Holidays</h3>
												<img src="<?php bloginfo('template_directory'); ?>/library/images/home-holidays-footer.jpg">
											</a>
										</div>
										<div class="card-deck-card card-deck-three">
											<a href="/events/">
												<h3>Upcoming Events</h3>
												<img src="<?php bloginfo('template_directory'); ?>/library/images/footer-events.jpg">
											</a>
										</div>
										<div class="card-deck-card card-deck-four">
											<a href="/play-bridge-online/">
												<h3>Play Bridge<br>Online</h3>
												<img src="<?php bloginfo('template_directory'); ?>/library/images/play-bridge-online-footer.jpg">
											</a>
										</div>
									</div>
								<?PHP */ ?>
									<!--<img src="<?php bloginfo('template_directory'); ?>/library/images/footer-nav-temp.png">-->
								</div>
							</div>
					<nav role="navigation">
							<?php jbb_footer_links(); ?>
									</nav>

					<!--<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>-->

				</div> <!-- end #inner-footer -->

			</footer> <!-- end footer -->
			
		<!-- all js scripts are loaded in library/jbb.php -->
		<script>
			jQuery(".card-deck-card").hover(function(){
			 jQuery(this).stop().animate({"bottom" : "55px"});
			}, function(){
			 jQuery(this).stop().animate({"bottom": "0"});
			});


			jQuery("input#signup_username").on({
  				keydown: function(e) {
    			if (e.which === 32)
      			return false;
  			},
 			 change: function() {
    		this.value = this.value.replace(/\s/g, "");
  				}
			});
		</script>
				
		<?php wp_footer(); ?>

	</body>

</html> <!-- end page. what a ride! -->