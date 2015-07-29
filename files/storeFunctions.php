<?php

	function checkIfBundle($productid) {
		
		$db = new mysqli('localhost', 'cspprofe_csp', 'adamlancaster2013', 'cspprofe_products');
		if($db->connect_errno > 0){ die('Unable to connect to database [' . $db->connect_error . ']'); }
		
		if(!$bundleQuery = $db->query("SELECT * FROM bundle WHERE bundleID = " . $productid))
			die('There was an error running the query [' . $db->error . ']');
		
		if($bundleQuery->num_rows > 0) return true;
		else return false;
		
	}
	
	function checkBundleChildren($productid) {
		
		$db = new mysqli('localhost', 'cspprofe_csp', 'adamlancaster2013', 'cspprofe_products');
		if($db->connect_errno > 0){ die('Unable to connect to database [' . $db->connect_error . ']'); }
		
		if(!$bundleQuery = $db->query("SELECT * FROM bundle WHERE bundleID = " .$productid))
			die('There was an error running the query[' .$db->error . ']');
		
		while($bundleRow = $bundleQuery->fetch_assoc()) {
			if(!checkProductStock($bundleRow["productID"])) return false;
		}
		
		return true;
	}
	
	function checkProductStock($productid) {
		
		$db = new mysqli('localhost', 'cspprofe_csp', 'adamlancaster2013', 'cspprofe_products');
		if($db->connect_errno > 0){ die('Unable to connect to database [' . $db->connect_error . ']'); }
		
		if(!$stockQuery = $db->query("SELECT * FROM price WHERE product = " . $productid)) die('There was an error running the query[' .$db->error . ']');
		
		while($stockRow = $stockQuery->fetch_assoc()) {
			if($stockRow["quantity"] > 0) return true;
			else return false;
		}
	
	}
	
	function getBundleChildren($productid) {
		
		$db = new mysqli('localhost', 'cspprofe_csp', 'adamlancaster2013', 'cspprofe_products');
		if($db->connect_errno > 0){ die('Unable to connect to database [' . $db->connect_error . ']'); }		

		if(!$childQuery = $db->query("SELECT * FROM bundle WHERE bundleID = " . $productid)) die('There was an error running the query[' .$db->error . ']');
		
		$children = array();
		
		while($childRow = $childQuery->fetch_assoc()) {
			
			array_push($children, $childRow['productID']);
			
		}

		return $children;
		
	}

?>