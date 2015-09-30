<?php // no direct access
defined('_JEXEC') or die('Restricted access');
$db = JFactory::getDBO();
$categories = $categoryModel->getChildCategoryList($vendorId, $category_id);
?>
<ul class="bxslider">
	<?php foreach ($categories as $category){
	$link = JRoute::_ ( 'index.php?option=com_virtuemart&view=category&layout=level2&virtuemart_category_id=' . $category->virtuemart_category_id , FALSE);
	$query = "SELECT file_url FROM #__virtuemart_medias WHERE virtuemart_media_id = ".$category->virtuemart_media_id[0];
	$db->setQuery($query);
	$file_name = $db->loadResult();
	?>
	<li><a href="<?php echo $link;?>"><img src="<?php echo JURI::base()."timthumb/timthumb.php?src=".JURI::base().$file_name."&h=186&w=247&q=100";?>" /></a></li>
  	<?php }?>
</ul>