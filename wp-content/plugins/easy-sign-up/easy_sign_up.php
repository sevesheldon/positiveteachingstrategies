<?php
/*
Plugin Name: Easy Sign Up
Plugin URI: http://www.beforesite.com/plugins/easy-sign-up-features
Description: E-mail Sign Up and Redirection to a url. Possible use is collecting email address for a newsletter, or leads for your sales force before redirecting to a brochure. Use the following short code in your pages and posts <code>[easy_sign_up title="Put in your own title here"]</code> Or add the form via a <a href="widgets.php">Widget</a>. Change the options under Easy Sign Up: <a href="admin.php?page=esu_options_pg">Easy Sign Up</a>
Author: Andrew @ Geeenville Web Design
Version: 2.1.1
Author URI: http://www.beforesite.com
*/
if (!function_exists ('add_action')){
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit();
}

$plugin_loc = plugin_dir_url( __FILE__ );
$plugname = "Easy Sign Up";
$plug_shortname = "easy_sign_up";
$the_web_url = get_bloginfo('url');
$the_blog_name = get_bloginfo('name');
$the_default_email = get_bloginfo('admin_email');


if ( preg_match( '/^https/', $plugin_loc ) && !preg_match( '/^https/', get_bloginfo('url') ) )
	$plugin_loc = preg_replace( '/^https/', 'http', $plugin_loc );
define( 'ESU_FRONT_URL', $plugin_loc );
define( 'DS', DIRECTORY_SEPARATOR ); // I always use this short form in my code.
define( 'ESU_URL',          plugin_dir_url(__FILE__) );
define( 'ESU_PATH',         plugin_dir_path(__FILE__) );
define( 'ESU_BASENAME',     plugin_basename( __FILE__ ) );
define( 'ESU_EXTRAS_PATH',  WP_PLUGIN_DIR.DS."esu-extras".DS );

define( 'ESU_WEB_URL', $the_web_url );
define( 'ESU_NAME', $plugname );
define( 'ESU_S_NAME', $plug_shortname );
define( 'ESU_DEFAULT_EMAIL', $the_default_email );
define( 'ESU_VERSION', '2.0' );
define( 'ESU_PREFIX' , "esu_");
  
// WP_BLOG_NAME & WP_URL is somthing I'ld like to see in WordPress
// heck they may just add them so lets add the -> if ! defined statment
if ( ! defined('WP_BLOG_NAME') )
	define( 'WP_BLOG_NAME', $the_blog_name );
if ( ! defined('WP_URL') )
	define( 'WP_URL', $the_web_url );

include 'lib'.DS.'esu-admin-class.php';
include 'lib'.DS.'esu-widget-class.php';
include 'lib'.DS.'esu-front-end-class.php';
  
$esu_admin = new EsuAdmin();
//load any extras
include 'lib'.DS.'esu-extras-helper.php';

$esu_forms = new EsuForms();
 
register_activation_hook( __FILE__, 'esu_activate' );

function esu_activate()
{
  $is_writable = is_writable(WP_PLUGIN_DIR); // check to see if we can write to the plugins dir
  if(!$is_writable) return;     // just leave
  esu_copy_r( ESU_PATH.DS."esu-extras".DS, ESU_EXTRAS_PATH );
}