<?php // no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="row main-item">
	<div class="col-lg-12">
		<h1 class="pull-left"><?php echo $module->title?></h1>
		<a class="btnMore pull-right" href="<?php echo $class_sfx."&lang=".JRequest::getVar('lang');?>"><?php echo JText::_('READ_MORE');?></a>
		<div class="clearfix"></div>
		<a href="<?php echo $class_sfx."&lang=".JRequest::getVar('lang');?>"><img src="<?php echo JURI::base()."timthumb/timthumb.php?src=".JURI::base().$category->file_url."&h=230&w=600&q=100";?>" /></a> </div>
</div>