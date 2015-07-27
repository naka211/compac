<?php // no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="homepage-col" id="<?php echo $params->get('moduleclass_sfx','');?>">
	<div class="heading clear-fix">
		<h2><?php echo $module->title?></h2>
	</div>
	<div class="hp-col-content">
		<a class="hp-a-link" href=""><img src="<?php echo $category->file_url;?>" alt="<?php echo $module->title?>" /></a>
		<a href="service.php" class="read-more">Read more</a>
	</div>
</div>