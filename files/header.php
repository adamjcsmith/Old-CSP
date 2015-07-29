<?php	
	
	// Page Titles:
	if(isset($pagetitle)) $title = $pagetitle . " - CSP Detailing";
	else $title = "CSP Detailing";

	// Pre-Declarations:
	$selected; $catpage; $catlink; $subpage; $titletext; $bannerurl; $pagetitle; $stretch; $yshift; $xshift;
	
	// Check if the shifts have been set:
	if(empty($yshift)) $yshift = '0'; if(empty($xshift)) $xshift = '0';
	
	// Force HTTPS:
	if($_SERVER["HTTPS"] != "on") {
		header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
		exit();
	}

?>
<!doctype html>

<head>

	<title><?php echo $title; ?></title>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
	<meta name="description" content="#ScientificallyAdvanced">
	<meta name="keywords" content="csp detailing, clean shine protect, clean, shine, protect, csp professional, car detailing, car valeting, car valet, car detail, paintwork, elite, detailing, interior car detailing, car restoration, prestige car detailing, scratch removal, swirling, swirl mark removal, auto detailing, Zaino, Swisswax, Sonus, P21S wax, R222 car care, 303 aerospace protectant, holograming, oxidation, Birmingham detailing, midlands detailing, london detailing, north west detailing, surrey detailing, uk car detailing, machine polishing, paint correction, Best detailer in the world">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	
	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="57x57" href="/files/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/files/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/files/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/files/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/files/favicons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/files/favicons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/files/favicons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/files/favicons/apple-touch-icon-152x152.png">
	<link rel="icon" type="image/png" href="/files/favicons/favicon-196x196.png" sizes="196x196">
	<link rel="icon" type="image/png" href="/files/favicons/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="/files/favicons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/files/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="/files/favicons/favicon-32x32.png" sizes="32x32">
	<meta name="msapplication-TileColor" content="#2d89ef">
	<meta name="msapplication-TileImage" content="/files/favicons/mstile-144x144.png">

	<!-- Fonts --> 
	<link href="//fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet" type="text/css">
	<link href='//fonts.googleapis.com/css?family=Oswald:300,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">	
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="/files/styles/base.css">
	<link rel="stylesheet" href="/files/menu/tinydropdown.css">
	<link rel="stylesheet" href="/files/LazyLoadYT/lazyYT.css">
	<link rel="stylesheet" href="/files/DropdownBox/css/style.css">
	<link type="text/css" id="snipcart-theme" href="https://app.snipcart.com/themes/base/snipcart.css" rel="stylesheet" />
	<link href="/files/bxslider/jquery.bxslider.css" rel="stylesheet" />		
	<link rel="stylesheet" href="/files/mobile.css">
	<link rel="stylesheet" href="/files/styles/snipcart-overrides.css">
	
	<!-- jQuery and JavaScript -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
	<script type="text/javascript" id="snipcart" src="https://cdn.snipcart.com/scripts/snipcart.js" data-autopop="true" data-api-key="MWUyNTcwZGQtNDFmMi00MGUwLWFjYjEtYWJkZjE3MjRiZGU3"></script>	
	<script type="text/javascript" src="/files/menu/tinydropdown.js"></script>
	<script type="text/javascript" src="/files/LazyLoadYT/lazyYT.js"></script>
	<script src="/files/readmore/readmore.min.js"></script>
	<script src="/files/bxslider/jquery.bxslider.min.js"></script>		
	<script src="/files/csp.js" type="text/javascript"></script>	
	<script src="/files/fastclick.js"></script>		
	<script src="/files/jquery.lazyload.js" type="text/javascript"></script>
	
	
	<!--Start of Zopim Live Chat Script-->
	<!--
	<script type="text/javascript">
		window.$zopim||(function(d,s){var z=$zopim=function(c){
		z._.push(c)},$=z.s=
		d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
		_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
		$.src='//v2.zopim.com/?3A2nLjB9RZ65ppc4B0ZOrjoHpySvuuHE';z.t=+new Date;$.
	type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
	</script>
	-->
	<!--End of Zopim Live Chat Script-->
	
	<?php
		$productname;
		$longdescription;
		$productid;
		$minimumprice;
	?>
	
	<!-- Includes -->
	<meta property="og:title" content="<?php echo $productname; ?>" />
	<meta property="og:description" content="<?php echo str_replace("..", ". ", str_replace("<br><br>", ". ", $longdescription)); ?>" />
	<meta property="og:site_name" content="CSP Detailing System"/>
	<meta property="og:type" content="product" />
	<meta property="og:url" content="https://www.cspdetailing.com/range/product/<?php echo $productid; ?>" />
	<meta property="og:image" content="https://www.cspdetailing.com/images/products/<?php echo $productid; ?>/<?php echo $mainimage;?>" />
	
</head>
	
<body>
	
	<div id="newCSPMenu" class="centre">
	
		<div class="menuDiv50" style="width: 51.5%; padding-right:3%;">	
			<a href='/join/'><li><i class="fa fa-users fa-fw ind"></i> Join Team CSP</li></a>
			<a href='/training/'><li><i class="fa fa-magic fa-fw ind"></i>Training</li></a>
			<a href='/detailedby/'><li><i class="fa fa-star fa-fw ind"></i> Detailed By</li></a>				
		</div>
		<div class="menuDiv50" style="width: 48.5%;">

			<a href='/branches/'><li><i class="fa fa-home fa-fw ind"></i> Branches</li></a>
			<a href='/contacts/'><li><i class="fa fa-envelope fa-fw ind"></i> Contacts</li>	</a>			
			<li><i class="fa fa-shield fa-fw ind"></i> Services</li>				
		</div>
		
		<div class="clear"></div>
		
		<hr style="margin-left: 0; margin-right: 0; margin-bottom: 10px;">
		
		<a href='/range/'><li class="centre"><i class="fa fa-shopping-cart fa-fw ind"></i> CSP Store</li></a>
			
		<hr style="margin-left: 0; margin-right: 0; margin-top: 10px;">

	</div>	
	
	<a class="mobileshow" style="cursor: pointer; position: relative; height: 45px; width: 45px; float: right; padding: 16px; color: #006396; z-index: 1000;" onclick="$('#newCSPMenu').fadeToggle(300);">
		<i class="fa fa-bars fa-lg"></i>
	</a>
	
	<div id="headwrap">
		<div id="header">
			<div id="headercontent">
				<a href="/"><img src="/images/csp3.png" id="logo" alt="CSP"></a>	
				<ul id="nav" class="menu mobilehide" style="float: left; height:auto;">
					<li><a href="/join/">Join Team CSP</a></li>
					<li class="'.$selectedTab.'"><a href="/range/">Range</a></li>
					<li><a href="/detailedby/">Detailed By</a></li>						
					<li><a href="/training/">Training</a></li>
					<li><a href="/branches/">Branches</a></li>
					<li><a href="/contacts/">Contact</a></li>	    		
				</ul> 			
				<div class="rightpanel mobilehide">					
					<a class="social-icons" href="https://www.facebook.com/cspdetailingsystem"><i class="fa fa-facebook-square fa-lg fa-fw"></i></a>					
					<a class="social-icons" href="https://www.twitter.com/cspdetailing"><i class="fa fa-twitter fa-lg fa-fw"></i></a>
					<a class="social-icons" href="https://www.youtube.com/c/cspdetailing"><i class="fa fa-youtube-square fa-lg fa-fw"></i></a>
					<a class="social-icons" href="https://www.instagram.com/cspdetailing"><i class="fa fa-instagram fa-lg fa-fw"></i></a>
				</div>	        	
				<div class="clear"></div> 
			</div>	
		</div>
	</div>
	
	<div class="clear"></div>
		
<?php

	// Customised page headers:
	if(isset($contactmode))	include '../files/contact.php';
	if(isset($store)) include '../files/store.php';	

	// Generic Page titles:
	if(isset($pagetitle)) {
      if(isset($bannerurl) && !isset($contactmode)) {
		echo '<div class="pagebannerbg mobilehide" style="background:url(' .$bannerurl. '); background-position: center '.$yshift.'px;">
					<div class="pagebanner">
					</div>
				</div>
				<div class="clear"></div>';
		}

		echo '
		<div class="centre cspblue mt5 mb5">
				<h1>' .$pagetitle. '</h1>
		</div>';
	}

?>

	<div id="container">

<?php if(!isset($home)) { echo '		<div id="contentbox">'; } ?>

	<div class="clear"></div>