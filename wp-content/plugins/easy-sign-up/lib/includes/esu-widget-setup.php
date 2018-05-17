<?php
	
		/* Widget settings. */
		$widget_ops = array( 
			'classname' => 'easysignup', 
			'description' => __('A widget that displays the Easy Sign Up form.') );

		/* Widget control settings. */
		$control_ops = array('id_base' => 'easysignup-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'easysignup-widget','Easy Sign Up', $widget_ops, $control_ops );
