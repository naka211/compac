<?php
// No direct access.
defined('_JEXEC') or die;
$session = JFactory::getSession();
$tmpl = JURI::base().'templates/'.$this->template.'/';
unset($this->_scripts[JURI::root(true).'/media/jui/js/jquery.min.js']);
unset($this->_scripts[JURI::root(true).'/media/jui/js/jquery-noconflict.js']);
unset($this->_scripts[JURI::root(true).'/media/jui/js/jquery-migrate.min.js']);
$langTag = JFactory::getLanguage()->getTag();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="<?php echo $tmpl;?>src/js/jquery-1.6.4.min.js"></script>
<jdoc:include type="head" />

<link rel="stylesheet" type="text/css" href="<?php echo $tmpl;?>src/css/style.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $tmpl;?>src/css/cuong.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $tmpl;?>src/css/reveal.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $tmpl;?>src/css/prettyPhoto.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $tmpl;?>src/css/jquery.tooltip.css"/>

<!--[if IE]>
<link href="<?php echo $tmpl;?>src/css/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 9]>
<link href="<?php echo $tmpl;?>src/css/ie9.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if lt IE 9]>
<link href="<?php echo $tmpl;?>src/css/ie78.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 7]>
<link href="<?php echo $tmpl;?>src/css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->

<script type="text/javascript" src="<?php echo $tmpl;?>src/js/jquery.carouFredSel-5.5.0-packed.js"></script>
<script type="text/javascript" src="<?php echo $tmpl;?>src/js/jquery.tooltip.min.js"></script>
<script type="text/javascript" src="<?php echo $tmpl;?>src/js/jquery.easing.js"></script>
<script type="text/javascript" src="<?php echo $tmpl;?>src/js/jquery.reveal.js"></script>
<script type="text/javascript" src="<?php echo $tmpl;?>src/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php echo $tmpl;?>src/js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="<?php echo $tmpl;?>src/js/jquery.inputToggle.js"></script>
<script type="text/javascript" src="<?php echo $tmpl;?>src/js/init.js"></script>
<script type="text/javascript">
 
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34164937-1']);
  _gaq.push(['_trackPageview']);
 
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
 
</script>
</head>
<body>
	
	<div class="max-container" id="max-container-header">
		<div class="container">
			<div class="newlogo">
				<a href="#"><img width="155" border="0" src="images/stories/logo-<?php echo $langTag;?>.png"></a>
			</div>
			<div class="header clear-fix">
				<h2 class="logo"><a href="<?php echo JURI::base();?>">COMPAC</a></h2>
				<div class="language-bar">
					{module FaLang Language Switcher}
					<div class="clear"></div>
				</div>
				<div class="navigation-wrapper">
					{module Main Menu}
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	<jdoc:include type="component" />
	
	
<div class="max-container" id="max-container-footer">
	{module HomeProductSlider}
	 
	
	<div class="container">
		<div class="footer clear-fix">
			<p>Copyright © 2012 Compac.dk - All rights reserved.</p>
			<a href="http://mywebcreations.dk" target="_blank" id="mwc">Design af My Web Creations.</a>
		</div>
	</div>
</div>
<?php 
if($session->get('notify') != 1){
?>
<div class="cookieInfo" id="cookieinfo">
 <div class="cookie-content clear-fix">
  {article 132}{introtext}{/article}
  <br />
  <a class="btnLuk" href="#" onclick="closecookie();">Luk</a>
 </div>
</div>
<script>
	function closecookie(){
		jQuery.post("<?php echo JURI::base().'index.php?option=com_virtuemart&controller=virtuemart&task=set_session'?>");
		jQuery("#cookieinfo").hide();
	}
</script>
<?php } ?>
</body>
</html>