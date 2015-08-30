<?php
// No direct access.
defined('_JEXEC') or die;
$session = JFactory::getSession();
$tmpl = JURI::base().'templates/'.$this->template.'/mobile/';
unset($this->_scripts[JURI::root(true).'/media/jui/js/jquery.min.js']);
unset($this->_scripts[JURI::root(true).'/media/jui/js/jquery-noconflict.js']);
unset($this->_scripts[JURI::root(true).'/media/jui/js/jquery-migrate.min.js']);
$langTag = JFactory::getLanguage()->getTag();
$tmp = explode("-",$langTag);
$flag = $tmp[0];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />
<script type="text/javascript" src="<?php echo $tmpl;?>js/jquery.min.js"></script>
<jdoc:include type="head" />
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $tmpl;?>favicon/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $tmpl;?>favicon/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $tmpl;?>favicon/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $tmpl;?>favicon/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $tmpl;?>favicon/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $tmpl;?>favicon/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $tmpl;?>favicon/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $tmpl;?>favicon/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $tmpl;?>favicon/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="<?php echo $tmpl;?>favicon/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php echo $tmpl;?>favicon/favicon-194x194.png" sizes="194x194">
<link rel="icon" type="image/png" href="<?php echo $tmpl;?>favicon/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php echo $tmpl;?>favicon/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="<?php echo $tmpl;?>favicon/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?php echo $tmpl;?>favicon/manifest.json">
<meta name="msapplication-TileColor" content="#2b5797">
<meta name="msapplication-TileImage" content="favicon/mstile-144x144.png">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="<?php echo $tmpl;?>font-awesome/css/font-awesome.min.css">
<!-- <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
<link type="text/css" rel="stylesheet" href="<?php echo $tmpl;?>css/mmenu.css" />
<link href="<?php echo $tmpl;?>css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" href="<?php echo $tmpl;?>css/jquery.bxslider.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo $tmpl;?>css/style.css" />

<script type="text/javascript" src="<?php echo $tmpl;?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $tmpl;?>js/mmenu.js"></script>
<script type="text/javascript" src="<?php echo $tmpl;?>js/jquery.bxslider.min.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function(){
	     jQuery("#carousel").carousel({
	         interval : false
	     });

	    jQuery('.bxslider').bxSlider({
			minSlides: 2,
			maxSlides: 4,
			slideWidth: 247,
			slideMargin: 15,
			auto: true,
  			// autoControls: true
		});
		
	});
	
	jQuery(function() {
		jQuery('nav#menu-left').mmenu();
		//$('nav#menu-right').mmenu(); 
		var $menu = jQuery('#menu-right');  
		$menu.mmenu({
			position: 'right', 
			addCounters: true
		});
	});
	
	jQuery.post("<?php echo JURI::base().'index.php?option=com_virtuemart&controller=virtuemart&task=setScreenWidth';?>", {width: screen.width});
	
</script>
</head>
<body>
<div class="header"> <a class="menu" href="#menu-left"><i class="fa fa-bars fa-lg"></i></a>
	<h2><a class="logo" href="<?php echo JURI::base();?>">Compac</a></h2>
	<img alt="" src="images/stories/logo-<?php echo $langTag;?>.png" class="img-responsive i-warranty">
	<a class="cart" href="#myModal" data-toggle="modal"><img src="media/mod_falang/images/<?php echo $flag;?>.gif" alt=""></a> </div>
<nav id="menu-left">
	{module Main Menu}
</nav>
<div id="page">
	<div class="content">
		<jdoc:include type="component" />
		
		<section class="product">
			<div class="container">
				<div class="row">
					<h2><?php echo JText::_('PRODUCTS');?></h2>
					{module HomeProductSlider}
				</div>
			</div>
		</section>
		
	</div>
	<div class="footer">
		<p>Copyright © 2012 <a href="Compac.dk">Compac.dk</a> - All rights reserved.<br>
			Design af <a href="mywebcreations.dk" target="_blank">My Web Creations.</a></p>
	</div>
	<div id="myModal" class="modal fade lang">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body text-center">
					{module FaLang Language Switcher}
					<p><a class="btnClose" data-dismiss="modal" aria-hidden="true">Luk</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>