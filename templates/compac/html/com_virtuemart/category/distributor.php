<?php
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
    include('distributor_mobile.php');
    return;
}
//Detect mobile ends
$categoryModel = VmModel::getModel('category');
$productModel = VmModel::getModel ('product');
$db = JFactory::getDBO();
$session = JFactory::getSession();
if($session->get("accessDis") != 1){
	$app = JFactory::getApplication();
	$app->redirect(JURI::base());
}
?>

<div id="max-container-content" class="max-container">
	<div class="container">
		<div class="content">
			<div id="product-wrapper" class="template clear-fix">
				<div class="heading clear-fix">
					<h2><?php echo vmText::_($this->category->category_name) ?></h2>
				</div>
				<div class="list-product-wrapper clear-fix">
					<?php foreach ($this->category->children as $category ) {?>
					<div class="eachRow-product clear-fix">
						<div class="prd-left">
							<h2><?php echo $category->category_name?></h2>
							<img alt="Sample" src="<?php echo $category->file_url;?>"> </div>
						<div class="prd-right clear-fix">
							<ul class="list-product">
								<li>
								<?php
								$products = $productModel->getProductsInCategory ($category->virtuemart_category_id);
								/*$q = "SELECT p.virtuemart_product_id, pe.product_name FROM #__virtuemart_products p INNER JOIN #__virtuemart_products_en_gb pe ON p.virtuemart_product_id = pe.virtuemart_product_id INNER JOIN #__virtuemart_product_categories pc ON p.virtuemart_product_id = pc.virtuemart_product_id WHERE p.published = 1 AND pc.virtuemart_category_id = ".$category->virtuemart_category_id." ORDER BY p.pordering, pe.product_name";
								$db->setQuery($q);
								$products = $db->loadObjectList();*/
								foreach($products as $product){
									$db->setQuery("SELECT file_name FROM #__virtuemart_product_attachments WHERE virtuemart_product_id = ".(int)$product->virtuemart_product_id);	
									$file_name = $db->loadResult();
								?>
								<a class="listcolum c3" target="_blank" href="<?php echo JURI::base();?>plugins/system/vm_multiupload_attachment/js/multiupload/server/uploads/<?php echo $file_name;?>"><?php echo $product->product_name;?></a>
								<?php }?>
								</li>
							</ul>
							<div class="clear"></div>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
