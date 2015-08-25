<?php // no direct access
defined('_JEXEC') or die('Restricted access');
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
?>
<div class="homepage-col" id="<?php echo $params->get('moduleclass_sfx','');?>">
	<div class="heading clear-fix">
		<h2><?php echo $module->title?></h2>
	</div>
	<div class="hp-col-content">
		<a class="hp-a-link" href="<?php echo $class_sfx."&lang=".JRequest::getVar('lang');?>"><img src="<?php echo JURI::base()."timthumb/timthumb.php?src=".JURI::base().$category->file_url."&h=105&w=277&q=100";?>" /></a>
		<a href="<?php echo $class_sfx."&lang=".JRequest::getVar('lang');?>" class="read-more"><?php echo JText::_('READ_MORE');?></a>
	</div>
</div>