<?php
	// Cross Page Functions
	// (C) 2014 Adam Smith

	function getProductName($id) {
		
		// Connect to the database:
		$fdb = new mysqli('localhost', 'cspprofe', 'adamlancaster2013', 'cspprofe_products');

		if($fdb->connect_errno > 0){
			die('Unable to connectz to database [' . $db->connect_error . ']');
		}
		
		$productquery = "SELECT name FROM product WHERE id = $id";
		
		if(!$result = $fdb->query($productquery)){
			die('There was an error running the query [' . $fdb->error . ']');
		}
		
		while($row = $result->fetch_assoc()){
			$productname = $row['name'];
		}
		
		return $productname;
	}



	function formatVolume($volume) {

	    if($volume == 500)
	        return ($volume . 'ml');
	    else if($volume == 5000)
            return '5 Litre';
	    else
	        return ($volume . "");

	}

?>