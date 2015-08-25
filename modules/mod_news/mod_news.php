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
    include('mod_news_mobile.php');
    return;
}
//Detect mobile ends

$db = JFactory::getDBO();
$query = "SELECT title FROM #__categories WHERE id = 49";
$db->setQuery($query);
$cat = $db->loadObject();

$query = "SELECT images FROM #__content WHERE catid = 49 AND state = 1 ORDER BY ordering ASC LIMIT 0,1";
$db->setQuery($query);
$images = $db->loadResult();

$images = json_decode($images);
?>
<div class="homepage-col" id="hp-col2">
	<div class="heading clear-fix">
		<h2><?php echo $module->title;?></h2>
	</div>
	
	<div class="hp-col-content">
		<a class="hp-a-link" href="index.php?option=com_content&view=category&id=49&Itemid=1004&lang=<?php echo JRequest::getVar("lang");?>"><img src="<?php echo JURI::base()."timthumb/timthumb.php?src=".JURI::base().$images->image_intro."&h=105&w=277&q=100";?>" /></a>
		<a href="index.php?option=com_content&view=category&id=49&Itemid=1004&lang=<?php echo JRequest::getVar("lang");?>" class="read-more"><?php echo JText::_('READ_MORE');?></a>
	</div>					
</div>