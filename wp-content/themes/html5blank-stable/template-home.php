<?php /* Template Name: Home Page Template */ get_header(); ?>

	<main role="main">

		<a type="button" class="fixed-hint button pop-up-button">Get Weekly Classroom Hints</a>

		<div class="container-fluid banner-wrap">

			<div class="row banner-row">

				<div class="col-xs-12 banner">

					<div class="wrap">

<!-- 					<?php 

						$image = get_field('main_banner');
						$image_object = get_field('main_banner');
						$image_size = 'medium';
						$image_url = $image_object['sizes'][$image_size];

						?> -->
<!-- 
						<div class="main-banner-pic">

							<img src="<?php echo $image_url; ?>" alt="<?php echo $image['alt']; ?>" /> 

						</div> -->

						<img class="main-banner-pic" src="<?php echo get_template_directory_uri(); ?>/img/main-banner.png">

						<div class="banner-text">

							<h2>Teachers,<br>Are You Tired of Struggling<br>in the Classroom?</h2>

							<h4>Get dozens of hints, tips, ideas, and real-world solutions so you can feel better and enjoy teaching more.</h4>

							<a type="button" class="button pop-up-button">Get Started Now</a>

						</div>

					</div>

				</div>

			</div>

		</div>
		

		<div class="hint">

			<div class="wrap">

					<div class="container-fluid hint-wrap">

					<div class="row hint-row">

						<div class="col-xs-12 hint-content">

								<a class="pop-up-button">Educators: Get Free Weekly Classroom Management Hints and Tips</a>

						</div>

					</div>

				</div>

			</div>
		
		</div>


		<div class="take-action">
			<div class="wrap">
				<h2>Articles For Educators</h2>

			<div class="container-fluid menu2-wrap">

				<div class="row menu2">

					<div class="col-sm-6 col-md-3 menu2-item" id="subs">
						<a class="block" target="_blank" href="http://awesometeachernation.com/category/substitutes/">
						<!-- <h3>Substitutes</h3> -->
						<img src="<?php echo get_template_directory_uri(); ?>/img/icons/subs_icon.png" alt="substitutes-icon">
						<!-- <span class="description">Lorem ipsum dolor sit amet,<br>consectetur adipiscing elit</span> -->
						</a>
					</div>

					<div class="col-sm-6 col-md-3 menu2-item" id="newteach">
						<a class="block" target="_blank" href="http://awesometeachernation.com/category/new-teachers/">
						<!-- <h3>New Teachers</h3> -->
						<img src="<?php echo get_template_directory_uri(); ?>/img/icons/new_teach_icon.png" alt="new-teacher-icon">
						<!-- <span class="description">Lorem ipsum dolor sit amet,<br>consectetur adipiscing elit</span> -->
						</a>
					</div>

					<div class="col-sm-6 col-md-3 menu2-item" id="teachers">
						<a class="block" target="_blank" href="http://awesometeachernation.com/category/all-educators/">
						<!-- <h3>Teachers</h3> -->
						<img src="<?php echo get_template_directory_uri(); ?>/img/icons/teachers_icon.png" alt="teachers-icon">
						<!-- <span class="description">Lorem ipsum dolor sit amet,<br>consectetur adipiscing elit</span> -->
						</a>
					</div>				

					<div class="col-sm-6 col-md-3 menu2-item" id="admins">
						<a class="block" target="_blank" href="http://awesometeachernation.com/category/administrators/">
						<!-- <h3>Administrators</h3> -->
						<img src="<?php echo get_template_directory_uri(); ?>/img/icons/admins_icon.png" alt="administrators-icon">
						<!-- <span class="description">Lorem ipsum dolor sit amet,<br>consectetur adipiscing elit</span> -->
						</a>
					</div>
				</div>
			</div>		
			</div>
		</div>

		<div class="container-fluid speaker-wrap">

			<div class="row speaker-row">

				<div class="col-xs-12 speaker">

					<div class="wrap">

<!-- 					<?php 

						$image = get_field('speaker_banner');
						$image_object = get_field('speaker_banner');
						$image_size = 'medium';
						$image_url = $image_object['sizes'][$image_size];

						?>

						<div class="speaker-banner-pic">

							<img src="<?php echo $image_url; ?>" alt="<?php echo $image['alt']; ?>" /> 

						</div> -->

						<img class="speaker-banner-pic" src="<?php echo get_template_directory_uri(); ?>/img/speaker-banner.png">


						<div class="speaker-text">

							<h2>Looking for a High-Value Inspirational<br>Speaker For Your Event?</h2>

							<h4>Katrina provides a variety of keynotes, breakout sessions, and professional development days for schools, districts, and educational conferences all over the United States and Canada.</h4>

							<a class="button" href="<?php the_permalink(458);?>">Learn More</a>

						</div>

					</div>

				</div>

			</div>

		</div>


		<div class="post-wrap">	

			<div class="post-area">	

				<h2>Top Blog Posts</h2>

			<?php if( have_rows('blog', 1708) ): ?>
					<?php while( have_rows('blog', 1708) ): the_row(); ?>

							<div class="blog-content">
								
								<h3 class="blog-item" id="blog-title"><?php the_sub_field('blog_title', 1708); ?></h3>	
	 
	    		    			<p class="blog-item" id="blog_excerpt"><?php the_sub_field('blog_excerpt', 1708); ?></p>
	    		    			
	    		    			<a class="blog-item" id="blog-link" target="_blank" href="<?php the_sub_field('blog_link', 1708); ?>">
		    		    			<?php the_sub_field('blog_link_name', 1708); ?>
		    		    		</a>

		    		    	</div>
		    		    					    		    		
					<?php endwhile; ?>
			<?php endif; ?>

				<p><a class="button" target="_blank" href="http://www.awesometeachernation.com/">View All Posts</a></p>
			
			</div>	

		</div>




<!-- 				<?php

					// The Query
					$the_query = new WP_Query( array('post_type' => 'post')  );

						// The Loop
						if ( $the_query->have_posts() ) :
							while ( $the_query->have_posts() ) : $the_query->the_post(); 
				?>
								<div>
									<h3><?php the_title(); ?></h3>
									<p><?php the_excerpt(); ?></p>
								</div>								
				<?php endwhile;
						
						/* Restore original Post Data */
						wp_reset_postdata();
						endif;

				?> -->

		
		<?php get_sidebar(); ?>

		<div class="row"></div>

		<div class="connect" id="connect">

			<div class="wrap">

					<h2>Connect With Me</h2>

				<div class="container-fluid contact-tiles-wrap">

					<div class="row contact-tiles">

						<div class="col-md-4 contact-item" id="call-tile">

<!-- 							<a class="block menu-3-block" href="<?php the_permalink(1571);?>"> -->
								<h3>Call Me</h3>
								<img src="<?php echo get_template_directory_uri(); ?>/img/icons/call_me_icon.png" alt="call-me-icon">
								<!-- <span class="description">Lorem ipsum dolor sit amet,<br>consectetur adipiscing elit</span> -->
<!-- 							</a>				
 -->
						</div>

						<div class="col-md-4 contact-item" id="hire-tile">

							<a class="block menu-3-block speaker-pop-up-button" >
								<h3>Hire Me</h3>
								<img src="<?php echo get_template_directory_uri(); ?>/img/icons/hire_me_icon.png" alt="hire-me-icon">
								<!-- <span class="description">Lorem ipsum dolor sit amet,<br>consectetur adipiscing elit</span> -->
							</a>	

						</div>

						<div class="col-md-4 contact-item" id="email-tile">

							<a class="block menu-3-block" href="<?php the_permalink(1571);?>">
								<h3>Email Me</h3>
								<img src="<?php echo get_template_directory_uri(); ?>/img/icons/email_me_icon.png" alt="email-me-icon">
								<!-- <span class="description">Lorem ipsum dolor sit amet,<br>consectetur adipiscing elit</span> -->
							</a>

						</div>				

					</div>	

				</div>

			</div>

		</div>

		<div class="hint">

			<div class="wrap">

					<div class="container-fluid hint-wrap">

					<div class="row hint-row">

						<div class="col-xs-12 hint-content">

								<a class="pop-up-button">Educators: Get Free Weekly Classroom Management Hints and Tips</a>

						</div>

					</div>

				</div>

			</div>
		</div>

		<div class="pop-up-wrap">

			<div class="pop-up overlay">

				<a type="button" class="pop-up-button" id="pop-up-close" onclick="">x</a>

				<div class="pop-up-pic">
					<img src="<?php echo get_template_directory_uri(); ?>/img/popup-banner.png" alt="pop-up-pic" class="pop-up-img">
				</div>

				<div class="pop-up-text">

					<h3>Gain Instant Access to the<br>Awesome Teacher Nation Resources Library</h3>

					<h4>With Solutions for:</h4>
						<ul style="list-style-type:none; padding: 0;">
							<h4>New Teachers &#8226; School Administrators &#8226; Classroom Teachers</h4>
							<h4>Specialists &#8226; Substitute Teachers &#8226; And More</h4>
						</ul>
					<h4>Bonus: You will also receive 5 of our top classroom management articles and a weekly classroom management hint.</h4>

				</div>

				<div class="pop-up-form">

					<!-- Begin MailChimp Signup Form -->
					<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
					<style type="text/css">
						#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
						/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
						   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
					</style>
					<div id="mc_embed_signup">
					<form action="//AwesomeTeacherNation.us8.list-manage.com/subscribe/post?u=91aa4bb0cf639d7ac038353c8&amp;id=7d09009d11" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					    <div id="mc_embed_signup_scroll">
						<!-- <h2>Subscribe to our mailing list</h2> -->
					<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
					<div class="mc-field-group">
						<label for="mce-NAME">Name </label>
						<input type="text" value="" name="NAME" class="mc-input" id="mce-NAME">
					</div>
					<div class="mc-field-group">
						<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
					</label>
						<input type="email" value="" name="EMAIL" class="required email mc-input" id="mce-EMAIL">
					</div>
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_91aa4bb0cf639d7ac038353c8_7d09009d11" tabindex="-1" value=""></div>
					    <div class="clear"><input type="submit" value="Gain Access Now" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
					    </div>
					</form>
					</div>
					<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='NAME';ftypes[1]='text';fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
					<!--End mc_embed_signup-->


				</div>

			</div>

		</div>

		<div class="speaker-pop-up-wrap">	

			<div class="speaker-pop-up overlay">

				<a type="button" class="speaker-pop-up-button" id="speaker-pop-up-close" onclick="">x</a>
			
				<div class="speaker-pop-up-pic">
					<img src="<?php echo get_template_directory_uri(); ?>/img/speaker_popup_banner.jpg" alt="speaker-pop-up-pic" class="pop-up-img">
				</div>

				<div class="speaker-pop-up-text">

					<h2>Let’s Talk About Your Next Event</h2>

					<p>I look forward to creating the perfect speech or training for your group. Please let me know what you need, and I will respond within one business day.</p>

				</div>

				<div class="speaker-pop-up-form">

					<?php echo do_shortcode('[contact-form-7 id="1785" title="Speaker Form"]') ?>

				</div>

			</div>

		</div>
	

	</main>

	<script>
	// console.log('home script start');
	$(document).ready( function(){
		// console.log('document ready');
		$('#menu-item-1914 a').attr('href','#connect');
	})

	</script>

<?php get_footer(); ?>
