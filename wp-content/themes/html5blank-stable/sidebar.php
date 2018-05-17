<!-- sidebar -->
<aside class="sidebar" role="complementary">

			<a href="<?php the_permalink(361);?>">

            	<h4 class="sidebar-title">Upcoming Classes & Seminars</h4>

			</a>

					<?php if( have_rows('upcoming_events', 361) ): ?>
							<?php while( have_rows('upcoming_events', 361) ): the_row(); ?>

									<div class="classes-events">
										
										<a class="classes-item" id="classes-name" target="_blank" href="<?php the_sub_field('link'); ?>">
			    		    			
			    		    				<h3><?php the_sub_field('name_of_event', 361); ?></h3>	
			    		    			
			    		    			</a>
			    		    			
			    		    			<h4 class="classes-item" id="classes-date"><?php the_sub_field('date', 361); ?></h4>
			    		    			
			    		    			<h4 class="classes-item" id="classes-time"><?php the_sub_field('time', 361); ?></h4>
			    		    			
			    		    			<h5 class="classes-item" id="classes-location"><?php the_sub_field('location', 361); ?></h5>
			    		    			
			    		    			<a class="classes-item" id="classes-link" href="<?php the_sub_field('link', 361); ?>">
				    		    			<?php the_sub_field('link_label', 361); ?>
				    		    		</a>

				    		    		<div></div>

			    		    			<a class="classes-item" id="classes-file" target="_blank" href="<?php the_sub_field('file', 361); ?>">
				    		    			<?php the_sub_field('file_label', 361); ?>
				    		    		</a>

			    		    			<a class="classes-item" id="classes-file" target="_blank" href="<?php the_sub_field('link_2', 361); ?>">
				    		    			<?php the_sub_field('link_label_2', 361); ?>
				    		    		</a>

				    		    	</div>
				    		    					    		    		
							<?php endwhile; ?>
					<?php endif; ?>

<!-- 	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
	</div> -->

</aside>
<!-- /sidebar -->
