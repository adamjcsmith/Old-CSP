<?php

	$ipaddress = $_SERVER['REMOTE_ADDR'];
	$countrycode = strtolower(file_get_contents('http://api.wipmania.com/' .$ipaddress. '?cspprofessional.com'));
	$countryname;
	$countrycurrency;
	$currencysign;
	$override;	
	
	if ($countrycode == 'gb') {
		$countryname = 'United Kingdom';
		$currencysign = '£';	
		$countrycurrency = 'GBP';			
	}		
	else if ($countrycode == 'us') {
		$countryname = 'United States'; 
		$currencysign = '$';	
		$countrycurrency = 'USD';				
	}
	else {
		$countryname = 'Rest of World';
		$currencysign = '€';
		$countrycurrency = 'EUR';					
	}	
	
		
?>