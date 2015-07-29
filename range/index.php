<?php
	$titletext = 'Available for enquiries 9am - 7pm, Monday to Friday';
	$yshift = -200;
	$xshift = 0;
	//$pagetitle = 'CSP Store';

	$store = true;
	
	include '../files/header.php'; 
	
	if(!$categories = $db->query("SELECT * FROM category")){
    die('There was an error running the query [' . $db->error . ']'); }
?>
<!--
<iframe class="mobilehide" src="//users.instush.com/collage/?cols=12&rows=3&sl=false&user_id=471189005&username=cspdetailing&sid=-1&susername=-1&tag=-1&stype=mine&bg=transparent&space=true&rd=true&grd=true&gpd=6&drp=false&pin=false&t=999999a_WYBdtsFeYqezOFP8hiRdQHJ4yHIQWflZCKzpyyswzvWuH6l2-v-nhRNidRq4uBFd0R2XWpWIs" allowtransparency="true" frameborder="0" scrolling="no"  style="display:block;width:1200px;height:527px;border:none;overflow:visible; margin-bottom: -110px;" ></iframe>
-->

<!--
<script src="https://snapwidget.com/js/snapwidget.js"></script>
<iframe src="https://snapwidget.com/in/?u=Y3NwZGV0YWlsaW5nfGlufDEyNXw0fDF8fG5vfDV8bm9uZXxvblN0YXJ0fHllc3x5ZXM=&ve=220415" title="Instagram Widget" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%;"></iframe>
-->


	<div class="div100 centre" style="background: rgba(0,99,150,0.7); color: white; padding: 120px 20px; position: relative;">
		
		<div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; background: url(/images/rsz_dave-detailing.jpg); z-index: -1; opacity: 0.9; background-size: cover; background-position-y: 25%;">
		
		</div>
		

		<div class="canvas" style="z-index: 1;">
		
			<div class="div100">
				<h1>Launch Range is Now <b>Live</b></h1>
				<div class="line"></div>
				<h5 ><i class="fa fa-bullseye fa-fw" style="margin-right: 10px"></i>Don't forget your discount code.</h5>
			
			</div>
			
			<div class="div40" style="display: none;">
			
				<!-- Begin MailChimp Signup Form -->
				<link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
				<style type="text/css">
					#mc_embed_signup{font:16px 'Lato', sans-serif; }

					#mc_embed_signup form { text-align: center; }
					
					#mc_embed_signup input.button { margin: 0 auto !important; background: #5e5e5e; }
					
					#mc_embed_signup input.email { padding: 10px; margin: 0 auto; margin-bottom: 20px; min-width: 90%; color: #5e5e5e; border-color: #5e5e5e; }
					
				</style>
				<div id="mc_embed_signup">
				<form action="//cspprofessional.us3.list-manage.com/subscribe/post?u=af1181b71b5540011d1fc86c9&amp;id=0224a78791" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div id="mc_embed_signup_scroll">
					
					<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" style="border: none; border-radius: 3px;" required>
					<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					<div style="position: absolute; left: -5000px;"><input type="text" name="b_af1181b71b5540011d1fc86c9_0224a78791" tabindex="-1" value="" ></div>
					<div class="clear">
						<input type="submit" value="SUBSCRIBE" name="subscribe" id="mc-embedded-subscribe" class="button" style="background: white; color: rgba(0,99,150,0.7); border-radius: 40px; font: 400 16px 'Oswald'; padding: 5px 25px; height: auto; width: auto; ">
					</div>
					</div>
				</form>
				</div>

				<!--End mc_embed_signup-->

			</div>
		
		</div>
		
	</div>

<div class="clear"></div>

<!-- CSP Pre-Sale here -->

<style>
	.windowlink {
		background-color: transparent !important;
	}
	.special-offer-link {
		color: black !important;
	}
</style>

<div class="subheading" style="margin: 2vh 0 0 0; padding: 20px 0;">
	<h2>Launch 500ml Range</h2>
</div>




<!-- 500ml --->

<a name="Launch500mls"></a>
<div class="canvas downspace" style="padding-top: 30px;">

<?php
	if(!$productquery = $db->query("SELECT * FROM product LEFT JOIN price ON price.product = product.id WHERE specialOffer = 1 AND (product.category = 'Exterior' OR product.category = 'Nano Protection' OR product.category = 'Wheels' OR product.category = 'Interior')")){
        		die('There was an error running the query [' . $db->error . ']'); }
				
				
	while($prodrow = $productquery->fetch_assoc()) {
		
		$bundleCheck = false;
		if(checkIfBundle($prodrow['id'])) {
			if(!checkBundleChildren($prodrow['id'])) {
				$bundleCheck = true;
			}
		}
		
		if($prodrow["quantity"] == 0 || $bundleCheck) {
			$stockState = "<div style='position: absolute; top: 0; bottom: 0; left: 0; right: 0; background: rgba(255,255,255,0.7); padding-top: 35%; text-align: center;'>
				<i class='fa fa-times fa-lg fa-2x dim mb2'></i>
				<h3 class='centre thin'>Out of stock</h3>
			</div>";
		}

		echo '
		    <div class="div20" style="position: relative;">
		        <div id= "' .$prodrow["id"].'-image" class="downspace0 gridbox" style="background-image: url(/images/products/' .$prodrow["id"]. '/' .$prodrow["mainimg"]. ');">
		            <a id="' .$prodrow["id"]. '" class="windowlink" href="/range/product/' .$prodrow["id"]. '/"></a>
		        </div>
				<h4 class="centre dim thin" style="font-size: 15px">
				<div class="line"></div>
				£' .$prodrow["price"]. '</h4>
		        <h4 class="prodlabel centre downspace0" style="margin-top: 5px;"><a class="special-offer-link" href="/range/product/' .$prodrow["id"]. '/">'.$prodrow["name"]. '</a></h4>
				' . $stockState . '
		    </div>';

		$stockState = '';

	}
			
?>
	
</div>

<div class="clear"></div>



<!-- Polish --->

<a name="LaunchPolish"></a>

<div class="subheading" style="margin: 2vh 0 0 0; padding: 20px 0;">
	<h2>Launch Polishing System</h2>
</div>

<div class="canvas downspace" style="padding-top: 30px;">

<?php
	if(!$productquery = $db->query("SELECT * FROM product LEFT JOIN price ON price.product = product.id WHERE specialOffer = 1 AND (product.category = 'Polish' OR product.category = 'Pads+Applicators') ")){
        		die('There was an error running the query [' . $db->error . ']'); }
				
				
	while($prodrow = $productquery->fetch_assoc()) {
		
		if($prodrow["quantity"] == 0) {
			$stockState = "<div style='position: absolute; top: 0; bottom: 0; left: 0; right: 0; background: rgba(255,255,255,0.7); padding-top: 35%; text-align: center;'>
				<i class='fa fa-times fa-lg fa-2x dim mb2'></i>
				<h3 class='centre thin'>Out of stock</h3>
			</div>";
		}

		echo '
		    <div class="div20" style="position: relative;">
		        <div id= "' .$prodrow["id"].'-image" class="downspace0 gridbox" style="background-image: url(/images/products/' .$prodrow["id"]. '/' .$prodrow["mainimg"]. ');">
		            <a id="' .$prodrow["id"]. '" class="windowlink" href="/range/product/' .$prodrow["id"]. '/"></a>
		        </div>
				<h4 class="centre dim thin" style="font-size: 15px">
				<div class="line"></div>
				£' .$prodrow["price"]. '</h4>
		        <h4 class="prodlabel centre downspace0" style="margin-top: 5px;"><a class="special-offer-link" href="/range/product/' .$prodrow["id"]. '/">'.$prodrow["name"]. '</a></h4>
				' . $stockState . '
		    </div>';

		$stockState = '';

	}
			
?>
	
</div>

<div class="clear"></div>






<!-- Professional Range --->

<div class="subheading" style="margin: 2vh 0 0 0; padding: 20px 0; display: none;">
	<h2>Professional Range</h2>
</div>

<div class="canvas downspace" style="padding-top: 30px; display: none;">

<?php
	if(!$productquery = $db->query("SELECT * FROM product LEFT JOIN price ON price.product = product.id WHERE specialOffer = 1 AND product.category = 'PRO Detailer' ")){
        		die('There was an error running the query [' . $db->error . ']'); }
				
				
	while($prodrow = $productquery->fetch_assoc()) {
		
		if($prodrow["quantity"] == 0) {
			$stockState = "<div style='position: absolute; top: 0; bottom: 0; left: 0; right: 0; background: rgba(255,255,255,0.7); padding-top: 35%; text-align: center;'>
				<i class='fa fa-times fa-lg fa-2x dim mb2'></i>
				<h3 class='centre thin'>Out of stock</h3>
			</div>";
		}

		echo '
		    <div class="div20" style="position: relative;">
		        <div id= "' .$prodrow["id"].'-image" class="downspace0 gridbox" style="background-image: url(/images/products/' .$prodrow["id"]. '/' .$prodrow["mainimg"]. ');">
		            <a id="' .$prodrow["id"]. '" class="windowlink" href="/range/product/' .$prodrow["id"]. '/"></a>
		        </div>
				<h4 class="centre dim thin" style="font-size: 15px">
				<div class="line"></div>
				£' .$prodrow["price"]. '</h4>
		        <h4 class="prodlabel centre downspace0" style="margin-top: 5px;"><a class="special-offer-link" href="/range/product/' .$prodrow["id"]. '/">'.$prodrow["name"]. '</a></h4>
				' . $stockState . '
		    </div>';

		$stockState = '';

	}
			
?>
	
</div>

<div class="clear"></div>









<?php
	while($catrow = $categories->fetch_assoc()){
		// for each row, run a query where ^^ and do it's own while.

		if(!$productquery = $db->query("SELECT * FROM product WHERE category = '" .$catrow['name']. "'")){
        		die('There was an error running the query [' . $db->error . ']'); }


        // If there are no products in this category, skip this loop:
		if($productquery->num_rows == 0) continue;
		
		// If this category is currently hidden, skip this loop:
		if($catrow['hidden'] == '1') continue;

		// Otherwise, write category to page:
		$catname = str_replace(' ', '', $catrow['name']);
		
		echo '<a name="'.$catname.'"></a><div class="subheading" style="opacity: 0.5">' .$catrow['name']. '</div>';
		echo '<div class="canvas downspace">';

		while($prodrow = $productquery->fetch_assoc()){
		    echo '
		    <div class="div20" style="opacity: 0.5">
		        <div id= "' .$prodrow["id"].'-image" class="image downspace0 gridbox" style="background-image: url(/images/products/' .$prodrow["id"]. '/' .$prodrow["mainimg"]. ');">
		            <a id="' .$prodrow["id"]. '" class="windowlink" href="/range/product/' .$prodrow["id"]. '/"></a>
		        </div>
		        <h4 class="prodlabel centre downspace0"><a class="blanklink" href="/range/product/' .$prodrow["id"]. '/">'.$prodrow["name"]. '</a></h4>
		    </div>
		    <script>
                $( "#' .$prodrow["id"]. '" ).hover(function() {
                        $(this).fadeTo( 500 , 0.5, function() {});
                    }, function() {
                        $(this).fadeTo( 500 , 1, function() {});
                    }
                );
		    </script>';
		}
		echo '</div> <div class="clear"></div>';
	}

?>
<?php include '../files/footer.php'; ?>