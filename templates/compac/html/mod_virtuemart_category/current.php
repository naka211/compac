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
    include('current_mobile.php');
    return;
}
//Detect mobile ends

$db = JFactory::getDBO();
$categories = $categoryModel->getChildCategoryList($vendorId, $category_id);
?>
<div class="product-slideshow-wrapper clear-fix">
	<div class="heading-1 clear-fix">
		<h2><?php echo JText::_('PRODUCTS');?></h2>
	</div>
	<ul id="product-slideshow">
		<?php 
		$i = 1;
		foreach ($categories as $category){
		$link = JRoute::_ ( 'index.php?option=com_virtuemart&view=category&layout=level2&virtuemart_category_id=' . $category->virtuemart_category_id , FALSE);
		$query = "SELECT file_url FROM #__virtuemart_medias WHERE virtuemart_media_id = ".$category->virtuemart_media_id[0];
		$db->setQuery($query);
		$file_name = $db->loadResult();
		?>
		<li><a data-title="product<?php echo $i;?>" href="<?php echo $link; ?>"><img width="138" height="103" src="<?php echo JURI::base().$file_name;?>"></a></li>
		<?php $i++;}?>
	</ul>
	<a id="product-next" class="product-button">Next</a>
	<a id="product-prev" class="product-button">Prev</a>
	<div class="product-tool-tip clear-fix">
		<?php 
		$i = 1;
		foreach ($categories as $category){?>
		<div class="eachTooltip" id="product<?php echo $i;?>">
			<h2><?php echo $category->category_name ?></h2>
		</div>
		 <?php $i++;}?>
	</div>
</div>