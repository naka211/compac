<?php // no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="homepage-col" id="<?php echo $params->get('moduleclass_sfx','');?>">
	<div class="heading clear-fix">
		<h2><?php echo $module->title?></h2>
	</div>
	<div class="hp-col-content">
		<a class="hp-a-link" href="<?php echo $class_sfx."&lang=".JRequest::getVar('lang');?>"><img src="<?php echo $category->file_url;?>" alt="<?php echo $module->title?>" width="277" height="105" /></a>
		<a href="<?php echo $class_sfx."&lang=".JRequest::getVar('lang');?>" class="read-more"><?php echo JText::_('READ_MORE');?></a>
	</div>
</div>