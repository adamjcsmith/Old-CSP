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

	while ($row = mysql_fetch_array($productdetails)) {
		$productname = $row['name'];
		$longdescription = $row['description'];
		//$videolink = $row["videolink"];
		$subtitle = $row['subtitle'];
		$directions = $row['directions'];
	}
	
	// Get volume information.
	$volumeinfo = mysql_query("SELECT DISTINCT price.product, price.volume, price.price, price.quantity, volume.type FROM volume, price, product WHERE (price.product = $productid) AND (price.volume = volume.amount)");
	$volumesavailable = mysql_num_rows($volumeinfo);
	
	// Find the smallest priced volume (for 'Available from:'):
	$minpricequery = mysql_query("SELECT MIN(price) as minprice, type, volume FROM price, product, volume WHERE (price.product = $productid) AND (price.volume = volume.amount)");
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

        <!-- Add the default product details -->
		<?php echo '<script>
		                productTitle = "'. $productname .'";
		                productVolume = '.$minimumvolume.';
		                productType = "'.$minimumtype.'";
		                productPrice = "'.$minimumprice.'";
		                productID = "'.$productid.'";
		           </script>' ?>


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

		<!--
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
		-->

        </div>

        <div class="div50 upspace2">
            <h5 id ="descriptionblock" class="dim">
				<?php 
				
				//$tasterdescription = substr($longdescription, 0, 30);
				
				echo $longdescription; ?>
			</h5>
            <div class="linelight"></div>

            <?php


            echo '<h6 class="dim" style="display: inline-block;">From <span class="cspblue">£'.$minimumprice.'</span></h6>

                    <div class="canvas centre upspace">';

                    echo '<div id="dd" class="wrapper-dropdown-3" tabindex="1">
                                               <span>'.formatVolume($minimumvolume).' '.$minimumtype.' - £'.$minimumprice.'</span>
                                               <ul class="dropdown">';



            while ($row = mysql_fetch_array($volumeinfo)) {

             echo '
                         <li><a href="#"><i class="icon-large"></i>'.formatVolume($row["volume"]).' '.$row["type"].' - £'.$row["price"].'</a></li>
                         <script>
                            // Add to Array
                            options.push({"volume":'.$row["volume"].', "type":"'.$row["type"].'", "price":'.$row["price"].' });
                         </script>

             ';

            }

            echo '</ul></div>

            <div id="addtobasket" class="addtobasket" onclick="addToBasket();">Add to Basket</div>
            ';



            ?>
            </div>

            <div class="clear"></div>

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


        <h6 class="dim downspace2 upspace2 headline">Directions for Use</h6>

        <div id= "directionsblock" class"canvas">

            <h5 class="dim"><?php echo $directions ?></h5>

        </div>

        <?php
        while($reviewresults = mysql_fetch_array($reviews)) {

            echo '';

        }

        ?>



        <h6 class="dim downspace2 upspace2 centre headline">In Action</h6>

        <?php

            $videowidth = (100 / $num_videos);

            if($videowidth < 33) $videowidth = 33;

            while($videoresults = mysql_fetch_array($videos)) {
                echo '<div class="js-lazyYT inline-block" data-youtube-id="' . $videoresults["url"] . '" data-width="'.$videowidth.'%" data-height="260"></div>';
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
