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
    include('documents_mobile.php');
    return;
}
//Detect mobile ends
$categoryModel = VmModel::getModel('category');
$productModel = VmModel::getModel ('product');
$db = JFactory::getDBO();
?>
<div id="max-container-content" class="max-container">
	<div class="container">
		<div class="content">
			<div id="product-wrapper" class="template clear-fix">
				<div class="heading clear-fix">
					<h2><?php echo vmText::_($this->category->category_name) ?></h2>
				</div>
				<div class="list-product-wrapper clear-fix">
					<?php foreach ($this->category->children as $category ) {
						$children = $categoryModel->getChildCategoryList(1, $category->virtuemart_category_id);
					?>
					<div class="eachRow-product clear-fix">
						<div class="prd-left">
							<h2><?php echo $category->category_name?></h2>
							<img alt="Sample" src="<?php echo $category->file_url;?>">
						</div>
						
						<div class="prd-right clear-fix">
							<?php	$i = 1; 
								foreach($children as $child){
								$products = $productModel->getProductsInCategory ($child->virtuemart_category_id);
								/*$q = "SELECT p.virtuemart_product_id, pe.product_name FROM #__virtuemart_products p INNER JOIN #__virtuemart_products_en_gb pe ON p.virtuemart_product_id = pe.virtuemart_product_id INNER JOIN #__virtuemart_product_categories pc ON p.virtuemart_product_id = pc.virtuemart_product_id WHERE p.published = 1 AND pc.virtuemart_category_id = ".$child->virtuemart_category_id." ORDER BY p.pordering, pe.product_name";
								$db->setQuery($q);
								$products = $db->loadObjectList();*/
							?>
							<div class="prd-models">
								<div class="prd-heading" <?php if($i%2==0) echo 'style="border-left: 1px solid #c6c6c6;"'; if(count($children)==1) echo 'style="border-right: 1px solid #c6c6c6;"';?>><?php echo $child->category_name;?></div>
								<ul class="list-product" <?php if($i%2==0) echo 'style="border-left: 1px solid #c6c6c6;"'; if(count($children)==1) echo 'style="border-right: 1px solid #c6c6c6;"';?>>
									<li>
										<?php foreach($products as $product){
										$db->setQuery("SELECT file_name FROM #__virtuemart_product_attachments WHERE virtuemart_product_id = ".(int)$product->virtuemart_product_id);	
										$file_name = $db->loadResult();
										?>
										<a class="listcolum c2" target="_blank" href="<?php echo JURI::base();?>plugins/system/vm_multiupload_attachment/js/multiupload/server/uploads/<?php echo $file_name;?>"><?php echo $product->product_name;?></a>
										<?php }?>
									</li>
								</ul>
								<div class="clear"></div>
							</div>
							<?php $i++;}?>
						</div>
						
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
