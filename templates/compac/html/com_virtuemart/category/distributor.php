<?php
defined ('_JEXEC') or die('Restricted access');
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