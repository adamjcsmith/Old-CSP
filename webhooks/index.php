<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$json = file_get_contents('php://input');
$body = json_decode($json, true);

//mail("adamjcsmith@gmail.com", "Snipcart Diags", "Received request from Snipcart API: " . print_r($body['content']['items'], true ), "From: test@cspprofessional.com");


if (is_null($body) or !isset($body['eventName'])) {
    // When something goes wrong, return an invalid status code
    // such as 400 BadRequest.
    header('HTTP/1.1 400 Bad Request');
    return;
}

switch ($body['eventName']) {
    case 'order.completed':
        // This is an order:completed event
        // do what needs to be done here.
		

		foreach($body['content']['items'] as $item) {
			
			$quantity = $item['quantity'];	
			$parts = explode("-",$item['id']); 
			$id = $parts['0']; 
			$volume = $parts['1'];
			
			// Connect to MySQL here:
			$conn = new mysqli(localhost, "cspprofe_csp", "adamlancaster2013", "cspprofe_products");
			if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 

			$sql = "UPDATE price SET price.quantity = price.quantity - $quantity WHERE (product=$id AND volume=$volume);";

			if ($conn->query($sql) === TRUE) {
				echo "Quantity successfully reduced.";
			} else {
				echo "Error updating record: " . $conn->error;
			}
			
		}
		
        break;
}

// Return a valid status code such as 200 OK.
header('HTTP/1.1 200 OK');


?>