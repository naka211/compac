<meta charset="utf-8" />
<meta name="author" content="www.millefrydenberg.dk" />
<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

<title>Compac</title>

<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="favicon/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="favicon/favicon-194x194.png" sizes="194x194">
<link rel="icon" type="image/png" href="favicon/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="favicon/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="favicon/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="favicon/manifest.json">
<meta name="msapplication-TileColor" content="#2b5797">
<meta name="msapplication-TileImage" content="favicon/mstile-144x144.png">
<meta name="theme-color" content="#ffffff">

<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<!-- <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
<link type="text/css" rel="stylesheet" href="css/mmenu.css" />
<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" href="css/jquery.bxslider.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/style.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mmenu.js"></script>
<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
	     $("#carousel").carousel({
	         interval : false
	     });

	    $('.bxslider').bxSlider({
			minSlides: 2,
			maxSlides: 4,
			slideWidth: 247,
			slideMargin: 15,
			auto: true,
  			// autoControls: true
		});
	});
	
	$(function() {
		$('nav#menu-left').mmenu();
		//$('nav#menu-right').mmenu(); 
		var $menu = $('#menu-right');  
		$menu.mmenu({
			position: 'right', 
			addCounters: true
		});
	});
</script>