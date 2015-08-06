<?php
defined('_JEXEC') or die;
$db = JFactory::getDBO();
$query = "SELECT title, params FROM #__categories WHERE id = 49";
$db->setQuery($query);
$cat = $db->loadObject();
$image = json_decode($cat->params);
?>
<div class="row main-item">
	<div class="col-lg-12">
		<h1 class="pull-left"><?php echo $module->title;?></h1>
		<a class="btnMore pull-right" href="index.php?option=com_content&view=category&id=49&Itemid=1004&lang=<?php echo JRequest::getVar("lang");?>"><?php echo JText::_('READ_MORE');?></a>
		<div class="clearfix"></div>
		<a href="index.php?option=com_content&view=category&id=49&Itemid=1004&lang=<?php echo JRequest::getVar("lang");?>"><img src="<?php echo JURI::base().$image->image;?>" alt="" class="img-responsive"></a> </div>
</div>