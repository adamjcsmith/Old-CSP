<?php 
	$home = true;
	include 'files/header.php'; 
?>	   		

<style>
	#videoContainer { position: relative; width: 100%; padding-top: 56.25%; }
	#cspVideo { display: block; position: absolute; width: 100%; height: 100%; top: 0; }
	
	
	@media (max-width: 1060px) {
		h1 {
			font-size: 40px;
		}
		
		#front-right { right: 5% !important; }
		#front-left { left: 5% !important; }
		#front-scrollmessage { margin-top: 10px !important; }
	}
	
	@media (max-width: 880px) {
		h1 { font-size: 30px; }
		h3 { font-size: 13px; }
		#front-left a { font-size: 12px !important; }
		
		#front-strapline { font-size: 17px !important; }	
	}
	
	@media (max-width: 768px) {
		#front-right { bottom: -45% !important; left: 0 !important; right: 0 !important; color: black !important; }
		#front-left { bottom: -75% !important; left: 0 !important; right: 0 !important;}
		#front-left a { color: black !important; border-color: #ccc; }
		#videoContainer { margin-bottom: 50%; }
	}
</style>


<div id="videoContainer">
	<video id="cspVideo" preload="metadata" poster="video-poster.jpg" controls autoplay loop muted src='movie3.mp4' type='video/mp4'></video>
	<!-- <img src="/images/csp3.png" style="width: 20%; z-index: 10; position: absolute; top: 40%; left: 40%; "> -->

	<div id="front-right" class="" style="text-align: center; color: white; z-index: 10; position: absolute; bottom: 10%; right: 8%;">
		<h1>CSP DETAILING SYSTEM</h1>
		<h5 id="front-strapline" style="font-size: 25px">#ScientificallyAdvanced</h5>
	</div>
	
	<div id="front-left" class="" style="text-align: center; color: white; z-index: 10; position: absolute; bottom: 10%; left: 8%;">
		
		<a href="/contacts/" class="showcase-button" style="background-color: transparent; color: white; font-size: 18px;">
			<i class="fa fa-phone mobilehide" style="margin-right: 10px;"></i>
			Drop us a Line	
		</a>
		<a href="/range/" class="showcase-button" style="background-color: transparent; color: white; font-size: 18px;">
			<i class="fa fa-shopping-cart mobilehide" style="margin-right: 10px;"></i>							
			See our Range
		</a>
		
		<h3 id="front-scrollmessage" class="mobilehide" style="margin-top: 20px;">
			<i class="fa fa-arrow-down" style="margin-right: 30px;"></i>						
			Scroll down for more
			<i class="fa fa-arrow-down" style="margin-left: 30px;"></i>
		<h3>
		
	</div>
	
</div>


<div style="width: 100%; background: #ccc;">
	<h1>This is a test.</h1>
</div>



<?php include 'files/footer.php'; ?>