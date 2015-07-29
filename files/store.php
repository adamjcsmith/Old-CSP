<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

	// DB Connection Here
	$db = new mysqli('localhost', 'cspprofe_csp', 'adamlancaster2013', 'cspprofe_products');
	if($db->connect_errno > 0){ die('Unable to connect to database [' . $db->connect_error . ']'); }
		
	if(!$result = $db->query("SELECT * FROM category")){
        die('There was an error running the query [' . $db->error . ']');
    }	
	
	// Include store header:
	echo '
        <div class="storecontainer mb2">
		    <div class="storemenu">
                <li class="mobileshow"><a href="/range">Store Home</a></li>';

				/*
                while($row = $result->fetch_assoc()){
					$catname = str_replace(' ', '', $row['name']);
					
					// If category is hidden then skip this loop:
					if($row['hidden'] == '1') continue;
					
                    echo '<li class="mobilehide"><a href="/range/#'.$catname.'">' . $row['name'] . '</a></li>';
                }
				*/
				
				echo '<li class="mobilehide"><a href="/range/#Launch500mls">Launch 500mls</a></li>';
				echo '<li class="mobilehide"><a href="/range/#LaunchPolish">Launch Polish System</a></li>';
				echo '<li class="mobilehide"><a href="/range/#Exterior">Products Coming Soon</a></li>';

                echo '
			   <div id="basketicon">
					<i class="fa fa-shopping-cart fa-fw fa-lg ind"></i>
					<span class="snipcart-summary snipcart-checkout">
						<span class="snipcart-total-price snipcart-checkout"></span>
					</span>
			   </div>
			   <li class="right mobilehide"><a id="deliverybutton" href="/range/delivery/"><i class="fa fa-truck"></i> Delivery & Returns</a></li>
		    </div>
		</div>
	';
	
	// Store Functions:
	include 'storeFunctions.php';
	
?>
<!--
	<div class="d100 centre mb2" style="background: lightyellow;">
		<p style="font-size: 22px; padding: 3%; "><i class="fa fa-exclamation-triangle fa-lg mr5"></i>Currently experiencing some issues with payments. Bear with us while we fix the problem, we'll be back up soon.</p>
	</div>
-->