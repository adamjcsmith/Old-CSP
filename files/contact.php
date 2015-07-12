
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
	<div class="clear"></div>
