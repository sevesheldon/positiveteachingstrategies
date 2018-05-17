<?php
// 
//  esu-admin-class.php
//  easy-sign-up
//  
//  Created by Rew Rixom on 2011-03-29.
// 

if (!class_exists("EsuForms")) {
	class EsuForms 
	{
		
		function EsuForms() //__construct()
		{
			if (!class_exists("EsuStyle")) // Removing the Short Code if the Styles Extra is Loaded
			{
			  add_shortcode('easy_sign_up', array($this,'esu_form_func'));
			  // [easy_sign_up title="value" form_id="value"]
		  }
			if(!is_admin())	//load the css
				add_action('init', array($this,'esu_validation_extras'));
			  #$this->esu_validation_extras();		// css and js
		}	
		
		function esu_form_func($atts)
		{
			// [easy_sign_up title="value" form_id="value"]			
			extract(shortcode_atts(array('title' => false,'form_id' => 'esu'), $atts));
			$esu_return = $this->esu_form_html($form_id,$title);
			return $esu_return;
	  }
		
		function esu_form_html($form_id='esu',$title=false)
		{
			$plugin_url = ESU_URL;
			$esu_return= '
				<form id="'.$form_id.'" name="'.$form_id.'" method="post" action="'.$plugin_url.'easy_sign_up_process.php" onsubmit="javascript:return esu_validate(\''.$form_id.'\',\''.$form_id.'_email\',\''.$form_id.'_name\',\''.$form_id.'nameError\',\''.$form_id.'emailError\');">

					<table class="esu-form-table">	';
							if(trim($title) !== false )	:
							$esu_return .='
								<tr>
								  <th colspan="2">'.$title.'</th>
								</tr>';
							endif;
						$esu_return .= 			
							'
              <tr>
                <td colspan="2">
                <div class="easy-sign-up-err" id="'.$form_id.'nameError"></div>
      					<div class="easy-sign-up-err" id="'.$form_id.'emailError"></div>
                </td>
              </tr>
							<tr>
							  <td><label for="'.$form_id.'_name">'.__('Name').' <em>*</em></label></td>
							  <td>
							  	<input type="text" name="'.$form_id.'_name" id="'.$form_id.'_name" accesskey="n" tabindex="1" class="required text-input" />
							  </td>
							</tr>
							<tr>
							  <td><label for="'.$form_id.'_email">'.__('Email').' <em>*</em></label></td>
							  <td>
							  	<input type="text" name="'.$form_id.'_email" id="'.$form_id.'_email" accesskey="e" tabindex="2" class="required email text-input" />
							  </td>
							</tr>
							<tr>
								<td colspan="2" class="easy-sign-up-submit">
								<input name="sub" class="esu_send_bnt" type="submit" id="'.$form_id.'_sub" accesskey="s" tabindex="3" value="'.__('Send').'" />
								<span class="esu-required-text"> * Required</span>
								</td>
							</tr>
					</table>
				</form>';
				return $esu_return;
		}
	
		function esu_validation_extras() 
		{
			$esu_style_url 				= ESU_URL. 'css/esu-styles.css';
			$esu_js_url 	 				= ESU_URL. 'js/esu-validate.js';
			
			if (!class_exists("EsuStyle"))
			{
			  wp_register_style('esu_style_url', $esu_style_url,false, ESU_VERSION,'all');
		    wp_enqueue_style( 'esu_style_url');
			}
			
			wp_enqueue_script('esu_js_url',$esu_js_url,false, ESU_VERSION );
			
		} //end esu_validation_stylesheet
		
	}
}