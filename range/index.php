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

	<div class="div100 centre" style="background: rgba(0,99,150,0.7); color: white; padding: 20px;">
		

		<div class="canvas">
		
			<div class="div60">
				<h2>Launching Soon</h2>
				<div class="line"></div>
				<h5><i class="fa fa-bullseye fa-fw" style="margin-right: 10px"></i>Register for New Product Samples, Special Offers and Latest News</h5>
			
			</div>
			
			<div class="div40">
			
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
		
		echo '<a name="'.$catname.'"></a><div class="subheading">' .$catrow['name']. '</div>';
		echo '<div class="canvas downspace">';

		while($prodrow = $productquery->fetch_assoc()){
		    echo '
		    <div class="div20">
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