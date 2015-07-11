<?php 
	$carid = $_GET["id"];
	
	// Database Connection:
	$db = new mysqli('localhost', 'cspprofe_csp', 'adamlancaster2013', 'cspprofe_cars');
	if($db->connect_errno > 0){ die('Unable to connect to database [' . $db->connect_error . ']'); }

	// Query for a car:
	if(!$result = $db->query("SELECT * FROM car WHERE id = " . $carid)){
        die('There was an error running the query [' . $db->error . ']');
    }
	
	// Query for car videos:
	if(!$videoResult = $db->query("SELECT * FROM video WHERE car = " . $carid)) {
		die('There was an error running the query [' . $db->error . ']');
	}

	while($row = $result->fetch_assoc()){
		$carname = $row['name'];
		$carcoverurl = $row['coverImage'];
	}
	
	// Send 404 if car is not found:
	if($result->num_rows < 1) {
		header("HTTP/1.0 404 Not Found");
		$carname = "404 Not Found";
	}
	
	$videoquery = "SELECT * FROM video WHERE car = " . $carid;
	
	$coverPath = '/images/cars/' . $carid . '/' . $carcoverurl;
	
	$bannerurl = $coverPath;		
	$titletext = 'Available for enquiries 9am - 7pm, Monday to Friday';
	$yshift = -500;
	$xshift = 0;
	$pagetitle = utf8_encode($carname);
	
	include '../files/header.php'; 
?>
       	
	<style>
		.showbox { position: relative; width: 100%; height: 250px; background-color: #ccc; background-size: cover; background-position: center center; margin-bottom: 10px; }
	</style>
		
	<div class="canvas centre">

		<ul class="bxslider" id="carSlider">
         <?php
          $filenumber = 0;
               try {
                    $dir = new DirectoryIterator("../images/cars/".$carid."/");
                    foreach ($dir as $fileinfo) {
                        if (!$fileinfo->isDot()) {
                            $filenumber += 1;
                            echo "<li style='display: inline !important; text-align: center !important;'><img src='/images/cars/" .$carid. "/" . $fileinfo->getFilename() . "' /></li>";
                        }
                    }
               }
               catch(Exception $e) {
                    // If there's no images, echo placeholder:
                    if($filenumber == 0) echo '<li><img src="/images/products/noproductimage.png" /></li>-->';
               }
         ?>
        </ul>
		
	</div>
	
	<div class="clear"></div>	
	
	<div class="canvas">
		<div class="subheading upspace2">Video</div>		
	
		<?php
		
			while($row2 = $videoResult->fetch_assoc()){
		
				echo '<div class="js-lazyYT inline-block" data-youtube-id="' . $row2["url"] . '" data-width="100%" data-height="260"></div>';
		
			}
		
		
		
		?>	
	</div>
	
	
	
	<script>
		$(document).ready(function(){
			$('.bxslider').bxSlider({
			<?php
				// Only flick through screens if there's multiple images:
				if($filenumber > 1) echo "auto: true, touchEnabled: false,";
				else echo "mode: 'fade',";
			?>
			autoControls: true,
			pagerCustom: '#bx-pager',
			controls: false,
			pause: 6000,
			speed: 800,
			autoHover: true
			});
		});	
	</script>
       					
		
<?php include '../files/footer.php'; ?>