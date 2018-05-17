<?php
// 
//  esu-extras-helper.php
//  easy-sign-up
//  
//  Created by Rew Rixom on 2011-04-05.
//  Copyright 2011 Greenville Web. All rights reserved.
// 

//to get array of current extras do a call like this:
//  $esu_current_extras=esu_current_extra();
//mutidmentanal array looks like this:
//  [$i][folder] => esu-database
//  [$i][file_path] => /Users/rew/Sites/wp_test/wp-content/plugins/easy-sign-up/esu-extras/esu-database/esu-database.php

function esu_e_helper()
{
  $esu_extras_path = ESU_EXTRAS_PATH;
  $esu_error_txt = 
  __("Failed to a create folder in your Plugin directory this is due to your permissions setting.
      <br />See <a href='http://codex.wordpress.org/Changing_File_Permissions' target='new'>http://codex.wordpress.org/Changing_File_Permissions</a>
      <br />This Plugin will be deactivated, please use your back button to return to the admin page.
    ");
 
  if(!file_exists($esu_extras_path)) // create extras dir
  {
    
    $is_writable = is_writable(WP_PLUGIN_DIR); // check to see if we can write to the plugins dir
    if(!$is_writable) die($esu_error_txt);     // if not die and tell the user whats what
    
    if (@!mkdir($esu_extras_path, 0775, true)) {

		require_once ABSPATH. DS.'wp-admin'.DS.'includes'.DS.'plugin.php';
		deactivate_plugins( ABSPATH. DS.'wp-content'.DS.'plugins'.DS.'easy-sign-up'.DS.'easy_sign_up.php'  );
      wp_die($esu_error_txt);
    }
    else { // lets copy over the uploader
       esu_copy_r(ESU_PATH.DS."esu-extras".DS, $esu_extras_path);
    }
  }
  
  $i=0;// set this up for an array
  // read the dir
    if ($handle = opendir($esu_extras_path)) {
      /* This is the correct way to loop over the directory. */
      while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..")
        {
          $the_file = $esu_extras_path.$file.DS.$file.'.php';
          if(file_exists($the_file)) :
            //The file $the_file exists
            $esu_current_extra[$i]['folder']      = $file;
            $esu_current_extra[$i]['file_path']   = $the_file;
            $esu_current_extra[$i]['folder_path'] = $esu_extras_path.$file.DS;
            $i++; // only incriment the array if the file is there
          endif;
        }
      } //end while
        closedir($handle);
    } // end if $handle
    if(isset($esu_current_extra)) return $esu_current_extra;
}

function esu_load_extras(){
  $esu_load_extras = esu_e_helper();
  if(is_array($esu_load_extras)){
    foreach ($esu_load_extras as $key => $value) :
      include_once($value['file_path']);
    endforeach;
  }
  
}



    function esu_copy_r( $path, $dest )
    {
        if( is_dir($path) )
        {
            @mkdir( $dest );
            $objects = scandir($path);
            if( sizeof($objects) > 0 )
            {
                foreach( $objects as $file )
                {
                    if( $file == "." || $file == ".." )
                        continue;
                    // go on
                    if( is_dir( $path.DS.$file ) )
                    {
                        esu_copy_r( $path.DS.$file, $dest.DS.$file );
                    }
                    else
                    {
                        copy( $path.DS.$file, $dest.DS.$file );
                    }
                }
            }
            return true;
        }
        elseif( is_file($path) )
        {
            return copy($path, $dest);
        }
        else
        {
            return false;
        }
    }

esu_load_extras();