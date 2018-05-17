<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-positive.png" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- <link href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css" rel="stylesheet"> -->


		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">


		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom.css">


	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">

					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<img src="<?php echo get_template_directory_uri(); ?>/img/pts_logo.png" alt="Logo" class="logo-img">
						</a>
					</div>
					<!-- /logo -->

					<div id="menu">	

					<!-- burger code -->
				  	    <div id="burger">
							<div id="burger1"></div>
							<div id="burger2"></div>
							<div id="burger3"></div>
						</div>

						<!-- nav -->
						<nav class="nav" role="navigation">
							<?php html5blank_nav(); ?>

							
							<div class="socials" id="socials-header">
								<a target="_blank" href="https://www.facebook.com/PositiveTeachingStrategies/">
									<img src="<?php echo get_template_directory_uri(); ?>/img/icons/Facebook.png" alt="facebook" class="social-icon">
								</a>
								<a target="_blank" href="https://www.linkedin.com/in/katrina-ayres-6268024">
									<img src="<?php echo get_template_directory_uri(); ?>/img/icons/Linkedin.png" alt="linkedin" class="social-icon">
								</a>
								<a target="_blank" href="https://www.pinterest.com/AyresKat/">
									<img src="<?php echo get_template_directory_uri(); ?>/img/icons/Pinterest.png" alt="pinterest" class="social-icon">
								</a>
							</div>

						</nav>
						<!-- /nav -->

					</div>	

			</header>
			<!-- /header -->
