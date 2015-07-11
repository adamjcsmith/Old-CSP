<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<?php

	error_reporting(E_ALL);
    ini_set('display_errors', 1);
	
	$catpage = 'Products';
	$subpage = 'Exterior Collection';
	$catlink = '/range/';
	
	$productid = $_GET["id"];
	
	$bannerurl = '/images/backgrounds/audi.jpg';
	$yshift = -300;
	
	include '../files/php/functions.php';
	
	$pagetitle = getProductName($productid);
		
	
	include '../files/header.php';  // Use '../../files/header.php' if the product directory is beyond /product/
	include '../files/currencyconverter.php'; // Same as above
		
	// As a failsafe, check when the last currency table was updated:

	$x = new CurrencyConverter('localhost','cspprofe_csp','adamlancaster2013','cspprofe_main','currencytable');
	
 	// Connect to the Database.
	$dbhandle = mysql_connect("localhost", "cspprofe_csp", "adamlancaster2013") or die("Unable to connect to MySQL");
	mysql_set_charset('utf8',$dbhandle);
	$selected = mysql_select_db("cspprofe_products",$dbhandle) or die("Could not select products");
	
	// Get product information from database and assign to variables.
	$productdetails = mysql_query("SELECT * FROM productlist WHERE productid = $productid");
	
	// Get volume information.
	$volumeinfo = mysql_query("SELECT DISTINCT productvolumes.ID, VolumeName, PricePerUnit FROM volumelist2, productvolumes, productlist WHERE (productvolumes.ProductID = $productid) AND (productvolumes.VolumeID = volumelist2.ID) ORDER BY productvolumes.ID ASC");
	$volumesavailable = mysql_num_rows($volumeinfo);
	
	// Find the smallest priced volume (for 'Available from:'):
	$minpricequery = mysql_query("SELECT MIN(PricePerUnit) as minprice FROM productvolumes, productlist WHERE (productvolumes.ProductID = $productid)");
	$numberofprices = mysql_num_rows($minpricequery);
	
	while($minpriceloop = mysql_fetch_array($minpricequery)) {
		$minimumprice = $minpriceloop['minprice'];
	}
	
	
	// Extract data from query:
	while ($row = mysql_fetch_array($productdetails)) {   
		$productname = $row['productname'];
		$longdescription = $row['productdescription'];				
		$videolink = $row["videolink"];
		$subtitle = $row['Subtitle'];
		$directions = $row['Directions'];
		$quantity = $row['Quantity'];
	}
	
	// Get review information.
	$productreviews = mysql_query("SELECT * FROM reviewlist WHERE productid = $productid");
	$num_results = mysql_num_rows($productreviews); 
	
	// Get currency information.
	$productcurrencies = mysql_query("SELECT * FROM currencylist");
	$productcurrencies2 = mysql_query("SELECT * FROM currencylist");
	
	// Get special feature information.
	$specialfeatures = mysql_query("SELECT * FROM specialfeaturelist WHERE productid = $productid");
	
	// Get new image system information.
	$imagelist = mysql_query("SELECT * FROM imagelist WHERE productid = $productid LIMIT 1");
	$imageresults = mysql_num_rows($imagelist);
	$imagelist2 = mysql_query("SELECT * FROM imagelist WHERE productid = $productid LIMIT 1");
	
	// Find the first product image.
	$image = mysql_query("SELECT * FROM imagelist WHERE background = 1 and productid = $productid LIMIT 1");
	$imageurl = '';
			
	while($row3 = mysql_fetch_array($image)) {
		$imageurl = '../../images/products/' .$productid. '/' .$row3['imageurl']. ''; 
	};

	ini_set('display_errors',1); 
 error_reporting(E_ALL);

	?>	   
								
		<!--
				<div class="productcategory" style="float: right !important; margin-bottom: 0; border-right: none; border-left: solid 10px white;">
				
				-->
				
	<div class="productsection">
	
		<div class="divider"></div>
	
		<div class="product40" style="width: 30%;">
		
			<?php
			// Track how many images have been made so that they have unique id's.
			$iteration = 1;
			if ($imageresults != 0) {
				while($row = mysql_fetch_array($imagelist)) {
					print '<div class="imageholder" style="background-image: url(
					/images/products/' .$productid. '/';  	
					
						if($row['imageurl'] == "") echo "noproductimage.png";
						else echo $row['imageurl'];
							
						echo ')"></div>';
					
					$iteration++;
				}	
			}
			else echo '<img id="productimage" src="/images/products/noproductimage.png" alt="No Product Image Available" />';
			
		?>

		</div>
		
		<div class="product60" style="width: 70%;">
		
			<span class="subtitle"><?php echo $subtitle; ?></span>
			<div class="minidivider"></div>
			<p><?php echo $longdescription ?></p>
			<div class="divider"></div>
			
			<div class="selectionarea">
					<?php 
						/*
						if($quantity > 9)
							$status = '<p><b>In Stock</b>. All prices include VAT. <div class="mobileshow">Select a volume:</div></p>';
						else if($quantity > 0)
							$status = '<p><b>Only ' .$quantity. ' left in stock - order soon.</b> All prices include VAT.  <div class="mobileshow">Select a volume:</div></p>';
						else
							$status = '<p><b>Out of Stock</b>. Check back soon.</p>';
		
						if($volumesavailable != 0) {
						
							echo $status;
							
						if($quantity > 0) {	
						
							echo '<div class="divider"></div>';
							
							echo '<div class="mobilehide"><div class="indicator"><span class="playsymbol">4</span> SELECT VOLUME</div></div>';
						
							$volumeCount = 0;
							while($volumerows = mysql_fetch_array($volumeinfo)) {
								
								if ($volumerows['PricePerUnit'] == '0') $volprice = 'POA';
								else $volprice = $volumerows['PricePerUnit'];
								
								
									echo '<a href="#" id="basketlink"
					    class="snipcart-add-item newbuttons"
					    data-item-id="' .($productid . '-' . $volumerows['VolumeName']). '"
					    data-item-name="' .($productname . ' ' . $volumerows['VolumeName']). '"
					    data-item-price="' .$volumerows['PricePerUnit']. '"
					    data-item-weight="20"
					    data-item-max-quantity="' .$quantity. '" 
					    data-item-url="http://cspprofessional.com/products/product/' .$productid. '"
					    data-item-description="' .$longdescription. '">';
				    				print $volumerows['VolumeName']; print ' <div class="divider"></div><span class="subtitle" style="color: white !important">£'; 
				    		
						    		// Check whether currency is already GBP:
						    		if ($row['currencycode'] == 'GBP') {
						    			echo $volprice;
						    		}
						    		else {
						    			echo $volumerows['PricePerUnit']; 
						    		}
				    		
						    		print '</span>';
						    	
						    		print '</a>';
					    		
					    		}
								
								$volumeCount++;
								
							}	
							
							//echo '<img id="hello" src="/images/csp.png">';
							
												
				
							 //echo '<a href="#" class="newbuttons" onclick=document.getElementById("hello").src='; echo "'landscape.jpg'"; echo '>TEST</a>';
							 
							 //echo '<a href="#" class="newbuttons" onclick=document.getElementById("basketlink").data-item-name='; echo "'landscape.jpg'"; echo '>TEST</a>';
						}
						else {
							// There are no volumes of this product available, so show message:
							echo '<p>Product currently unavailable</p>';
							}
						
						*/
		    	
			    	?>
			    	
			    	<div class="clear"></div>
			    	
			    	<div class="divider"></div>

					<!-- <p><img src="/images/Truck.png" width="30" height="20" /> Delivered in 3-5 days in the UK. <a href="#">Delivery Information</a></p> -->

			</div>
		</div>
	</div>
	
	<div class="divider"></div>			
						
		
	<div class="productsection">
		
		<div id="tabs">
		<ul>
			<li><a href="#tabs-1" title="">Videos</a></li>
			<li><a href="#tabs-2" title="">Guide</a></li>
			<li><a href="#tabs-3" title="">Reviews</a></li>
		</ul>

		<div id="tabs_container">
			

			<div id="tabs-1">
			
			<?php if ($videolink != '') {
				
				echo '<iframe id="fade" width="288" height="172" style="float: right; margin-bottom: 10px;" src="//www.youtube.com/embed/' .$videolink. '?html5=1?modestbranding=1&showinfo=0" frameborder="0" allowfullscreen></iframe>';
				//echo '<div class="fullwidth" style="width: 306px; height: auto; float: right; margin: 10px 10px 0 0;"><a href="http://www.youtube.com/watch?v=' .$videolink. '">Watch on YouTube</a></div>';
					}
				?>			

			</div>

			<div id="tabs-2">
				   
				<p>
				<?php
				
					if($directions != '')
						echo $directions;
					else
						echo 'No directions have been supplied for this product.';
				
				?>
				</p> 
		
			</div>

			<div id="tabs-3">
				    
				   <p><?php if($num_results == 0) { print 'There are currently no reviews for this product.'; } ?></p>
			  	
			  		<?php while($row = mysql_fetch_array($productreviews)) {
	
						print '<h4>' .$row['reviewname']. '</h4>';
						print '<p>' .$row['reviewtext']. '</p><br />';
					}
	
					?>
 
			</div>

		</div><!--End tabs container-->
		
	</div><!--End tabs-->

	
	
	
	</div>	
		
				
						
		 
		
		
		<!--
		<div class="productshare">
			<span class='st_facebook_hcount' displayText='Facebook'></span>
			<span class='st_twitter_hcount' displayText='Tweet'></span>
			<span class='st_pinterest_hcount' displayText='Pinterest'></span>
			
			<div class="madeintheuk">
				<span class="mobilehide"><p><img src="../../images/icon_flag_uk.gif" /> Made in the UK</p></span>
			</div>
		</div>
		-->
		
		
		<div class="clear"></div>
		
	</div>
	<?php include '../files/footer.php'; // see top of page about directories.?>
</body>

</html>
