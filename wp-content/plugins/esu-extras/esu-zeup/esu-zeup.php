<?php
// 
//  esu-eup.php
//  easy-sign-up
//  
//  Created by Rew Rixom on 2011-04-22.
//  Copyright 2011 Greenville Web. All rights reserved.
// 
/**
* this class creates and manages the uploading and unzipping of the esu extras
*/
class EzUp extends EsuAdmin
{
  
  function EzUp() //__construct() #php5
  {
    add_action('admin_menu',  array( $this,'esu_add_upload_page' )  );
    // EsuAdmin
    add_action('admin_menu',  array( $this,'esu_add_upgrade_page' )  );
  }
  
  function esu_add_upload_page()
  {
    add_submenu_page( 
    "esu_options_pg", "Uploader", 
    "Upload Extras", 'administrator', 
    'esu_upload_pg', 
  	array($this,'esu_upload_pg')
  	);
  }
  
  /**
  * form page
  */
  function esu_upload_pg()
  {
    echo $this->esu_admin_header_html();
    $this->esu_upload_form();
    echo $this->esu_admin_footer_html();
  } // end page
  
  /**
  * the upload form
  */
  function esu_upload_form()
  {
    $form_html = '
      <form enctype="multipart/form-data" action="" method="post"> 
          <input type="hidden" name="MAX_FILE_SIZE" value="1024000">
          <input name="uploadfile" type="file"> 
          <input name="upload" type="submit" value="Upload Extra" class="button">
      </form>';
    
    if ( isset($_POST['upload']) ){    //process uploaded file 
        $uploadDir        =   ESU_EXTRAS_PATH; //file upload path 
        $uploadFileName   =   $_FILES['uploadfile']['name'];
        $uploadFile       =   $uploadDir . $uploadFileName; 
        
        //=======================

        $extensions = array('.zip','.ZIP');
        $extension  = strrchr($uploadFileName, '.');

        if (!in_array($extension, $extensions))
        {
        echo($_FILES['uploadfile']['name'].' is <strong>not</strong> a valid Extra, please upload Extra in the zipped archive. <input type=button value="Back" onClick="history.go(-1)">');
        return; // this kill the function by returning you to the parent.
        }  

        //=========================

        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadFile) ) 
        { 
            // now we need to unzip the extra
            $inc_about = $this->esu_unzip_extra($uploadFile,$uploadFileName);
            if( @is_file($inc_about) ){
              include $inc_about;
              echo "<h1>Great, Got it installed!</h1>";
              echo "<p><em>Do you want to upload another?</em></p>";
              echo $form_html;
            }
            
            
        } 
        else 
        { 
            echo "ERROR!  Here's some debugging info:\n"; 
            echo("<pre>");
            var_dump($_FILES);
            echo("</pre>");
        } 
        
    } else { //display upload form 
        echo $form_html;
    }
    # end 
  }
  
  function esu_unzip_extra($extra,$extrafolder)
  {
   $file_dir = str_replace( ".zip", "", $extra );
   $to       = str_replace( ".zip", "", $extrafolder );
  
   
   if ( !class_exists('PclZip') ) // WP does have a copy of this class too
    
      require_once(ABSPATH . 'wp-admin/includes/class-pclzip.php');
      $archive = new PclZip($extra); // call zip class from wordpress
      $win_file_dir = str_replace($to, "", $file_dir); // fix for Windows ( IIS )
      $list = $archive->extract(PCLZIP_OPT_PATH,$win_file_dir);
      
   if ($list == 0) {
     die("$uploadDir ERROR : '".$archive->errorInfo(true)."'");
   }else{
     unlink($extra);
     return $file_dir.'/about.esu';    
   }
   
  } // end func esu_unzip_extra()
  
  
} // END Class
if (is_admin()) {
  $esu_ezup = new EzUp();
}