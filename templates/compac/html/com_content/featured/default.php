<?php
defined('_JEXEC') or die;

//Detect mobile
session_start();
$config =& JFactory::getConfig();
$showPhone = $config->get( 'show_phone' );
$enablePhone = $config->get( 'enable_phone' );
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
if(!isset($_SESSION['mobile'])){
	if($detect->isMobile()){
		$_SESSION['mobile'] = true;
	}
}
if($showPhone){
	$_SESSION['mobile'] = $showPhone;
}
if ( ($showPhone || $detect->isMobile()) && ($enablePhone) && ($_SESSION['mobile'])) {
    include('default_mobile.php');
    return;
}
//Detect mobile ends

$tmpl = JURI::base().'templates/compac/';
?>
<div class="max-container" id="max-container-slider">
	<div class="slider clear-fix">
		<div class="welcome-wrapper">
			<h2>{article 55}{title}{/article}</h2>
			{article 55}{introtext}{/article}
			<a href="index.php?option=com_contact&view=contact&id=1&Itemid=1003&lang=<?php echo JRequest::getVar('lang');?>" id="btnFindUs"><?php echo JText::_('FIND_US_HERE');?></a>
			<p><a style="margin-top: 10px; display: block;" href="http://apps.appmachine.com/compac" id="btnFindUs" target="_blank">Download Compac App</a></p>
		</div>
		<div class="slider-wrapper">
			{module Banners}
		</div>
	</div>
</div>

<div class="max-container" id="max-container-content">
	<div class="container">
		<div class="content">
			<div class="template clear-fix" id="homepage-wrapper">
				{module Documentation}
				{module Spare parts}
				{module News}
			</div>
		</div>
	</div>
</div>