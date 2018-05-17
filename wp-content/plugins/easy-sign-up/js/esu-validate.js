// 
//  esu-validate.js
//  easy-sign-up
//  
//  Created by Rew Rixom on 2011-04-13.
//  Copyright 2011 Greenville Web. All rights reserved.
// 

function esu_validate(esu,esu_email,esu_name,esu_n_err,esu_e_err,name_err_msg,email_err_msg) {
	// esu = form's ID 
	// esu_email = email address field
	// esu_name = the form's name field
	// esu_n_err = the form's name  error  id
	// esu_e_err = the form's email error  id
	
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var address = document.forms[esu].elements[esu_email].value;
	var esu_name_value = document.forms[esu].elements[esu_name].value;
			esu_name_value =  esu_name_value.replace(/^\s*/, "").replace(/\s*$/, "");
	if (typeof name_err_msg == "undefined") {
          name_err_msg = "*Name is required";
  }
  if (typeof email_err_msg == "undefined") {
          email_err_msg = "*Check your email address";
  }
 
	if(esu_name_value == "" && reg.test(address) == false)
	{
	  esu_valid(esu_n_err,esu_name,false,name_err_msg);
	 	esu_valid(esu_e_err,esu_email,false,email_err_msg);
	  return false;
	}
	else if(esu_name_value == "" && reg.test(address) == true)
	{
	 	esu_valid(esu_n_err,esu_name,false,name_err_msg);
	 	esu_valid(esu_e_err,esu_email,true);
		return false;
	}
	else if(esu_name_value != "" && reg.test(address) == false) 
	{
	 esu_valid(esu_n_err,esu_name,true);
	 esu_valid(esu_e_err,esu_email,false,email_err_msg);
	 return false;
	}
	else if(esu_name_value != "" && reg.test(address) == true)
	{
	 	esu_valid(esu_n_err,esu_name,true);
	 	esu_valid(esu_e_err,esu_email,true);
	}
			
}

function esu_valid (esu_err_id,esu_field_name,err,msg) {
	if(!msg){ var msg=''; }
	if(err!=true){
		if(esu_err_id!=null)
		{
			document.getElementById(esu_err_id).innerHTML = msg;
			document.getElementById(esu_err_id).style.display="block";
		}
  	
  	document.getElementById(esu_field_name).className="esu-error";
	}else{
		if(esu_err_id!=null)
		{
     	document.getElementById(esu_err_id).innerHTML = "";
 			document.getElementById(esu_err_id).style.display="none";
		}
     document.getElementById(esu_field_name).className="esu-good";
	}
}