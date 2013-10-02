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
function myCheckDNSRR($hostName, $recType = '')
{
	if(!empty($hostName)) {
		if( $recType == '' ) $recType = "MX";
		exec("nslookup -type=$recType $hostName", $result);
		// check each line to find the one that starts with the host
		// name. If it exists then the function succeeded.
		foreach ($result as $line) {
			if(eregi("^$hostName",$line)) {
				return true;
			}
		}
		// otherwise there was no mail handler for the domain
		return false;
	}
	return false;
}

// If you are running this test on a Windows machine, you'll need to
// uncomment the next line and comment out the checkdnsrr call:
//if (myCheckDNSRR("joemarini.com","MX"))
if (checkdnsrr("joemarini.com","MX"))
	echo "yup - valid email!";
else
	echo "nope - invalid email!";
?>
</body>
</html>