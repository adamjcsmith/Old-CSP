<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<?php include '../../files/header.php'; 
		include('../../files/currencyconverter.php');
 
		$x = new CurrencyConverter('79.170.44.120','web120-csp','m4wTED^fB','web120-csp','currencytable');
		
		ini_set('display_errors',1); 
 error_reporting(E_ALL);

	// Database connection to list news articles:
 	$dbhandle = mysql_connect("localhost", "web120-info", "NKwd/ksK^") or die("Unable to connect to MySQL");
	mysql_set_charset('utf8',$dbhandle);
	$selected = mysql_select_db("web120-info",$dbhandle) or die("Could not select web120-info");
	
	$newsarticles = mysql_query("SELECT * FROM news ORDER BY articledate DESC");
	$num_results = mysql_num_rows($newsarticles); 

	$newsarticleslist = mysql_query("SELECT * FROM news ORDER BY articledate DESC");
	$num_results2 = mysql_num_rows($newsarticleslist);

	?>	   
</head>
<body>
	<div id="contentbox">
	
		<!--

		<div class="fullwidth" style="background-color: white; text-align: center; margin: 30px 0; color: black;">

        	<h2><span class="fadeheader">The latest company news.</span></h2>
         		
       	</div>
       	
       	-->

		<div class="spacer" style="height: 40px;"></div>
		
		<h3>Press enquiries should be directed to damian@cspprofessional.com / +44 (0)8702 07 08 09.</h3>
		<h3><span class="dimtext">We will be happy to deal with your request.</span></h3>
		
		<div class="spacer"></div>
				
		<div class="clear"></div>
		
		</div>

	<?php include '../../files/footer.php'; ?>
</body>
</html>
