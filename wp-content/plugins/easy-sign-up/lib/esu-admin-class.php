<?php
// 
//  esu-admin-class.php
//  easy-sign-up
//  
//  Created by Rew Rixom on 2011-03-29.
// 

if (!class_exists("EsuAdmin")) {
	class EsuAdmin
	{
		
		function EsuAdmin() //__construct()
		{
			add_action('admin_init', array( $this,'esu_admin_init'    ) );
			add_action('admin_menu',  array( $this,'esu_add_pages'    ) );
		}
		
		//register esu stylesheet
		function esu_admin_init() 
		{
			if(!isset($_GET['page'])) return;
			$page  = $_GET['page'];
			$esu_page = explode("_", $page);
			if( $esu_page[0] == "esu" )
			{
				wp_register_style( 'esuStylesheet', ESU_URL . 'css/stylesheet.css', false, ESU_VERSION,'all' );
				wp_enqueue_style( 'esuStylesheet' );
			}
		}
		
		//add menu to admin page
		function esu_add_pages()
		{
			add_menu_page(
				ESU_NAME." &rsaquo; ".__('Options Page'), 
				ESU_NAME, 'administrator', 
				'esu_options_pg', 
				array( $this,'esu_options_pg'  ),
				( ESU_URL.'images/icon.png' ) 
			);
			
		} //End easy_sign_up_add_pages()
		
		//create the options page
		function esu_options_pg()
		{
			//options saved message
			$this->esu_options_saved_message();
			$this->esu_options_pg_html();
		}
		
		function esu_options_saved_message($value='easy_sign_up_saved')
		{
			//options saved message
		
		if (isset($_REQUEST['action']) && $value == $_REQUEST['action'] ) echo '<div id="message" class="updated fade"><p><strong>'.__('Settings saved.').'</strong></p></div>';
		}
		
		//this is the html for the esu options page
		function esu_options_pg_html()
		{ 
			$e_options = $this->esu_options_array();
			// save plugin's options
			
			if ( isset($_REQUEST['action']) &&  'easy_sign_up_saved' == $_REQUEST['action'] ) {
					foreach ($e_options as $value) {
						update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
					}

					foreach ($e_options as $value) {
						if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
			}
			?>
				<div class="wrap"> 
						<?php /* if ( function_exists('screen_icon') ) screen_icon(); // don't need this but I felt that I should leave it in */ ?>
						<h2 id="easy_sign_up_header"><?php  echo(ESU_NAME);_e(" Options"); ?></h2>
						<?php /*START THE FORM WRAPPING DIV*/ ?>
						<div class="metabox-holder  css-f-l ui-2-3">
						<div class="postbox left">
						<form method="post" action="">
							<table class="form-table" id="easy_sign_up_form_table">
									<?php 
									foreach ($e_options as $value) {

										switch ( $value['type'] ) {
											case 'text':
											?>
											<tr valign="top"> 
												<th scope="row"><label for="<?php echo $value['id']; ?>"><?php _e($value['name']); ?></label></th>
												<td>
									        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="widefat"
														type="<?php echo $value['type']; ?>" 
														value="<?php 
															if ( get_option( $value['id'] ) != "") { 
																echo get_option( $value['id'] ); 
															} else { 
																echo $value['std']; 
															} ?>" maxlength="<?php echo $value['maxlength']; ?>" size="<?php echo $value['size']; ?>" />
													<?php _e($value['desc']); ?>
												</td>
											</tr>
											<?php
											break;

											case 'textarea':
											if(isset($_REQUEST['options']))	$ta_options = $value['options'];
											?>
											<tr valign="top"> 
												<th scope="row"><label for="<?php echo $value['id']; ?>"><?php _e($value['name']); ?></label></th>
												<td>
													<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" 
														class="widefat" 
														cols="<?php echo $value['cols']; ?>" 
														rows="<?php echo $value['rows']; ?>"><?php 
													if( get_option($value['id']) != "") {
															_e(stripslashes(get_option($value['id'])));
														}else{
															_e($value['std']);
													}?></textarea>
													<br />
													<?php _e($value['desc']); ?>
												</td>
											</tr>
											<?php
											break;

											case 'nothing':
											$ta_options = $value['options'];
											?>
											</table>
												<?php _e($value['desc']); ?>
											<table class="form-table">
											<?php
											break;

											default:

											break;
										}
									}
									?>
						      <tr valign="top">
								  <th scope="row">&nbsp;</th>
								  <td>
						            <p class="submit">
						                <input type="hidden" name="action" value="easy_sign_up_saved" />
						                <input class="button-primary" name="save" type="submit" value="<?php _e('Save Your Changes'); ?>" />    
						            </p>
						          </td>
							  </tr>
							</table>
						</form>
						</div>
						
						    <?php /* Making Use of Box */; ?>
  							<div id="easy-help" class='postbox'>
  								<h3 style="cursor: default;"><?php _e('Making Use of') ?> <?=ESU_NAME;?></h3>
  								<div style="padding:4px">
  							    <?php 
  										$making_use_of_txt =	__('<a name="easy_help"></a> <ul> 
  							  		<li>Use the following short code in your pages and posts: <code>[easy_sign_up title="Put in your own title here"]</code> <br /> 
  							  		The title\'s value is optional if you don\'t want a title just add the short code without it, e.g.: <code>[easy_sign_up]</code></li>
  							  		<li>If you would like to include the name person who signed up in the Thank You Email just paste: <code>#fullname#</code> into the Thank You Email text field where you\'d like to see it.</li>
  							  		</ul> ');
  				               echo $making_use_of_txt;
  				          ?>
  								</div>
  							</div>
						  <?php /* END OF Making Use of Box */; ?>
						</div> <?php /*END THE FORM WRAPPING DIV*/ ?>

						<div id="poststuff" class="meta-box-sortables ui-sortable css-f-l ui-1-3">
							<?php if (method_exists(	$this,'esu_pro'	 	 				 ))  { $this->esu_pro(); 	 				 } ?>
							<?php if (method_exists(	$this,'esu_donate'	 			 ))  { $this->esu_donate(); 	 		 } ?>
							<?php if (method_exists(	$this,'esu_about'  				 ))  { $this->esu_about(); 				 } ?>
							<?php if (method_exists(	$this,'esu_widget_advert'  ))  { $this->esu_widget_advert(); } ?>
						</div>
            <br style="float:none;clear:both;">
				</div>
				<!-- END WRAP -->
    <?php
		}
		//add admin page options array

    //This function is called by the upload extra esu-zeup.php
    function esu_add_upgrade_page()
    {
        add_submenu_page( 
        "esu_options_pg", "upgrade", 
        "Upgrade Info", 'administrator', 
        'esu_upgrade_pg', 
      	array($this,'esu_upgrade_pg')
      	);
    }
        
    //upgrade info
    //read the dir info
    //if there is no files - default to the info and links
    //if there are zips ignore
    //ignore if the folders don't start with esu
    //read info.esu files
    function esu_upgrade_pg()
    {
      $esu_pg_title = __(" Upgrade Options");
      echo $this->esu_admin_header_html($esu_pg_title);
      echo('<div id="icon-plugins" class="icon32"><br></div>');
      _e("<h2>Your Installed Extras:</h2>");
      
      $esu_load_extras = esu_e_helper();
      if(is_array($esu_load_extras)){
        foreach ($esu_load_extras as $key => $value) :
          $esu_extra_folder = $value['folder'];
          $esu_extra_file_path = $value['file_path'];
          $esu_extra_folder_path = $value['folder_path'];
          include($esu_extra_folder_path.'about.esu');
        endforeach;
      }
      echo('<br class="css-c-f" />');
      
      echo $this->esu_admin_footer_html();
    }

    //admin header html
    function esu_admin_header_html($esu_admin_pg_title='')
    {
      $header_html='
        <div class="wrap"> 
        		<h2 id="easy_sign_up_header">'.ESU_NAME.$esu_admin_pg_title.'</h2>
        		<!-- START THE CONTENT WRAPPING DIV -->
        		<div class="metabox-holder">
      ';
      return $header_html;
    }
    
    //admin footer html
		function esu_admin_footer_html()
    {
      $footer_html='
        		</div> 
        		<!-- END THE CONTENT WRAPPING DIV -->
        </div>
        <!-- END WRAP -->
      ';
      return $footer_html;
	  }
		
		function esu_options_array()
		{
			$e_options = array (
							array(	"name" => __('Notification Email'),
									"desc" => __('<br />Where you want <strong>your</strong> Notification Email sent.<br />Normally your email address.'),
									"size"=> "50",
									"maxlength"=> "70",
									"id" => ESU_S_NAME."_co_email",
									"std" => ESU_DEFAULT_EMAIL,
									"type" => "text"),
									
							array(	"name" => __('Automated Reply Email'),
									"desc" => __('<br />This is the <strong>Reply To</strong> email address the user sees.<br />You may want to set it to your general email address.'),
									"size"=> "50",
									"maxlength"=> "70",
									"id" => ESU_S_NAME."_co_from_email",
									"std" => ESU_DEFAULT_EMAIL,
									"type" => "text"),
									
							array(	"name" => __('Redirection URL'),
									"desc" => __('<br /><strong>Don\'t forget the http://</strong><br />This is the website address that your user will be redirect to once they press the send button.<br />
									You could send them to a thank you page in your website. It does not have to be on your website.'),
									"size"=> "80",
									"maxlength"=> "350",
									"id" => ESU_S_NAME."_url",
									"std" => WP_URL,
									"type" => "text"),
									
							array(	"name" => __('Thank You Email to Client'),
                  "desc" => '<code>#fullname#</code>'.__(' is the placeholder for the name field of the form.<br /> When you customize the text <strong>remember to add it back in if you want to personalize</strong> the confirmation letter.'),
									"id" => ESU_S_NAME."_thank_you_email",
									"std" => __("Hi #fullname# Thank you for visiting our website\nWe hope that you found it informative.\n\nRegards,\n\n".WP_BLOG_NAME),
									"cols"=> "70",
									"rows"=> "12",
									"type" => "textarea"),
			);
			
			return $e_options;
		}
		
	//Admin UI widgets/panels
		function esu_donate()
		{ 
		  if( class_exists( 'EsuStyle' )) return;
			?>
			<!-- DONATE -->
			<div class="postbox" id="easy-donate">
			  <h3 class="hndle"><span><?php _e('Donate $5, $10, $20'); ?></span></h3> 
			  <div class="inside">
			    <ul>
			      <li>This plugin has cost me many hours of work, if you use it, please donate a token of your appreciation!</li> 
			      <li>
			      	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" />
							<input type="hidden" name="cmd" value="_s-xclick" />
							<input type="hidden" name="hosted_button_id" value="EVDZXAPFS243J" />
							<input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/en_US/i/btn/btn_donateCC_LG.gif" 
							border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" />
							<img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/en_US/i/scr/pixel.gif" width="1" height="1" />
							</form>
			      </li> 
			    </ul> 
			  </div> 
			</div> 	
			<!-- END DONATE -->
		<?php 
		}

		function esu_about($css_class='postbox')
		{ 
			?>	
			<!-- ABOUT -->
			<?php $plugname = "Easy Sign Up"; ?>
			<div class="<?php echo $css_class; ?>"> 
			  <h3 class="hndle"><span><?php _e("Do you need help?"); ?></span></h3> 
			  <div class="inside"> 
			    <ul class="css-p-10"> 
			    	<li>
			    	  <?php _e("If you need support or want to suggest improvements to the plugin please visit the "); ?>
			    	  <a href="http://support.beforesite.com">plugin's support forum</a>
						</li>
			    </ul>
			  </div>
			</div> 
			<!-- END ABOUT -->
		<?php 
		} 

		function esu_widget_advert() // has news feed
		{ 
			?>
			<!-- GreenWebPlug -->
			<div id="easy-feed" class="postbox"> 
			  <h3 class="hndle">
			    <?php _e('Latest News') ?> <?=ESU_NAME;?>
				</h3> 
			  <div class="inside"> 
			    <?php 
						//	include 'rss-functions.php';
						include 'rss-function.php';
          ?>
            <ul> 
  			    	<li>
  			    	<strong><?php _e("Like this Plugin?"); ?></strong> 
  			    	You can hire me<br />
  			    	<strong><a href="http://www.greenvilleweb.us/services/?ref=plugin_services" 
  						title="Need WordPress Design? Themes and Plugins">Click Here For a List of Services</a></strong></li>
  			    </ul>
			  </div>
			</div> 
			<!-- END GreenWebPlug -->			
			
		<?php 
		}

		function esu_pro()
		{ 
		  if( class_exists( 'EsuStyle' )) return;
			?>
			<!-- Pro -->
			<?php $plugname = "Easy Sign Up"; ?>
			<div class="postbox" id="easy-pro">
			  <h3 class="hndle"><span><?php _e('New '.$plugname.' Extra Options'); ?></span></h3> 
			  <div class="inside">
				<p><em><?php echo $plugname;?> <?php _e('offers the following add-on apps:'); ?></em></p>
			    <ul>
			      <li><strong>Easy Data</strong><br /><em><?php _e('Stores and manages your easy sign up <br />clients in WordPress.'); ?></em></li> 
			      <li><strong>Easy Styles</strong><br /><em><?php _e('Lets you easy customize the <br />look and feel of the easy sign up forms.'); ?></em></li>
			      <li><strong><a href="http://www.beforesite.com/"><?php _e('More info at'); ?> BeforeSite.com</a></strong></li> 
			    </ul> 
			  </div>
			</div> 	
			<!-- END Pro -->
		<?php 
		}
		// End right col widgets
    
		
	} //End Class EasyAdmin

} //End If Class EasyAdmin

