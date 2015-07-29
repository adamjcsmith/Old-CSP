<?php 

	//$bannerurl = '/images/backgrounds/rsz_ferrari.jpg';
	$yshift = -200;
	$xshift = 0;
	$pagetitle = 'Services';
	//$bannerurl = "/images/services/services.jpg";
	
	include '../files/header.php'; 
?>

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
		height: 32vh;
		background: rgba(0,99,150,0);
		color: #006396;
		opacity: 1;
	}

	.selectBox:hover {
		background: rgba(0,99,150,0.1);
		transition: all 1s ease;
	}

	.copyBox {
		height: auto !important;
		background: rgba(0,0,0,0.3);
		color: white;
		margin-bottom: 0px;
		padding: 15px;
		margin-top: -55px;
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
	
	#pre p {
		font-size: 25px;
		margin-top: 10px;
	}
	
	#pre button {
		border-color: white;
		border-radius: 35px;
		background-color: white;
		color: rgba(0,99,150,0.7);
		font-size: 30px;
		max-width: 200px;
	}
	
	#pre button:hover {
		background-color: rgba(255,255,255,0.6);
		transition: all 0.5s ease;
	}
	
	#estimateDetails p {
		font-size: 22px;
	}
	
	#estimateDetails {
		color: white;
		background: rgba(0,99,150,0.7);
		padding: 20px;
		margin-top: 10px;
	}
	
	#buttonArray { margin-top: -60px; }
	#buttonArray button { color: rgba(0,99,150,0.7); border-color: white; background: white; }
	
	@media (max-width: 500px) {
		.div25 { width: 100% !important; }
		.selectBox { height: 40vh; }
		#buttonArray { margin-top: 20px; }
	}
	
</style>


<div id="peContainer" class="div100" style="margin-bottom: 10vh;">
	
	<div id="msg1" class="div100 cf">
		<!--<div id="stageNumber" class="stageCircle mb2 ib">1</div>-->
		
		<div id="stageContext" class="div100 centre" style="display: none; background: rgba(0,99,150,0.7); color: white; border-radius: 0px; margin-bottom: 5px; ">	
			<h2 id="stageText" class="" style="font-size: 28px; font-weight: 300; font-family: 'Oswald', sans-serif; text-transform: uppercase; margin-bottom: 20px;">Select your car size</h2>
			
			<div id="stageDivider" class="line mobileshow" style=""></div>
			
			<div id="buttonArray">
				<button id="backButton" onclick="previousStage();" style="display: none; position: relative; z-index: 100; float: left;">Back</button>		
				<button id="nextButton" onclick="nextStage();" style="display: none; margin-left: 10px; position: relative; z-index: 100; float: right;">Next</button>	
			</div>
		
		</div>
		
		<div class="clear"></div>
		
		<div id="estimateDetails" class="div100 centre" style="display: none;">
			<p id="baseEstimateText" style="" class="">Base Estimate:</p>
			<p id="extraEstimateText" style="" class="">Extras:</p>
			<p id="totalEstimateText" style="border-top: solid 1px white; margin-top: 10px; padding-top: 10px; " class="">Total:</p>
			
		</div>			
		
	</div>	
	
	<div class="clear"></div>	
	
	<div id="owl-csp" class="centre"> 
	
		<div id="pre" style="width: 100%; background: rgba(0,99,150,0.7); padding: 20px; color: white;">
		
			<h1>CSP Price Estimator</h1>
			<div class="line" style="background: rgba(255,255,255,0.7);"></div>		
		
			<div style="padding: 20px; box-sizing: border-box;">
				<div class="div70">
					<p>We offer a full detailing service, customised to your requirements.</p>
					<p>Use our price estimator to discover our services and prices.</p>				
				</div>
				<div class="div30">
					<button id="startButton" style="margin-top: 22px;" onclick="start();">Start</button>	
				</div>
				<div class="clear"></div>				
			</div>

		</div>
	
	</div> 

</div>



<script>

var owl;

$(document).ready(function() {

});

function start() {
	$('#owl-csp').empty();
	$('#stageContext').fadeIn();
	loadStage(0);
}

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
		{title: 'Single stage polish', copy: '', image: "/images/services/singlestage.png"},
		{title: 'Two-stage enhancement', copy: '', image: "/images/services/twostage.png"},
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
		{title: "Convertible roof fabric", copy: "", price: 85, image: "/images/services/convertible-external.png"},		
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
	var singleID;
	
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
				
				
				
				if(stageDetails[id].type!=="single") {
					selectOption(i);
				}
				else {
					singleID = i;
				}
				
			}


	}

	if(stageDetails[stage].type=="single" && stageDetails[stage].selected.length > 0) {
		selectOption(singleID);
	}
}

function insertBlock(id, title, copy, price, image) {
	
	if(price != '') price = "£" + price.toFixed(2);
	
	$('#owl-csp').append("<div class='div33' style='display: inline-block; vertical-align: top;' id='" + id + "'><a class='selectBox c' style='background: url(" + image + "); background-size: cover; background-repeat: no-repeat; background-position: center center;'></a><a class='selectBox copyBox c'><h3>" + title + "</h3><p style='margin-left: 10px'>" + copy + "</p> <h3 style='display: inline; margin-top: 10px;'>" + price + "</h3>   </a> </div>");
}

$('#owl-csp').on('click', '.div33', function(){
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
			console.log("This attempt used a selectID of : " + selectID);
			interiorExtras += stageDetails[5].options[selectID].price;
		}
	
		var basePrice = protectionPrice + basePriceTable[ protectLevel ][carSize];
		
		$('#baseEstimateText').html("Base Estimate: £" + basePrice);
		$('#extraEstimateText').html("Extras: £" + (exteriorExtras + interiorExtras));
		$('#totalEstimateText').html("Total: £" + (basePrice + exteriorExtras + interiorExtras));
	}
	
	
});

function evalBackNext() {
	if(stage==0) $('#backButton').hide();
	else $('#backButton').show();
	
	if(stage > 4) $('#nextButton').html("Finish");
	else $('#nextButton').html("Next");

	console.log("evalBackNext() called!");
	
	if(stage > 5) {
		$('#nextButton').hide();
		$('#stageText').html("Your Estimate");
		$('#estimateDetails').fadeIn(300);
	}
	else {
		$('#nextButton').show();
		$('#estimateDetails').hide();
	}
}

function nextStage() {
	stage++;
	$('#owl-csp').html("");	
	
	if(stage==6) {
		evalBackNext();
		
	} else {
		loadStage(stage);		
	}
	
}

function previousStage() {
	stage--;
	$('#owl-csp').html("");
	loadStage(stage);
}

function selectOption(id) {
	$('#' + id).find('.selectBox').css('backgroundColor', 'rgba(0,99,150,0.7)');
	$('#' + id).find('.selectBox').css('color', 'white');

	// Check other boxes here:
	if(stageDetails[stage].type == "single") {
		$('.div33').css({opacity: 0.4});
		$('#' + id).css("opacity", "");		
	}
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


</script>	

<?php include '../files/footer.php'; ?>