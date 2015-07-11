<?php	
	$home = true;
		
	include 'files/header.php'; 
	include('files/currencyconverter.php');
	
	ini_set('display_errors',1); 
	error_reporting(E_ALL);

	// Database connection to list news articles:
	$dbhandle = mysql_connect("localhost", "cspprofe_csp", "adamlancaster2013") or die("Unable to connect to MySQL -test");
	mysql_set_charset('utf8',$dbhandle);
	$selected = mysql_select_db("cspprofe_info",$dbhandle) or die("Could not select cspprofe_info");

	$newsarticles = mysql_query("SELECT * FROM news ORDER BY articledate DESC LIMIT 1");
	$num_results = mysql_num_rows($newsarticles); 
 
?>	   

		<a href="https://plus.google.com/+Cspdetailing" rel="publisher"></a>

		<!-- Strapline & Background Video -->
		<div class="section" style="height: auto; overflow: hidden;" >
			<video muted autoplay loop poster="" id="bgvid" class="mobilehide">
				<source src="new-movie.mp4" type="video/mp4">
			</video>
			<div class="canvas centre showcase-overlay">
				<div class="showcase-container">
					<iframe width="100%" height="100%" class="mobileshow" style="margin-bottom: 5%;" src="//www.youtube.com/embed/lHmFK_zIr3A?modestbranding=1&playsinline=1&showinfo=0&rel=0&controls=0" frameborder="0" allowfullscreen></iframe>
					<h1 class=" showcase-title">CSP Detailing System</h1>
					<h3 class="showcase-subtitle">#ScientificallyAdvanced</h3>
					<a href="/contacts/" class="showcase-button">
						<i class="fa fa-phone mobilehide" style="margin-right: 10px;"></i>
						Drop us a Line	
					</a>
					<a href="/range/" class="showcase-button">
						<i class="fa fa-shopping-cart mobilehide" style="margin-right: 10px;"></i>							
						See our Range
					</a>			
					<h3 class="mobilehide" style="position: absolute; bottom: 13%; left: 0; right: 0;">
						<i class="fa fa-arrow-down" style="margin-right: 30px;"></i>						
						Scroll down for more
						<i class="fa fa-arrow-down" style="margin-left: 30px;"></i>
					<h3>
				</div>
			</div>
			<div class="clear"></div> 
		</div> 
		
		<!-- In the Press -->
		<div class="section" style="background: white; border-bottom: 0px dashed #ccc;">
			<div class="canvas" style="max-width: 1200px; margin: 0 auto;">
				<div class="div60" style="text-align: right;">
					<h1 class="upspace2 showcase-heading">CSP IN THE PRESS</h1>
					<h1 class="showcase-subtitle upspace">CSP feature in the December 14 / January 15 edition of the Manchester Chamber of Commerce Magazine.</h1>
					<h1 class="showcase-subtitle upspace">The magazine represents the largest chamber of commerce in the UK.</h1>
					<h1 class="showcase-subtitle upspace downspace">Article contents: CSP Detailing System and CSP Particle Protection System.</h1>
				</div>			
				<div class="div40" style="padding: 6%; text-align: center;">
					<a href="/files/53degrees-article.pdf"><img src="/images/homepage/Overlay2.png" class="showcase-img"></a>
					<h1 class="showcase-subtitle upspace downspace"><a class="" href="/files/53degrees-article.pdf">Click to read the full article (PDF)</a></h1>
				</div>
			</div>
		</div>	

		<!-- Sponsorship -->
		<div class="section" style="background: rgba(0,99,150,0.1); border-bottom: 0px dashed #ccc; text-align: center;">
			<div class="canvas" style="max-width: 1200px; margin: 0 auto;">
				<div class="div60">
					<h1 class="upspace2 showcase-heading">CSP SPONSORS ONE OF THE UK'S BRIGHTEST TALENTS</h1>
					<h1 class="showcase-subtitle upspace downspace" style="display: none;">Nick Moore, talented driver, is being sponsored by CSP Detailing.</h1>
					<img src="/images/homepage/nickmoorelogo.png" style="width: 60%; margin-top: 5%; margin-bottom: 3%;">	
				</div>			
				<div class="div40" style="padding: 6%; text-align: center;">
					<a href="http://www.theboltonnews.co.uk/sport/11736739.New_team_Colt_look_to_make_mark_in_motor_sport"><img src="/images/homepage/nick.jpg" style="width: 80%" class="showcase-img"></a>
					<h1 class="showcase-subtitle upspace downspace"><a class="" href="http://www.nickmooreracing.co.uk">Nick Moore Official Website</a></h1>
					<h1 class="showcase-subtitle downspace"><a class="" href="http://www.theboltonnews.co.uk/sport/11736739.New_team_Colt_look_to_make_mark_in_motor_sport">Click to read the full article</a></h1>
				</div>
			</div>
		</div>	
		
		<!-- Product Showcase -->
		<div class="section" style="background: white;">
			<div class="canvas" style="max-width: 1200px; margin: 0 auto;">
				<div class="div60 downspace2" style="text-align: right;">
					<h1 class="upspace2 showcase-heading">The Winning Formula</h1>
					<h1 class="showcase-subtitle upspace downspace2">R&D partnerships with <a class="" href="http://www.lancaster.ac.uk">Lancaster</a> and <a class="" href="http://www.liv.ac.uk">Liverpool University</a> have driven our product development from the start.</h1>
				</div>
				<div class="div40" style="padding: 6%; text-align: center;">
					<!--<div class="image showcase-bottle-image"></div>-->
					<img src="/images/Iron-Gel-Vector.png" style="height: 400px; display: none;" class="downspace2 showcase-img">
				</div>				
			</div>
		</div>
	<?php include 'files/footer.php'; ?>