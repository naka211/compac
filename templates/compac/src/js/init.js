jQuery(document).ready(function(){
	var wHeight = jQuery(window).height();
	var wWidth = jQuery(window).width();

	jQuery('#main-slider').cycle({ 
		fx:    'fade', 
    	delay: -1000,
		speed:1000,
		timeout:3000
	});

	//Partner slide
	jQuery('#product-slideshow').carouFredSel({
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

	jQuery("#product-slideshow a").tooltip({
	    showURL     : false,
	    track       : true,
	    bodyHandler : function() {	    	
	    	//console.log(jQuery(this).data('title'));
	    	var id = '#' + jQuery(this).data('title');
	    	//console.log(id);
	        return jQuery(id).html();
	    },
	    extraClass: "customCompac"
	});


	jQuery('input.input-toggle').inputToggle();	

});

jQuery.fn.showFeatureText = function() {
	return this.each(function(){    
		var box = jQuery(this);
		var text = jQuery('p',this);    
	
		text.css({ position: 'absolute', bottom: '0px' }).hide();		
		
		box.hover(function(){
		  text.stop(true,true).slideDown("slow");
		},function(){
		  text.slideUp("slow");
		});		
  });
}
