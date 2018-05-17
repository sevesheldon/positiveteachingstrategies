<?php
// 
//  easy_sign_up_process.php
//  easy-sign-up
//  
//  Created by Rew Rixom on 2011-03-29. @ Greenville Web
// 
// Validate for folks with no JS
// http://code.google.com/p/php-email-address-validation/
function check_email_address($email) {
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        return false;
    }
    // Split it into sections to make life easier
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        
		if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) { 	 
            return false;
        }
    }    
    if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
                return false; // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
                return false;
            }
        }
    }
    return true;
}
// load up WP - as this is outside of the normal plugin structure. 
$root = dirname(dirname(dirname(dirname(__FILE__))));

if(file_exists($root.'/wp-load.php')) {
	require_once($root.'/wp-load.php');
} else {
	// Pre-2.6 compatibility
	require_once($root.'/wp-config.php');
	require_once($root.'/wp-settings.php');
}

$error_txt = __('Error: please fill the required fields (name, email).');

$esu_name = $_POST["name"];	
if(!isset($esu_name))
  $esu_name = $_POST["esu_name"];

$esu_email = $_POST["email"];
if(!isset($esu_email))
  $esu_email = $_POST["esu_email"];


$easy_sign_up_co_email = get_option('easy_sign_up_co_email');
$easy_sign_up_url = get_option('easy_sign_up_url');

$easy_sign_up_co_from_email = get_option('easy_sign_up_co_from_email');
$easy_sign_up_thank_you_email = get_option('easy_sign_up_thank_you_email');
$easy_sign_up_thank_you_email = str_replace( "#fullname#",$esu_name, $easy_sign_up_thank_you_email ); 
$easy_sign_up_thank_you_email = stripslashes_deep($easy_sign_up_thank_you_email); /* added to remove the the backslash character used to escape quotes - March 14, 2012 */
$from = 'From: '.get_bloginfo('name').' <'.$easy_sign_up_co_from_email.'>' . "\r\n";

$esu_error_message = '
			<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<title>WordPress &rsaquo; Error</title>
				<link rel="stylesheet" href="'.get_admin_url().'css/install.css" type="text/css" />
			</head>
			<body id="error-page">
				<p>'.$error_txt.'</p></body>
			</html>
';

if( !isset($easy_sign_up_url) || trim($easy_sign_up_url) =="" )
{
	$easy_sign_up_url = get_bloginfo('url');
}

if( $esu_name == "" || $esu_email == "" )
{
	echo($esu_error_message);
		die;
}
if(check_email_address($esu_email))
{
	$admin_message = __("$esu_name ( $esu_email ) signed up and been redirected to $easy_sign_up_url.");
	$subject = __( "Email confirmation from ". get_bloginfo('name') );
	
	wp_mail ($easy_sign_up_co_email, $subject, $admin_message, $from);
	wp_mail ($esu_email, $subject, $easy_sign_up_thank_you_email, $from); 
	
	if (class_exists('EsuDB')) {
      EsuDB::esu_add_user_data($esu_name,$esu_email);
  }
	
	header("Location: $easy_sign_up_url");

}else{
	echo($esu_error_message);
}?>