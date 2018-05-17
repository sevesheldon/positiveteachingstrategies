<?php
/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'esu_load_widgets' );

/**
 * Register our widget.
 * 'Example_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function esu_load_widgets() {
	register_widget( 'EsuWidget_Widget' );
}

/**
 * Easy sign up Widget  class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class EsuWidget_Widget extends WP_Widget {

/**	
 * 	
 * 	Widget setup
 */	
	function EsuWidget_Widget() {
    include ESU_PATH.'lib/includes/esu-widget-setup.php';
  }

/**
 * 
 * How to display the widget on the screen.
 */ 
	function widget( $args, $instance ) {
		global $plugin_loc;
		global $esu_forms;
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
			
		$form_id      ='w_esu_widget';
		$esu_email    ='esu_email';
		$esu_name     ='esu_name';
		
		/* The Display the form */
		$the_form = '
			<form id="'.$form_id.'" name="w_esu" method="post" action="'.$plugin_loc.'easy_sign_up_process.php" 
			  onsubmit="javascript:return esu_validate(\'w_esu_widget\',\'w_esu_email\',\'w_esu_name\',null,null);">
		   <div>
		   <label for="w_esu_name">'.__('Name').'<em>*</em></label>
		   <input type="text" name="'.$esu_name.'" id="w_esu_name" class="required text-input" />
		   <br style="clear:both;float:none;" />
		   </div>
		   <div>		   
		   <label for="w_esu_email">'.__('Email').'<em>*</em></label>
		   <input type="text" name="'.$esu_email.'" id="w_esu_email" class="required email text-input" />
		   <br style="clear:both;float:none;" />
		   </div>
       <div>
		     <input name="w_sub"  class="esu_send_bnt" type="submit" accesskey="s" tabindex="3" value="'.__('send').'" />
       </div>
			</form>
		';
		echo $the_form;
		
		/* After widget (defined by themes). */
		echo $after_widget;
	}

/** 
 * 	
 * 	Update the widget settings.
 */	
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {
		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Easy Sign Up') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

	<?php
	}

}