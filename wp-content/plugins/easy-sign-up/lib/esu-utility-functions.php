<?php
// 
//  esu-utility-functions.php
//  easy-sign-up
//  
//  Created by Rew Rixom on 2011-03-29.
//  

/* Utility Functions */
/* Get plugin URL */

// Start esu_plugin_url
if ( ! function_exists('esu_plugin_url')) 
{
  function esu_plugin_url($path='')
  {
   	global $wp_version;
  	if ( version_compare( $wp_version, '2.8', '<' ) ) { // Using WordPress 2.7
  		$folder = dirname( plugin_basename( __FILE__ ) );
  		if ( '.' != $folder )
  			$path = path_join( ltrim( $folder, '/' ), $path );
  				
  		return plugins_url( $path );
  	}
  	return plugins_url( $path, __FILE__ );
  }
} // End esu_plugin_url



// Start esu_check_table_existance // Check that the $new_table is here
if ( ! function_exists('esu_check_table_existance')) 
{
  function esu_check_table_existance($new_table)
  {
   	//NB Always set wpdb globally!
  	global $wpdb;

  	foreach ($wpdb->get_col("SHOW TABLES",0) as $table ){
  		if ($table == $new_table){
  			return true;
  		}
  	}
  	return false;
    
  }
} // End esu_check_table_existance

function esu_is_win_server()
{
  if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
      return true;
  } else {
      return false;
  }
  
} 