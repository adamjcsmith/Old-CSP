<?php

	//error_reporting(E_ALL);
    //ini_set('display_errors', 1);
	
	$catpage = 'Products';
	$subpage = 'Exterior Collection';
	$catlink = '/range/';
	
	$productid = $_GET["id"];
	
	//$bannerurl = '/images/backgrounds/warehouse.jpg';
	//$titletext = "testing";
	$yshift = -300;
	$xshift = 0;

	$store = true;
	
	include '../files/php/functions.php';
	
	$pagetitle = getProductName($productid);

    //$pagetitle = "Testing";
	
	include '../files/header.php';  // Use '../../files/header.php' if the product directory is beyond /product/
	include '../files/currencyconverter.php'; // Same as above
		
	// As a failsafe, check when the last currency table was updated:

	$x = new CurrencyConverter('localhost','cspprofe_csp','adamlancaster2013','cspprofe_main','currencytable');
	
 	// Connect to the Database.
	$dbhandle = mysql_connect("localhost", "cspprofe_csp", "adamlancaster2013") or die("Unable to connect to MySQL");
	mysql_set_charset('utf8',$dbhandle);
	$selected = mysql_select_db("cspprofe_products",$dbhandle) or die("Could not select products");
	
	// Get product information from database and assign to variables.
	$productdetails = mysql_query("SELECT * FROM product WHERE id = $productid");
	
	// Get volume information.
	$volumeinfo = mysql_query("SELECT DISTINCT price.product, price.volume, price.price, price.quantity, volume.type FROM volume, price, product WHERE (price.product = $productid) AND (price.volume = volume.amount)");
	$volumesavailable = mysql_num_rows($volumeinfo);
	
	// Find the smallest priced volume (for 'Available from:'):
	$minpricequery = mysql_query("SELECT MIN(price) as minprice FROM price, product WHERE (price.product = $productid)");






	$numberofprices = mysql_num_rows($minpricequery);
	
	while($minpriceloop = mysql_fetch_array($minpricequery)) {
		$minimumprice = $minpriceloop['minprice'];
	}
	
	
	// Extract data from query:
	while ($row = mysql_fetch_array($productdetails)) {   
		$productname = $row['name'];
		$longdescription = $row['description'];
		//$videolink = $row["videolink"];
		$subtitle = $row['subtitle'];
		$directions = $row['directions'];
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

	?>


				

		
		
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


		<h1 class="dim thin upspace2 centre"><?php echo $productname; ?></h1>

        <!--
		<div class="floatright upspace2 mobilehide">
		    <h5 class="dim">From £<?php echo $minimumprice; ?></h5>
		</div>
		-->

		<div class="clear"></div>

		<!-- <h5 class="cspblue"><?php echo $subtitle; ?></h5> -->

        <!-- Image List -->
        <div class="div50 upspace2" style="padding-left: 0;">
         <ul class="bxslider">

         <?php

          $filenumber = 0;



               try {
                    $dir = new DirectoryIterator("../images/products/".$productid."/");
                    foreach ($dir as $fileinfo) {
                        if (!$fileinfo->isDot()) {
                            $filenumber += 1;
                            echo "<li><img src='/images/products/" .$productid. "/" . $fileinfo->getFilename() . "' /></li>";
                        }
                    }
               }
               catch(Exception $e) {
                    // If there's no images, echo placeholder:
                    if($filenumber == 0) echo '<li><img src="/images/products/noproductimage.png" /></li>-->';
               }






         ?>

        </ul>

        <div id="bx-pager">
            <?php
               $iterator = 0;

                try {
               $dir = new DirectoryIterator("../images/products/".$productid."/");
                foreach ($dir as $fileinfo) {
                    if (!$fileinfo->isDot()) {
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

        <div class="div50 upspace2">
            <h5 class="dim"><?php echo $longdescription; ?></h5>
            <div class="linelight"></div>

            <?php


            echo '<h6 class="dim" style="display: inline-block;">From <span class="cspblue">£'.$minimumprice.'</span></h6>
                  <h5 class="dim">Choose a volume to buy:</h5>

                    <div class="canvas centre upspace">';



            while ($row = mysql_fetch_array($volumeinfo)) {

             echo '

                 <div id="dd" class="wrapper-dropdown-3" tabindex="1">
                     <span>Transport</span>
                     <ul class="dropdown">
                         <li><a href="#"><i class="icon-envelope icon-large"></i>Classic mail</a></li>
                         <li><a href="#"><i class="icon-truck icon-large"></i>UPS Delivery</a></li>
                         <li><a href="#"><i class="icon-plane icon-large"></i>Private jet</a></li>
                     </ul>
                 </div>



             ';





              echo '<div id="'.$productid.'" class="div33 box centre">
                                    <h6>'. formatVolume($row["volume"]) .'</h6>
                                    <h5>'.$row["type"].'</h5>
                                    <div class="line"></div>';


                                    if($row["quantity"] != 0) { echo '


                                    <h6 class="cspblue">£' . $row["price"] . '</h6>
                                    <a href="#"
                                        class="snipcart-add-item windowlink"
                                        data-item-id="'.$productid. '-' .$row["volume"].'"
                                        data-item-name="' .$productname .' (' . formatVolume($row["volume"]) . ')"
                                        data-item-price="' .$row["price"]. '"
                                        data-item-weight="20"
                                        data-item-url="http://www.cspprofessional.com/range/products/'.$productid.'"
                                        data-item-description="'. formatVolume($row["volume"]).' '. $row["type"].' version.">
                                    </a>';

                                    }
                                    else {
                                        echo '<h6 class="soldout">Sold Out</h6>';

                                    }

                   echo '</div>


                    <script>
                           $( "#' .$productid. '" ).hover(function() {

                                   $(this).animate({backgroundColor:"#006296"}, 1000);
                               }, function() {
                                   $(this).animate({backgroundColor:"white"}, 1000);
                               }

                           );
                    </script>

                    ';
            }


            ?>
            </div>

            <div class="clear"></div>

            <div class="linelight upspace"></div>
            <h5 class="dim" style="display: inline-block;">Don't forget your <span class="cspblue">essentials</span>:</h5>

            <div class="canvas">

                <div class="div60 extrabox upspace">
                    <h5><a href="/">CSP Mixing Bucket</a></h5>
                    <h5 class="dim">Dilute concentrates with ease.</h5>
                </div>

                <div class="div40 box upspace centre"><h6 class="dim">£3.99</h6></div>

            </div>

            <div class="clear"></div>

            <div class="linelight"></div>

            <div class="canvas">

                <img src="/images/csp3.png" height="25px" style="float: left; margin-right: 10px; -webkit-filter:grayscale(100%);">

                <h5 class="dim" style="float: left;">Formulated, bottled and packed by CSP.  Guaranteed for quality.</h5>
                <div class="line"></div>
                <h5 class="dimmer">Delivered within 2-3 business days within the UK.</h5>

            </div>

            <div class="linelight"></div>



        </div>

        <div class="clear"></div>

        <div class="line"></div>
        <h6 class="dim">Videos</h6>

        <div class="js-lazyYT" data-youtube-id="LP8TxWhutf8" data-width="100%" data-height="300"></div>


	<?php include '../files/footer.php'; // see top of page about directories.?>


	    <script>
	        $(document).ready(function(){
                $('.bxslider').bxSlider({

                <?php
                    // Only flick through screens if there's multiple images:
                    if($filenumber > 1) echo "auto: true, touchEnabled: false,";
                    else echo "mode: 'fade',";
                ?>

                pagerCustom: '#bx-pager',
                controls: false,
                pause: 10000,
                speed: 800,
                autoHover: true
                });
            });
	    </script>
</body>

</html>
