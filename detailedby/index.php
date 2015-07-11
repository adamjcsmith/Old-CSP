<?php 

	// Database Connection:
	$db = new mysqli('localhost', 'cspprofe_csp', 'adamlancaster2013', 'cspprofe_cars');
	if($db->connect_errno > 0){ die('Unable to connect to database [' . $db->connect_error . ']'); }

	// Query for all cars
	if(!$cars = $db->query("SELECT * FROM car")){
        die('There was an error running the query [' . $db->error . ']');
    }


	$bannerurl = '/images/backgrounds/rsz_ferrari.jpg';
	$titletext = 'Available for enquiries 9am - 7pm, Monday to Friday';
	$yshift = -500;
	$xshift = 0;
	$pagetitle = 'Detailed By CSP';
	
	include '../files/header.php'; 
?>
       	
	<style>
		.showbox { position: relative; width: 100%; height: 210px; background-color: #ccc; background-size: cover; background-position: center center; margin-bottom: 10px; }
	</style>
		
	<div class="canvas">
	
		<?php 
		
		while($row = $cars->fetch_assoc()){
			echo '
			<div class="div33">
				<div class="showbox" style="background-image: url(/images/cars/' .$row['id']. '/' .$row['coverImage']. ');">
					<a class="windowlink" href="car/' . $row['id'] . '"></a>
				</div>
				
				<h3><a href="car/' . $row['id'] . '">' . utf8_encode($row['name']). '</a></h3>
				<h4 class="dim">' .utf8_encode($row['subtitle']). '</h4> 
			</div>';
		}

		?>
	
	</div>
       					
<?php include '../files/footer.php'; ?>