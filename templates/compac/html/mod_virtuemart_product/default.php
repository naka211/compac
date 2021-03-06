<?php // no direct access
defined ('_JEXEC') or die('Restricted access');
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
<div class="product-slideshow-wrapper clear-fix">
	<div class="heading-1 clear-fix">
		<h2><?php echo JText::_('PRODUCTS');?></h2>
	</div>
	<ul id="product-slideshow">
		<?php 
		$i = 1;
		foreach ($products as $product){
		$link = 'index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id;
		?>
		<li><a data-title="product<?php echo $i;?>" href="<?php echo $link; ?>"><img width="138" height="103" src="<?php echo JURI::base().$product->images[0]->file_url;?>"></a></li>
		<?php $i++;}?>
	</ul>
	<a id="product-next" class="product-button">Next</a>
	<a id="product-prev" class="product-button">Prev</a>
	<div class="product-tool-tip clear-fix">
		<?php 
		$i = 1;
		foreach ($products as $product){?>
		<div class="eachTooltip" id="product<?php echo $i;?>">
			<h2><?php echo $product->product_name ?></h2>
		</div>
		 <?php $i++;}?>
	</div>
</div>