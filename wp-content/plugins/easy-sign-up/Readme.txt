===Easy Sign Up===
Contributors: Greenweb
Tags: auto responder,auto-responder, autoresponder, form, emailer, email, redirection, leads, mailing list, newsletter, newsletter signup, sign up, beforesite
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7YA9D9G4TE9BA
Stable tag: trunk
Requires at least: 3.2
Tested up to: 3.3

This Plug-in creates a form to collect the name and e-mail from your visitors, who are then redirected to the url you choose. 

== Description ==
The plug-in generates a customizable thank you email that's sent to the visitor and the visitor's email and name are sent to an email address of your choosing.
Possible use is collecting email address for a newsletter, or leads for your sales force before redirecting to a brochure.

= Main Functions =
 * Email address collection
 * User redirection
 * Auto-responder
 * Lead collection

[More Info and Support](http://www.beforesite.com/)

== Installation == 
    * Upload the easy_sign_up folder to the /wp-content/plugins/ directory
    * Activate the plugin through the 'Plugins' menu in WordPress
    * Change the options under the Easy Sign Up Menu
== Use ==
 * Add the form to your site as a widget.

OR

 * Use the following short code in your pages and posts:
 * [easy_sign_up]
 * Optional short tag values are title and from_id
  * title allows you to customize the title. The short code [easy_sign_up] default title is "Easy Sign Up"
  * form_id allows you to place the form on the page in more then one place. You'll need a unique value of form_id for each form you add.
  * i.e. [easy_sign_up title="Put in your own title here" form_id="myIdHere"]

== Frequently Asked Questions ==
[FAQ](http://www.beforesite.com/plugins/easy-sign-up-features/easy-sign-up-faq)
== Upgrade Notice ==
See Installation
== Screenshots ==
1. Easy Sign Up
2. Easy Sign Up Options Page
[More info here](http://www.beforesite.com/plugins/easy-sign-up-features)
== Changelog ==
= 2.1.1 =
  * Added [stripslashes_deep()](http://codex.wordpress.org/Function_Reference/stripslashes_deep) function to remove the the backslash character used to escape quotes in auto-responder email - March 14, 2012
= 2.1 =
  * Fixed a IIS bug with the way the unzip class was handling the windows folder system
  * Getting the plugin ready to work in 3.3
   * Ensuring that the code contains no deprecated functions or hooks
= 2 =
 * Replaced jQuery validation with standard javascript. Saving 35 kb and minimizing clashes with other javascript libraries used by themes and plugins
 * Replaced mail() with wp_mail()
 * Added support for Easy Extras
  * [More info here](http://www.beforesite.com) 
 * Added support for localization.
  * To translate into your language use the easy-sign-up.pot file in /languages folder.
  * Poedit is a good tool to for translating. @link http://poedit.net
  * Please contact me at support.beforesite.com with any translations so I can make them available to others.

= 1.2 =
 * Bug fix: Fixed a problem with a clash between the Easy Sign Up plugin and the Atahualpa Theme. 

 * Added the form as a widget.

 * Changed the validation script to jQuery validation plug-in 1.7
 
 * Added form_id as an optional attribute to the short code, this will allow the form to be in more then one area of your page without confusing the form validation script.
  * Note that you need to make your id one word i.e. form_id="my_id" OR form_id="myID" is correct, But form_id="My ID" is wrong.

= 1.1 =
Removed direct access to the wp-config.php file.
Added custom tag to the auto reply email. If you would like to include the name person who signed up in the *Thank You Email* just paste #fullname# into the Thank You Email text field where you'd like to see it.

= 1 =
First Version