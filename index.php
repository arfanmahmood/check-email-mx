<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email Validation Using MX</title>
</head>

<body>
<?php
// Function to check whether a given hostName is a valid email
// domain address.

if(validate_email('afdsfas@zeewebtech.com'))

	echo 'valid';

else

	echo 'invalid';

function validate_email($email){

   $exp = "/^[a-z\'0-9]+([._-][a-z\'0-9]+)*@([a-z0-9]+([._-][a-z0-9]+))+$/";

   if(preg_match($exp,$email)){

      if(checkdnsrr(array_pop(explode("@",$email)),"MX")){
        return true;
      }else{
        return false;
      }

   }else{

      return false;

   }    
}

?>
</body>
</html>