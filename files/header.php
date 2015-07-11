<?php	
	$selected;

	// Page titles:
	if(isset($pagetitle)) $title = $pagetitle . " - CSP Detailing";
	else $title = "CSP Detailing";
	
	// Database Connection:
	$db = new mysqli('localhost', 'cspprofe_csp', 'adamlancaster2013', 'cspprofe_products');
	if($db->connect_errno > 0){ die('Unable to connect to database [' . $db->connect_error . ']'); }
		
	// Pre-Declarations:
	$catpage; $catlink; $subpage; $titletext; $bannerurl; $pagetitle; $stretch; $yshift; $xshift;
	
	// Check if the shifts have been set:
	if(empty($yshift)) $yshift = '0'; if(empty($xshift)) $xshift = '0';

	if(!$result = $db->query("SELECT * FROM category")){
        die('There was an error running the query [' . $db->error . ']');
    }
	
	// Force HTTPS:
	if($_SERVER["HTTPS"] != "on") {
		header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
		exit();
	}

?>
<!doctype html class='no-js'>
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
		
		<!-- Stylesheets -->
		<link rel="stylesheet" href="/files/styles/base.css">
		<link rel="stylesheet" href="/files/mobilemenu/slicknav.css">
		<link rel="stylesheet" href="/files/menu/tinydropdown.css">
		<link rel="stylesheet" href="/files/LazyLoadYT/lazyYT.css">
		<link rel="stylesheet" href="/files/DropdownBox/css/style.css">
        <link type="text/css" id="snipcart-theme" href="https://app.snipcart.com/themes/base/snipcart.css" rel="stylesheet" />
		<link rel="stylesheet" href="/files/styles/snipcart-overrides.css">
        <link href="/files/bxslider/jquery.bxslider.css" rel="stylesheet" />		
		<link rel="stylesheet" href="/files/mobile.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		
		<!-- Fonts --> 
		<link href="//fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet" type="text/css">
		<link href='//fonts.googleapis.com/css?family=Oswald:300,400' rel='stylesheet' type='text/css'>
		
		<!-- jQuery and JavaScript -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="/files/menu/tinydropdown.js"></script>
		<script src="/files/mobilemenu/jquery.slicknav.js"></script>
		<script type="text/javascript" src="/files/LazyLoadYT/lazyYT.js"></script>
        <script type="text/javascript" id="snipcart" src="https://app.snipcart.com/scripts/snipcart.js" data-autopop="false" data-api-key="YjNmNzdiODEtM2UwZi00MjFhLWI4MmItYTI0Njc5NWVkZjk0"></script>		
		<script src="/files/readmore/readmore.min.js"></script>		
        <script src="/files/bxslider/jquery.bxslider.min.js"></script>		
		<script src="/files/csp.js" type="text/javascript"></script>	
	    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
	    <script src="/files/fastclick.js"></script>		
		
		<!--<script src="/files/modernizr.js"></script>-->		
		<!--<script type="text/javascript" src="/files/DropdownBox/js/modernizr.custom.79639.js"></script>-->
		<!--<script type="text/javascript" src="/files/NiceScroll/jquery.nicescroll.js"></script>-->
		<script src="/files/jquery.lazyload.js" type="text/javascript"></script>

		
		<!-- Temporary Menu -->
		
		<style>
			#newCSPMenu li {
				width: 100%;
				padding: 10px;
				font: 300 15px 'Oswald', sans-serif;
				list-style: none;
				text-transform: uppercase;
				background: white;
				color: #006396;
				margin-bottom: 10px;

			}
			
			.menuDiv50 {
				width: 50%;
				float: left;
			}
			
			.ind {
				margin-right: 6px;
			}
			
			#newCSPMenu li:hover, .menuDiv50 li:hover {
				background: rgba(255,255,255,0.8);
				transition: background 0.5s ease;
			}
		</style>
		 
		
		
		<div id="newCSPMenu" class="centre" style="width: 100%; z-index: 110; height: auto; background: white; color: white; padding: 0 10px; position: absolute; top: 45; left: 0; display: none;">

			<hr style="margin-bottom: 10px; margin-left: 0; margin-right: 0;">
		
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
		
		
		
		
        <?php
        if(isset($store)) { echo "
        <script>
            $(window).bind('scroll', function() {
                 if ($(window).scrollTop() > 61) {
                     //$('.storecontainer').addClass('fixed');
                     //$('#container').addClass('correction');
                 }
                 else {
                     //$('.storecontainer').removeClass('fixed');
                    //$('#container').removeClass('correction');
                 }
            });
        </script>";
        }
        ?>
	</head>
	<body style="background-color: <?php if(isset($store)) { echo 'rgba(0,0,0,0)'; }?>">
    <?php
		if(isset($store)) { $selectedTab = 'selected'; }
        if(!isset($store) || isset($store)) { echo '
		
		<ul id="menuTEST" style="display: none;">
			<li><a href="/">Home</a></li>
			<li><a href="/join/">Join Team CSP</a></li>
			<li><a href="/range/">Range</a></li>
			<li><a href="/detailedby/">Detailed By</a></li>
			<li><a href="/training/">Training</a></li>
			<li><a href="/branches/">Branches</a></li>
			<li><a href="/contacts/">Contact</a></li>	  	
		</ul>
		
		<a class="mobileshow" style="cursor: pointer; position: relative; height: 45px; width: 45px; float: right; padding: 16px; color: #006396; z-index: 1000;" onclick="$(\'#newCSPMenu\').fadeToggle(300);">
			<i class="fa fa-bars fa-lg"></i>
		</a>
		
		
		
		<div id="headwrap"'; if(isset($home)) echo 'class="integrated-menu"'; echo '>
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
		
		
		';
		}
?>
<?php
    if(isset($store)) { echo '
        <div class="storecontainer">
		    <div class="storemenu">
		        <!--<a href="/"><img src="/images/csp3.png" height="24" style="margin-top: 9px; margin-left: 10px; margin-right: 5px; float: left;"></a>-->
                <li class="mobileshow"><a href="/range">Store Home</a></li>';

                while($row = $result->fetch_assoc()){
					$catname = str_replace(' ', '', $row['name']);
					
					// If category is hidden then skip this loop:
					if($row['hidden'] == '1') continue;
					
                    echo '<li class="mobilehide"><a href="/range/#'.$catname.'">' . $row['name'] . '</a></li>';
                }

                echo '
                <li class="floatright selected snipcart-checkout mobilehide"><a href="#">Checkout</a></li>
                 <div id="basketicon"><a class="snipcart-checkout windowlink"></a><span class="snipcart-summary"><b><span class="snipcart-total-price"></span></b></span></div>
			   <li class="floatright mobilehide"><a id="deliverybutton" href="/range/delivery/">Delivery Info</a></li>
		    </div>
		</div>
		<div style="height: 35px; width= 100%;"></div>
		';
		}
?>
<?php
	if(isset($contactmode)) {
		echo '
		<script src="https://maps.googleapis.com/intl/en_us/mapfiles/api-3/17/6/main.js" type="text/javascript"></script>
		<div id="map_canvas" class="pagebannerbg mobilehide downspace">
			<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
			<div style="overflow:hidden;height:100%;width:100%;position:absolute;top:0;left:0;z-index:-1;">
				<div id="gmap_canvas" style="height:100%;width:100%;"></div>
				<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
				<a class="google-map-code" href="https://www.mapsembed.com/baur-gutschein/" id="get-map-data">www.mapsembed.com</a>
			</div>
			<script type="text/javascript"> 
				function init_map(){ 
					var myOptions = {
						zoom:15,
						center:new google.maps.LatLng(53.47067487496064,-2.307925423742745),
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
					map.panBy(0,-70);
					marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(53.47067487496064, -2.307925423742745)});
					infowindow = new google.maps.InfoWindow({content:"<b>CSP Detailing</b><br/>Trafford Park Road<br/> Manchester" });
					google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);
				}
				google.maps.event.addDomListener(window, "load", init_map);
			</script>
			<div class="pagebanner" style="pointer-events:none;">
				<div class="pagebannercover">	
				</div>
			</div>
		</div>
		<div class="clear"></div>';
	}
?>
<?php  if(isset($pagetitle)) {
      if(isset($bannerurl) && !isset($contactmode)) {
		echo '<div class="pagebannerbg mobilehide downspace" style="background:url(' .$bannerurl. '); background-position: center '.$yshift.'px;">
					<div class="pagebanner">
					</div>
				</div>
				<div class="clear"></div>';
		}

		if(isset($store)) { $fixedbarfix = "upspace2"; }
		echo '
		<hr class="mobileshow">
		<div class="title centre '.$fixedbarfix.'">
				<h2>' .$pagetitle. '</h2>
			</div>
		<hr class="mobileshow" style="margin-bottom: 10px;">';
			} 
?>		
<div id="container" class="<?php if(!isset($titletext)) { echo 'fix'; } ?>">
<?php
    if(!isset($bannerurl)) { echo "<script> $('head').append('<link rel=\"stylesheet\" href=\"/files/styles/slimnav.css\" type=\"text/css\" />');</script>"; }
	
	// Override for just the homepage:
	//if(isset($home)) { echo "<style>#nav li a { color: white; } #nav li a:hover { color: #f2f2f2 !important; }</style>"; }
	
	// Correct for wider store:
	$storefix = '';
	if(isset($store) || !isset($bannerurl)) { 
		$storefix = "wide";
		echo "<style>.social-icons { color: #5e5e5e; } </style>";
	}
	
	if(!isset($home)) { echo '<div id="contentbox" class="'.$storefix.'">'; }
			
	if(isset($titletext)) { echo '<div class="clear"></div>'; }
  ?>
<div class="clear"></div>