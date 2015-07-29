<?php
	//error_reporting(E_ALL);
    //ini_set('display_errors', 1);
	$catpage = 'Products';
	$subpage = 'Exterior Collection';
	$catlink = '/range/';
	$productid = $_GET["id"];
	$yshift = -300;
	$xshift = 0;
	$store = true;

 	// Connect to the Database.
	$dbhandle = mysql_connect("localhost", "cspprofe_csp", "adamlancaster2013") or die("Unable to connect to MySQL");
	mysql_set_charset('utf8',$dbhandle);
	$selected = mysql_select_db("cspprofe_products",$dbhandle) or die("Could not select products");
	// Get product information from database and assign to variables.
	$productdetails = mysql_query("SELECT * FROM product WHERE id = $productid");
	while ($row = mysql_fetch_array($productdetails)) {
		
		$productname = $row['name'];
		$longdescription = $row['description'];
		//$videolink = $row["videolink"];
		$subtitle = $row['subtitle'];
		$directions = $row['directions'];
		$enabled = $row['enabled'];
		$mainimage = $row['mainimg'];
		$category = $row['category'];
	}
	

	
	
	// Get volume information.
	$volumeinfo = mysql_query("SELECT DISTINCT price.product, price.volume, price.price, price.quantity, volume.type FROM volume, price, product WHERE (price.product = $productid) AND (price.volume = volume.amount)");
	$volumesavailable = mysql_num_rows($volumeinfo);
	// Find the smallest priced volume (for 'Available from:'):
	$minpricequery = mysql_query("SELECT MIN(price.price) as minprice, type, volume FROM price, product, volume WHERE (price.product = $productid) AND (price.volume = volume.amount)");
	$numberofprices = mysql_num_rows($minpricequery);
	while($minpriceloop = mysql_fetch_array($minpricequery)) {
		$minimumprice = $minpriceloop['minprice'];
		$minimumvolume = $minpriceloop['volume'];
		$minimumtype = $minpriceloop['type'];
	}
	// Get review information.
	$reviews = mysql_query("SELECT * FROM review WHERE product = $productid");
	$num_reviews = mysql_num_rows($reviews);
    // Get video information.
    $videos = mysql_query("SELECT * FROM video WHERE product = $productid");
    $num_videos = mysql_num_rows($videos);
	
	include '../files/php/functions.php';
	include '../files/header.php';  // Use '../../files/header.php' if the product directory is beyond /product/	

	?>
	
	<!-- Javascript -->
	<script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js"></script>
	<h2 class="dim thin centre mobileshow mt5"><?php echo $productname; ?></h2>
	<?php
		// Add static versions of the product volumes in compliance with snipcart's api:
		$currentQuantity;
		
		// NOT NEEDED WHILE ITEM.ADD IS NOT BEING USED AS OF 27/07/2015:
		
		while($row = mysql_fetch_array($volumeinfo)) {
			$currentQuantity = $row["quantity"];
			
		/*			
			echo '<a href="#" style="display: none;" class="snipcart-add-item" ';
			echo 'data-item-id="' .$productid. '" ';
			echo 'data-item-name="'.$productname.' ('.$row["volume"].' '.$row["type"].')" ';
			echo 'data-item-price="'.$row["price"].'" ';
			if($productid == 209 || $productid == 210) echo 'data-item-price-cspvip="49.00" ';			
			
			echo 'data-item-url="/range/product/'.$productid.'" ';
			echo 'data-item-description="'.$row["volume"].' '.$row["type"].' version." ';
			
			if($productid == 209 || $productid == 210) echo 'data-item-cspvip="49.00" ';

			echo 'data-item-max-quantity="2">';
			
			echo '</a>';
			
		*/			
		}
		mysql_free_result($volumeinfo);



		?>
	<?php 
		// Default Product Details:
		echo '<script>
				productTitle = "'. $productname .'";
				productVolume = '.$minimumvolume.';
				productType = "'.$minimumtype.'";
				productPrice = "'.$minimumprice.'";
				productID = "'.$productid.'";
				productMaxQuantity = "2";
		   </script>';
	?>
	<div class="clear"></div>
	<?php echo $subtitle; ?></h5>
	<!-- Image List -->
	
	<div class="div50 upspace" style="padding-left: 0;">
	<ul class="bxslider">
         <?php
		 echo "<li style='display: inline !important; text-align: center !important;'><img src='/images/products/" .$productid. "/" . $mainimage . "' /></li>";
		 
          $filenumber = 0;
               try {
                    $dir = new DirectoryIterator("../images/products/".$productid."/");
                    foreach ($dir as $fileinfo) {
                        if (!$fileinfo->isDot()) {
                            $filenumber += 1;
							
							if($fileinfo->getFilename() == $mainimage) continue;
							
                            echo "<li style='display: inline !important; text-align: center !important;'><img src='/images/products/" .$productid. "/" . $fileinfo->getFilename() . "' /></li>";
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
        <div class="div50 upspace">
			<h2 class="thin mobilehide"><?php echo $productname; ?></h2>
			<?php 	
				if($numberofprices > 1 ) $prefixtext = "From";
				else $prefixtext = "";
			echo '<h6 class="dim mobilehide" style=" margin-top: 10px; display: inline-block;">'.$prefixtext.' <span class="cspblue">£'.$minimumprice.'</span></h6>'; ?>
			<!--<div class="linelight mobilehide"></div>-->
            <h5 id ="descriptionblock" class="" style="letter-spacing: -0.5px; background: #f1f1f1; border-top: solid 5px #ccc; padding: 15px; margin-top: 30px; ">
				<?php 
				//$tasterdescription = substr($longdescription, 0, 30);
				echo $longdescription; ?>
			</h5>
            <div class="linelight"></div>
            <?php

			mysql_free_result($volumeinfo);
			
			$bundleCheck = false;
			if(checkIfBundle($productid)) {
				if(!checkBundleChildren($productid)) {
					$bundleCheck = true;
				}
			}

			if($minimumprice == '0' || $minimumprice == '' || $enabled == '0') {
				echo '<h6 class="dim" style="display: inline-block;">Available soon</h6>';
				echo '';
			}
			else if($currentQuantity == 0 || $bundleCheck) {
				echo '<h6 class="dim" style="display: inline-block;">Out of stock. Check back soon.</h6>';
			}
			else {
				
				if($currentQuantity < 10) {
					echo '<h6 style="color: orange; display: inline-block;"><i class="fa fa-fire" style="margin-right: 10px; "></i> Hurry, only ' . $currentQuantity . ' left in stock.</h6>';
				}
				
                    echo '<div class="canvas centre upspace">';
                    echo '<div id="dd" class="wrapper-dropdown-3" tabindex="1">
                                               <span>'.$productname.' - £'.$minimumprice.'</span>
                                               <ul class="dropdown">';
				while ($row = mysql_fetch_array($volumeinfo)) {
					echo '
                         <li><a href="#"><i class="icon-large"></i>' . formatVolume($row["volume"]).' - £'.$row["price"].'</a></li>
                         <script>
                            // Add to Array
                            options.push({"volume":'.$row["volume"].', "type":"'.$row["type"].'", "price":'.$row["price"].' });
                         </script>
					';
				}
				echo '</ul></div>
				<!--<div id="addtobasket" class="addtobasket" onclick="addToBasket();">Add to Basket</div> -->
				<a href="#" class="addtobasket snipcart-add-item"
				
					data-item-id="' .$productid. '" 
					data-item-name="' .$productname. '" 
					data-item-price="' .$minimumprice. '"'; 
					
					if($productid == 209 || $productid == 210) echo 'data-item-cspvip="49.00" ';
					if($productid == 209 || $productid == 210) echo 'data-item-price-cspvip="49.00" ';					
					
					echo 'data-item-url="/range/product/' .$productid. '" 
					data-item-description=""					
					data-item-max-quantity="2"
				
				>Add to Basket</a>
				</div>
				';
			}
            ?>
            <!--</div>-->
            <div class="clear"></div>
			<!--
			<div id="related-box" class="mobilehide">
			    <div class="linelight upspace"></div>
				<h5 class="dim" style="display: inline-block;">Related Products:</h5>
				<div class="canvas">
					<div class="div60 extrabox upspace">
						<h5><a href="/">CSP Stainless Steel Mixing Bucket</a></h5>
						<h5 class="dim">Dilute concentrates with ease.</h5>
					</div>
					<div class="addtobasket addon centre">+ £3.99</div>
				</div>
				<div class="canvas">
				   <div class="div60 extrabox upspace">
						<h5><a href="/">CSP Premium Application Pads</a></h5>
						<h5 class="dim">Lasts three times longer, guaranteed.</h5>
					</div>
					<div class="addtobasket addon centre">+ £3.99</div>
				</div>
			</div>
			-->
            <div class="clear"></div>
            <div class="linelight" style="margin-bottom: 10px;"></div>
			<div class="canvas">
				<div class="div50">
					<h6 class="downspace centre dim">Gallery</h6>
					<div id="bx-pager" style="text-align: center;">
						<?php
							echo '<a data-slide-index="0" href=""><img src="/images/products/' .$productid. '/' . $mainimage. '" /></a>';
						
						   $iterator = 1;
							try {
						   $dir = new DirectoryIterator("../images/products/".$productid."/");
							foreach ($dir as $fileinfo) {
								if (!$fileinfo->isDot()) {
									
									if($fileinfo->getFilename() == $mainimage) continue;
									
									echo '<a data-slide-index="' .$iterator. '" href=""><img src="/images/products/' .$productid. '/' . $fileinfo->getFilename(). '" /></a>';
									$iterator += 1;
								}
							}
							}
							catch(Exception $e) {
							}
						?>
					</div>						
				</div>
				<div class="div50 centre">
					<h6 class="downspace centre dim">Share</h6>
					<div class="upspace">
						<span class='st_facebook_large' displayText='Facebook'></span>
						<span class='st_twitter_large' displayText='Tweet'></span>
						<span class='st_pinterest_large' displayText='Pinterest'></span>
						<span class='st_email_large' displayText='Email'></span>
					</div>
				</div>
			</div>
        </div>
        <div class="clear"></div>
		<div class="linelight" style="margin-top: 10px;"></div>
		<div class="canvas">
			<div class="div50">
				<h6 class="dim downspace2 headline centre">Directions for Use</h6>
				<div id= "directionsblock" class"canvas">
					<h5 class="" style="padding: 0 30px;"><?php echo $directions ?></h5>
				</div>
			</div>			
			<div class="div50">
			      <h6 class="dim downspace2 centre headline">In Action</h6>
			      <?php
					$videowidth = (100 / $num_videos);
					if($videowidth < 33) $videowidth = 33;
					while($videoresults = mysql_fetch_array($videos)) {
						echo '<div class="lazyYT inline-block" data-youtube-id="' . $videoresults["url"] . '" data-width="'.$videowidth.'%" data-height="300"></div>';
					}
				?>
			</div>
		</div>
		<div class="clear"></div>
        <?php
        while($reviewresults = mysql_fetch_array($reviews)) {
            echo '';
        }
        ?>
	<?php include '../files/footer.php'; // see top of page about directories.?>
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
                pause: 10000,
                speed: 800,
                autoHover: true
                });
            });
	    </script>
		<script>
			$('#descriptionblock').readmore({
			  moreLink: '<a class="upspace" href="#"><h5>Show Full Description</h5></a>',
			  collapsedHeight: 209,
			  lessLink: '<a class="upspace" href="#"><h5>Hide Full Description</h5></a>'
			});
			$('#directionsblock').readmore({
			  moreLink: '<a class="upspace" href="#"><h5>Show Full Directions</h5></a>',
			  collapsedHeight: 209,
			  lessLink: '<a class="upspace" href="#"><h5>Hide Full Directions</h5></a>'
			});			
		</script>
</body>
</html>