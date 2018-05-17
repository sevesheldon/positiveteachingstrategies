<?php /* Template Name: Books Template */ get_header(); ?>

	<main role="main">
		
		<!-- section -->
		<section class="page-wrap">
		
			<div class="page-content-wrap" id="books-page-content-wrap">	
		
				<div class="page-title" id="books-page-title">
		
					<h1><?php the_title(); ?></h1>
		
				</div>
					
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="page-content" id="books-page-content">
		
						<?php the_content(); ?>
		
					</div>

					<br class="clear">

				</article>
				<!-- /article -->

			<?php endwhile; ?>

			<?php endif; ?>


				<div class="books-container">	
	
					<?php if( have_rows('books') ): ?>
							<?php while( have_rows('books') ): the_row(); 
									$image_object = get_sub_field('image');
									$image_size = 'thumbnail';
									$image_url = $image_object['sizes'][$image_size];
									?>

									<div class="books-content">
										<a target="_blank" href="<?php the_sub_field('buy_now_link'); ?>">
			    		    				<img src="<?php echo $image_url; ?>" />
			    		    			</a>
			    		    			<a target="_blank" href="<?php the_sub_field('buy_now_link'); ?>">
			    		    				<h3><?php the_sub_field('title'); ?></h3>
			    		    			</a>
			    		    			<p><?php the_sub_field('description'); ?></p>
			    		    			<a target="_blank" type="button" class="buy-now-button" id="" href="<?php the_sub_field('buy_now_link'); ?>">
				    		    			<?php the_sub_field('buy_now'); ?>
				    		    		</a>
				    		    	</div>
			    		    		
							<?php endwhile; ?>
					<?php endif; ?>
				</div>	
				
				</div>







		<?php get_sidebar(); ?>


		</section>
		<!-- /section -->
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
	
	</main>

<?php get_footer(); ?>





