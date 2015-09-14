<!doctype html>



	<head>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<!-- mobile meta (hooray!) -->
		<!--<meta name="HandheldFriendly" content="True">-->
		<!--<meta name="MobileOptimized" content="320">-->
		<!--<meta name="viewport" content="width=device-width, initial-scale=1.0"/>-->

		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

		<!-- <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Bitter|Rokkitt|Bree+Serif|Slabo+27px' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>	
		<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-includes/css/dashicons.min.css">
		<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/jquery.colorbox.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery(".inline").colorbox({inline:true, width:"400px"});
			});
		</script>


<!-- <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41370475-1', 'joanbuttsbridge.com');
  ga('send', 'pageview');

</script> -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-15058517-1', 'auto');
  ga('send', 'pageview');

</script>


		<!-- end of wordpress head -->
                <script src="http://bridge2go.com/Live/JavaScripts/HandDisplay/HandDisplay.js"></script>
	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">
				<div id="header-bg-icon">
				<div id="inner-header" class="wrap clearfix">
					<div class="logo-bar">
					<!-- to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> -->
					<a id="topbar-logo" href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php bloginfo('template_directory'); ?>/library/images/joan-butts-logo.png"></a>
					<?php /* ?>
					<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
						<div><input type="text" size="put_a_size_here" name="s" id="s" value="Search" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
						<input type="submit" id="searchsubmit" value="" class="btn searchbtn" />
						</div>
					</form>
				<?php */ ?>
					<?php  if ( is_user_logged_in() ) {  ?>
					<?php 
					$user = wp_get_current_user();
					$user_id = bp_loggedin_user_id();
					$avatarurl = bp_core_fetch_avatar( array( 'item_id' => $user_id,'type'     => 'full', ) );
					 ?>
						<div id="header-user" class="col-lg-3">
						<?php  if (get_user_role()=='royal') {  ?>
								<i></i>
						<?php } ?>

						
							<div class="display-img col-lg-4">
							<?php echo $avatarurl; ?></div>
							<div class="current_info col-lg-8">
							<?php  ?>
								<h2><a href="<?php echo site_url().'/members/'.$user->user_login; ?>"> <?php echo $user->display_name; ?></h2></a>
							<a><?php  echo getSkillLevel(); ?></a>
							</div>
						</div>
					<?php } else { ?>
					<div id="header-user" class="col-lg-4 pull-right">
					<a class="button pull-right" data-toggle="modal" data-target="#mylogin" >Login <i class="dashicons dashicons-awards"></i></a>
					<a class="button pull-right pink" href="/register">Sign Up<i class="dashicons dashicons-awards"></i></a>
					</div>
					<?php } ?>
					</div>
				<div class="modal fade" id="mylogin" tabindex="-1" role="dialog" aria-labelledby="myLoginpopup">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Login</h4>
                                </div>
                                <div class="modal-body">
                                   <?php echo do_shortcode('[theme-my-login]'); ?>
                                </div>
                             
                            </div>
                        </div>
                    </div>



					<nav role="navigation">
						<?php jbb_main_nav(); ?>
					</nav>

				</div> <!-- end #inner-header -->
				</div>
			</header> <!-- end header -->