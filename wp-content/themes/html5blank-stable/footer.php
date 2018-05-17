			<!-- footer -->
			<footer class="footer" role="contentinfo">

					<!-- nav -->
					<nav class="footer-nav" id="footer-nav" role="navigation">
						<?php html5blank_nav(); ?>
					</nav>
					<!-- /nav -->

					<div class="top">
						<a href="#">Back To Top</a>

					</div>

					<div class="socials" id="socials-footer">
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


				<!-- copyright -->
				<p class="copyright">
					&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?><!-- . <?php _e('Powered by', 'html5blank'); ?>
					<a href="//wordpress.org" title="WordPress">WordPress</a> &amp; <a href="//html5blank.com" title="HTML5 Blank">HTML5 Blank</a>. -->
				</p>
				<!-- /copyright -->

			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
