<?php 
	$bannerurl = '/images/backgrounds/Manchester-Map.png';
	$titletext = 'Available for enquiries 9am - 7pm, Monday to Friday';
	$yshift = -450;
	$xshift = 0;
	$pagetitle = 'Contacts';
	
	$contactmode = true;
	
	include '../files/header.php'; 
		
	ini_set('display_errors',1); 
 	error_reporting(E_ALL);
 
	if(isset($_GET['check'])) {
		
		echo '<div class="textbox centre">Thanks for your enquiry.  We aim to respond to business enquiries within the same working day.</div>
		
		<div class="line"></div>';
	}
?>	
	<div class="canvas">
		<div class="div40">
			<h5><b class="rightspace">Telephone</b>08702 07 08 09</h5>	
			<div class="line"></div>
			<h5><b class="rightspace">Email</b>sales@cspdetailing.com</h5>
			<div class="line"></div>	   		
			<h5 class="dim downspace">Strictly by appointment only</h5>
			<h5>CSP Detailing</h5>
			<h5>Westbrook Park</h5>
			<h5>Trafford Park Road</h5>
			<h5>Manchester</h5>
			<h5>M17 1AY</h5>
			<h5>United Kingdom</h5>
			<div class="line mobileshow"></div>  	
		</div>
		<div class="div60">
			<div class="contact-area">
				<form method="post" action="contactengine.php">
					<input type="text" name="Name" id="Name" placeholder="Name" />
					<input type="text" name="Tel" id="Tel" placeholder="Telephone No" />
					<input type="text" name="Email" id="Email" placeholder="Email Address" />
					<textarea name="Message" rows="20" cols="20" id="Message" placeholder="Message"></textarea>
					<input type="submit" name="submit" value="Submit" class="submit-button" />
				</form>
				<div style="clear: both;"></div>
			</div>
		</div>
	</div>
	
	<div class="subheading">Head Office & Training Facility</div>
	
	<div class="section" style="/*background-image:url(/images/backgrounds/Manchester-Map.png); */">
		<div class="div40">
			<h5>We are situated in Westbrook Park, an industrial complex in the Trafford area of Manchester.</h5>
			<div class="line"></div>
			<h5>The site is just a mile from J9/J10 of the M60, or alternatively just under two miles from J2 of the M602.  The Trafford Centre, and the city centre are under three miles away.</h5>
		</div>
		<div class="div60">
			<img src="/images/backgrounds/Trafford-Map.png" alt="Map of Trafford, Manchester" />
		</div>
		<div class="clear"></div>	
	</div>
	
	<div class="subheading upspace">Distribution Centre</div> 
	
	<div class="div40">
		<img src="/images/backgrounds/Manchester-Map.png" alt="Map of Manchester" />
	</div>   						
	<div class="div60">
		<img src="/images/unit.jpg" alt="Unit" />
	</div>


	
	<div class="clear"></div>
<?php include '../files/footer.php'; ?>