/* Activate Libraries */

// Document Ready for LazyYT:
$( document ).ready(function() {
	$('.lazyYT').lazyYT();
});



var switchTo5x=true;
/* stLight.options({publisher: "ur-36245509-985c-124a-a4b2-32cbf745b86", doNotHash: false, doNotCopy: false, hashAddressBar: false}); */
$(function() { $("div.image").lazyload({ effect : "fadeIn" }); });
if ('addEventListener' in document) {
    document.addEventListener('DOMContentLoaded', function() {
        FastClick.attach(document.body);
    }, false);
}

/* E-Commerce */
var options = [];
var productTitle = '';
var productVolume = '';
var productType = '';
var productPrice = '';
var productID = '';

function DropDown(el) {
	this.dd = el;
	this.placeholder = this.dd.children('span');
	this.opts = this.dd.find('ul.dropdown > li');
	this.val = '';
	this.index = -1;
	this.initEvents();
}
DropDown.prototype = {
	initEvents : function() {
		var obj = this;

		obj.dd.on('click', function(event){
			$(this).toggleClass('active');
			return false;
		});

		obj.opts.on('click',function(){
			var opt = $(this);
			obj.val = opt.text();
			obj.index = opt.index();
			obj.placeholder.text(obj.val);

			// Update Values:
			productVolume = options[(obj.index / 2)].volume;
			productType = options[(obj.index / 2)].type;
			productPrice = options[(obj.index / 2)].price;

			//alert(productVolume + ", " + productType + ", " + productPrice);

		});
	},
	getValue : function() {
		return this.val;
	},
	getIndex : function() {
		return this.index;
	}
}

$(function() {

	var dd = new DropDown( $('#dd') );

	$(document).click(function() {
		// all dropdowns
		$('.wrapper-dropdown-3').removeClass('active');
	});

});

function addToBasket() {
	$('#addtobasket').addClass('added');
	document.getElementById('addtobasket').innerHTML = "Added to Basket";

	$("#basketicon").animate({backgroundColor: 'rgba(0,99,150,0.2)'}, 'fast');
	setTimeout(function(){ $('#basketicon').animate({backgroundColor: 'transparent'}, 'slow') }, 2000);

	if(!productPromoCode || !productPromoAmount) {
		
	}
	
	var snipcartJSON = {
		// Required properties
		id: productID,
		name: productTitle + " (" + productVolume + " " + productType + ")",
		url: 'https://www.cspdetailing.com/range/product/' + productID,
		price: productPrice,
		// Optional properties
		description: productVolume + " " + productType + " version.",
		maxQuantity: productMaxQuantity,
		weight: 20,
		shippable: true
			
	}
	
	if(productPromoCode) {
		snipcartJSON["price-" + productPromoCode] = productPromoAmount;
	}	
	
	
	Snipcart.execute('item.add', snipcartJSON);

Snipcart.execute('bind', 'cart.opened', function() {
	console.log('Snipcart popup is visible');
});

Snipcart.execute('bind', 'cart.ready', function (data) {
   alert(data);
});



}

/* Analytics */
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-55104024-1', 'auto');
ga('send', 'pageview');