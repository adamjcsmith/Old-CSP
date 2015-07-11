<?php

	$EmailTo = "damian@cspdetailing.com"; //damian@cspprofessional.com
	$Subject = "Enquiry from the CSP Contact Form";
	$Name = Trim(stripslashes($_POST['Name'])); 
	$Tel = Trim(stripslashes($_POST['Tel'])); 
	$Email = Trim(stripslashes($_POST['Email'])); 
	$Message = Trim(stripslashes($_POST['Message'])); 
	$EmailFrom = Trim(stripslashes($_POST['Email']));
	
	// validation
	$validationOK = true;
	if (!$validationOK) {
		header("Location: error.htm");
	  	exit;
	}
	
	// prepare email body text
	$Body = "";

	$Body .= "Name: " . $Name;
	$Body .= PHP_EOL;

	$Body .= "Tel: " . $Tel;
	$Body .= PHP_EOL;

	$Body .= "Email: " . $Email;
	$Body .= PHP_EOL;

	$Body .= "Message: " . $Message;
	$Body .= PHP_EOL;
	
	// send email 
	$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");
	
	// redirect to success page 
	if ($success){
		header("Location: index.php?check=thanks");
	} else {
		header("Location: error.htm");
	}

?>