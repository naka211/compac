$(document).ready(function(){
	var wHeight = $(window).height();
	var wWidth = $(window).width();

	$('#main-slider').cycle({ 
		fx:    'fade', 
    	delay: -1000,
		speed:1000,
		timeout:3000
	});

	//Partner slide
	$('#product-slideshow').carouFredSel({
		circular		:true,
		infinite		:true,		
		items			:{
			visible		:6,			
			minimum     :6,
			height:115,
			width:150
			},
		scroll:{
			items		:1,
			pauseOnHover:true		
			},
		next:			'#product-next',
		prev: 			'#product-prev',
		auto			:true
	});

	$("#product-slideshow a").tooltip({
	    showURL     : false,
	    track       : true,
	    bodyHandler : function() {	    	
	    	//console.log($(this).data('title'));
	    	var id = '#' + $(this).data('title');
	    	//console.log(id);
	        return $(id).html();
	    },
	    extraClass: "customCompac"
	});


	$('input.input-toggle').inputToggle();	

});

$.fn.showFeatureText = function() {
	return this.each(function(){    
		var box = $(this);
		var text = $('p',this);    
	
		text.css({ position: 'absolute', bottom: '0px' }).hide();		
		
		box.hover(function(){
		  text.stop(true,true).slideDown("slow");
		},function(){
		  text.slideUp("slow");
		});		
  });
}
