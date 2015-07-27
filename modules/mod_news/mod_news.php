<?php
defined('_JEXEC') or die;
$db = JFactory::getDBO();
$query = "SELECT title, params FROM #__categories WHERE id = 49";
$db->setQuery($query);
$cat = $db->loadObject();
$image = json_decode($cat->params);
?>
<div class="homepage-col" id="hp-col2">
	<div class="heading clear-fix">
		<h2><?php echo $cat->title;?></h2>
	</div>
	
	<div class="hp-col-content">
		<a class="hp-a-link" href=""><img src="<?php echo JURI::base().$image->image;?>" alt="<?php echo $cat->title;?>" /></a>
		<a href="template.php" class="read-more">Read more</a>
	</div>					
</div>