<?php
defined('_JEXEC') or die;
$db = JFactory::getDBO();
$query = "SELECT title FROM #__categories WHERE id = 49";
$db->setQuery($query);
$cat = $db->loadObject();

$query = "SELECT images FROM #__content WHERE catid = 49 AND state = 1 ORDER BY ordering ASC LIMIT 0,1";
$db->setQuery($query);
$images = $db->loadResult();

$images = json_decode($images);
?>
<div class="row main-item">
	<div class="col-lg-12">
		<h1 class="pull-left"><?php echo $module->title;?></h1>
		<a class="btnMore pull-right" href="index.php?option=com_content&view=category&id=49&Itemid=1004&lang=<?php echo JRequest::getVar("lang");?>"><?php echo JText::_('READ_MORE');?></a>
		<div class="clearfix"></div>
		<a href="index.php?option=com_content&view=category&id=49&Itemid=1004&lang=<?php echo JRequest::getVar("lang");?>"><img src="<?php echo JURI::base()."timthumb/timthumb.php?src=".JURI::base().$images->image_intro."&h=230&w=600&q=100";?>" /></a> </div>
</div>