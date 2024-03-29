<?php 

	//$bannerurl = '/images/backgrounds/rsz_ferrari.jpg';
	$yshift = -500;
	$xshift = 0;
	$pagetitle = 'Price Estimator';
	
	include '../files/header.php'; 
?>

<!--
<link rel="stylesheet" href="/files/gum.css">
-->

<!-- Owl Sheets --> 



<link rel="stylesheet" href="/files/owl/owl.carousel.css"> 
<link rel="stylesheet" href="/files/owl/owl.theme.css"> 
<script src="/files/owl/owl.carousel.js"></script> 

<style>
	#owl-csp .owl-item{
	  margin-right: 0px;
	}

	.selectBox {
		display: block;
		width: 100%;
		height: 20vh;
		background: rgba(0,99,150,0);
		color: #006396;
		opacity: 1;
		padding: 35px;
	}

	.selectBox:hover {
		background: rgba(0,99,150,0.1);
		transition: all 1s ease;
	}

	.copyBox {
		height: auto !important;
		background: rgba(0,99,150,0);
		color: #5e5e5e;
		margin-bottom: 20px;
		padding: 20px;
	}

	.copyBox p, .copyBox h3 {
		display: inline-block;
		vertical-align: middle;
	}

	.copyBox:hover {
		text-decoration: none;
		background: none;
		color: black;
		transition: all 1s ease;
	}

	button {
		max-width: 100px;
		background-color: transparent;
		color: #006396;
		display: block;
		padding: 5px 25px;
		margin: 0 auto;
		font-family: 'Oswald', sans-serif;
		text-transform: uppercase;
		float: none;
		border: solid 1px #006396;
		border-radius: 20px;
		font-size: 20px;
	}
		
	#owl-csp .div25 {
		padding: 2px;
	}
	
	@media (max-width: 500px) {
		.div25 { width: 100% !important; }
		.selectBox { height: 40vh; }
	}
	
</style>


<div class="div100">
	
	<div id="msg1" class="div100 cf">
		<!--<div id="stageNumber" class="stageCircle mb2 ib">1</div>-->
		
		<div class="div100 centre">	
			<h2 id="stageText" class="cspblue" style="font-size: 30px; font-weight: normal; font-family: 'Lato', sans-serif; text-transform: none;">Select your car size</h2>
			
			<div class="line"></div>
			
			<div style="margin-top: 20px;">
				<button id="backButton" onclick="previousStage();" style="display: none; position: relative; z-index: 100; float: left;">Back</button>		
				<button id="nextButton" onclick="nextStage();" style="display: none; margin-left: 10px; position: relative; z-index: 100; float: right;">Next</button>	
			</div>
		
		</div>
		
		<div class="clear"></div>		
		
		<div class="div100 centre">
			<h5 id="baseEstimateText" style="display: none; " class="">Base Estimate:</h5>
			<h5 id="extraEstimateText" style="display: none; " class="">Extras:</h5>
			<h5 id="totalEstimateText" style="display: none; " class="">Total:</h5>
			
		</div>			
		
	</div>	
	
	<div class="clear"></div>	
	
	<div id="owl-csp" class="centre"> 

	</div> 

</div>

	


<script>

var owl;

$(document).ready(function() {
	loadStage(0);
});

var stage = 0;
var stageDetails = [
	{title: "vehicle size", type: "single", selected: '', options: [
		{title: 'A/B', copy: 'e.g. Fiat 500 / Mini Cooper', image: '/images/services/mini/main.jpg', wheels: '/images/services/mini/wheel.png', seats: '/images/services/mini/seats.png', dashboard: '/images/services/mini/dash.png'}, 
		{title: 'C', copy: 'e.g. Audi A3 / VW Golf', image: "/images/services/golf/main.jpg", wheels: "/images/services/golf/wheel.jpg", seats: "/images/services/golf/seats.jpg", dashboard: "/images/services/golf/dash.jpg"}, 
		{title: 'D/E', copy: 'e.g. 5 Series / A7 / CLS', image: "/images/services/audia7/main.jpg"}, 
		{title: 'F', copy: 'e.g. Bentley Mulsanne', image: "/images/services/bentley/main.jpg"}, 
		{title: 'Small SUV', copy: 'e.g. Evoque Q3 / Q5 Tiguan', image: "/images/services/evoque/main.jpg"}, 
		{title: 'Large SUV', copy: 'e.g. RR Sport / Q7 Cayenne', image: "/images/services/rangerover/main.jpg" }
	] },
	{title: "current paintwork condition", type: "single", selected: '', options: [
		{title: 'New / Nearly new', copy: "", image: "/images/services/paintwork-new.JPG"},
		{title: 'Light swirls', copy: "", image: "/images/services/paintwork-light.JPG"},
		{title: 'Swirls / Marks', copy: '', image: "/images/services/paintwork-medium.JPG"},
		{title: 'Deep scratches', copy: '', image: "/images/services/paintwork-heavy.JPG"}
	]},
	{title: "desired level of correction", type: "single", selected: '', options: [
		{title: 'Single stage polish', copy: ''},
		{title: 'Two-stage enhancement', copy: ''},
		{title: 'Full correction', copy: ''},
		{title: 'Wet sanding', copy: ''}
	]},
	{title: "desired paintwork protection", type: "single", selected: '', options: [
		{title: "Nano paint sealant", copy: ""},
		{title: "Nano", copy: ""},
		{title: "Ultimate Nano Particle Protection", copy: ""}
	]},
	{title: "exterior extras", type: "multi", selected: [], options: [
		{title: "Windscreen + All Exterior Glass", copy: "", price: 100, image: [
			"/images/services/mini/dash.png",
			"/images/services/golf/dash.jpg",
			"/images/services/audia7/dash.jpg",
			"/images/services/bentley/dash.jpg",
			"/images/services/evoque/dash.jpg",
			"/images/services/rangerover/dash.jpg"
		]},
		{title: "Wheels (Face Only)", copy: "", price: 80, image: [
			"/images/services/mini/wheel.png",
			"/images/services/golf/wheel.jpg",
			"/images/services/audia7/wheel.jpg",
			"/images/services/bentley/wheel.jpg",
			"/images/services/evoque/wheel.jpg",
			"/images/services/rangerover/wheel.jpg"
		]},
		{title: "Wheels (Face + Barrel)", copy: "", price: 160, image: [
			"/images/services/mini/wheel.png",
			"/images/services/golf/wheel.jpg",
			"/images/services/audia7/wheel.jpg",
			"/images/services/bentley/wheel.jpg",
			"/images/services/evoque/wheel.jpg",
			"/images/services/rangerover/wheel.jpg"
		]},
		{title: "Convertible roof fabric", copy: "", price: 85, image: "/images/products/11/HighGloss-500ml.png"},		
	]},
	{title: "interior extras", type: "multi", selected: [], options: [
		{title: "Leather Fabric or Alcantara Seats", copy: "", price: 85, image: [
			"/images/services/mini/seats.png",
			"/images/services/golf/seats.jpg",
			"/images/services/audia7/seats.jpg",
			"/images/services/bentley/seats.jpg",
			"/images/services/evoque/seats.jpg",
			"/images/services/rangerover/seats.jpg"
		]},
		{title: "Dashboard, Door cards and carpets", copy: "", price: 75, image: [
			"/images/services/mini/dash.png",
			"/images/services/golf/door.jpg",
			"/images/services/audia7/door.jpg",
			"/images/services/bentley/door.jpg",
			"/images/services/evoque/seats.jpg",
			"/images/services/rangerover/door.jpg"
		]}
	]}
	
];

function loadStage(id) {
	$('#stageText').html( (stage+1) +  "/" + stageDetails.length + ": select " + stageDetails[id].title);
	
	evalBackNext();
	
	for(var i=0; i<stageDetails[id].options.length; i++) {
		// First check if there is a price:
		if(!stageDetails[id].options[i].price) stageDetails[id].options[i].price = '';
		
		// Then check for a car-specific image:
		if(stage > 3) {
			
			if(!stageDetails[stage].options[i].image) continue;
			
			if(stageDetails[stage].options[i].image.constructor === Array) {
				// If an array, then multiple images for cars are available:
				image = stageDetails[stage].options[i].image[parseInt(stageDetails[0].selected)];
			}
			else {
				// If not, use single image:
				image = stageDetails[stage].options[i].image;
			}
		} 
		else {
			image = stageDetails[id].options[i].image;
		}
		
		insertBlock(i, stageDetails[id].options[i].title, stageDetails[id].options[i].copy, stageDetails[id].options[i].price, image);
		if(stageDetails[id].selected.indexOf(i) != -1 || stageDetails[id].selected === i) {
			selectOption(i);
		}
	}	
}

function insertBlock(id, title, copy, price, image) {
	
	if(price != '') price = "£" + price.toFixed(2);
	
	$('#owl-csp').append("<div class='div25' style='display: inline-block; vertical-align: top;' id='" + id + "'><a class='selectBox c' style='background: url(" + image + "); background-size: cover; background-position: center center;'></a><a class='selectBox copyBox c'><h3>" + title + "</h3><p style='margin-left: 10px'>" + copy + "</p> <h3 style='display: block; margin-top: 10px;'>" + price + "</h3>   </a> </div>");
}

$('#owl-csp').on('click', '.div25', function(){
	if(stageDetails[stage].type == "single") {
		unselectAll();
		selectOption($(this).attr("id"));
		stageDetails[stage].selected = $(this).attr("id");
	}
	else {
		var indexOfSelected = stageDetails[stage].selected.indexOf(parseInt($(this).attr("id")));
		if(indexOfSelected > -1) {
			// exists, so delete:
			stageDetails[stage].selected.splice(indexOfSelected, 1);
			unselectOption($(this).attr("id"));
		}
		else {
			// doesn't exist, insert:
			stageDetails[stage].selected.push(parseInt($(this).attr("id")));
			selectOption($(this).attr("id"));
		}		
	}
	
	// Price calculation
	
	if(stageDetails[0].selected.length > 0 && stageDetails[1].selected.length > 0 && stageDetails[2].selected.length > 0) {
		
		// 1. Price based on car size:
		var carSize = parseInt(stageDetails[0].selected);
		var protectLevel = parseInt(stageDetails[2].selected);
		
		var basePriceTable = [
			{0: 275, 1: 285, 2: 295, 3: 305, 4: 325, 5: 350},
			{0: 450, 1: 495, 2: 540, 3: 585, 4: 610, 5: 625},
			{0: 800, 1: 900, 2: 950, 3: 1000, 4: 1100, 5: 1200},
			{0: 2800, 1: 3200, 2: 3600, 3: 3800, 4: 4200, 5: 4500}		
		];
		
		// 2. Particle Protection (carnauba, sealant, nano and ultimate):
		var protectionPriceTable = [
			{0: 75, 1: 80, 2: 85, 3: 90, 4: 95, 5: 100},
			{0: 90, 1: 95, 2: 100, 3: 105, 4: 110, 5: 115},
			{0: 155, 1: 160, 2: 165, 3: 170, 4: 175, 5: 180}
		];
		
		var protectionPrice = 0;
		for(var m=0; m<stageDetails[3].selected.length; m++) {
			var selectID = stageDetails[3].selected[m];
			protectionPrice += protectionPriceTable[selectID][carSize];
		}
		
		// 3. Calculate extras:
		var exteriorExtras = 0;
		var interiorExtras = 0;
		
		for(var j=0; j<stageDetails[4].selected.length; j++) {
			var selectID = stageDetails[4].selected[j];
			exteriorExtras += stageDetails[4].options[selectID].price;
		}
		
		for(var k=0; k<stageDetails[5].selected.length; k++) {
			var selectID = stageDetails[4].selected[k];
			interiorExtras += stageDetails[5].options[selectID].price;
		}
	
		var basePrice = protectionPrice + basePriceTable[ protectLevel ][carSize];
		
		$('#baseEstimateText').fadeIn(300);
		$('#extraEstimateText').fadeIn(300);
		$('#totalEstimateText').fadeIn(300);
		$('#baseEstimateText').html("Base Estimate: £" + basePrice);
		$('#extraEstimateText').html("Extras: £" + (exteriorExtras + interiorExtras));
		$('#totalEstimateText').html("Total: £" + (basePrice + exteriorExtras + interiorExtras));
	}
	
	
});

function evalBackNext() {
	if(stage==0) $('#backButton').hide();
	else $('#backButton').show();
	
	if(stage > 4) $('#nextButton').hide();
	else $('#nextButton').show();
}

function nextStage() {
	stage++;
	$('#owl-csp').html("");
	loadStage(stage);
}

function previousStage() {
	stage--;
	$('#owl-csp').html("");
	loadStage(stage);
}

function selectOption(id) {
	$('#' + id).find('.selectBox').css('backgroundColor', 'rgba(0,99,150,1)');
	$('#' + id).find('.selectBox').css('color', 'white');
}

function unselectAll() {
	$('.selectBox').css('backgroundColor', '');
	$('.selectBox').css('color', '');	
}

function unselectOption(id) {
	$('#' + id).find('.selectBox').css('backgroundColor', '');
	$('#' + id).find('.selectBox').css('color', '');	
}

function changeDetails(id, header, copy) {
	$('#' + id).find('h3').html(header);
	$('#' + id).find('p').html(copy);
}


function calculatePrice() {
	
	
}



</script>	
	
	
<!--
<script>
	$('#msg1').delay(200).fadeIn(500).delay(2000);

	$('.selectBox').delay(2700).each(function(i) {
		$(this).delay((i++) * 100).fadeTo(700, 1); 
	});
	
	$('.d25').click(function() {
		var original = this;
		$('.d25').each(function(i) {
			if(this == original ) $(this).delay(300).fadeTo(1000, 0);
			else $(this).delay((i++) * 100).fadeTo(700, 0);
		});
	})

</script>

-->

<?php include '../files/footer.php'; ?>