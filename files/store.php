<?php

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
		        <!--<a href="/"><img src="/images/csp3.png" height="24" style="margin-top: 9px; margin-left: 10px; margin-right: 5px; float: left;"></a>-->
                <li class="mobileshow"><a href="/range">Store Home</a></li>';

                while($row = $result->fetch_assoc()){
					$catname = str_replace(' ', '', $row['name']);
					
					// If category is hidden then skip this loop:
					if($row['hidden'] == '1') continue;
					
                    echo '<li class="mobilehide"><a href="/range/#'.$catname.'">' . $row['name'] . '</a></li>';
                }

                echo '
                <li class="floatright selected snipcart-checkout mobilehide"><a href="#">Checkout</a></li>
                 <div id="basketicon"><a class="snipcart-checkout windowlink"></a><span class="snipcart-summary"><b><span class="snipcart-total-price"></span></b></span></div>
			   <li class="floatright mobilehide"><a id="deliverybutton" href="/range/delivery/">Delivery Info</a></li>
		    </div>
		</div>
	';

?>