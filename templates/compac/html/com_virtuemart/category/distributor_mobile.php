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
<section class="services-detail">
	<div class="container">
		<div class="col-xs-12">
			<h2 class="no-span"><?php echo vmText::_($this->category->category_name) ?></h2>
			<?php foreach ($this->category->children as $category ) {?>
			<div class="row box">
				<h3><?php echo $category->category_name?></h3>
				<div class="box-content">
					<img src="<?php echo $category->file_url;?>" alt="" class="img-responsive">
				</div>
			</div>
			<div class="row box">
				<div class="box-content">
					<ul class="list-models">
						<?php
						$products = $productModel->getProductsInCategory ($category->virtuemart_category_id);
						foreach($products as $product){
							$db->setQuery("SELECT file_name FROM #__virtuemart_product_attachments WHERE virtuemart_product_id = ".(int)$product->virtuemart_product_id);	
							$file_name = $db->loadResult();
						?>
						<li><a href="<?php echo JURI::base();?>plugins/system/vm_multiupload_attachment/js/multiupload/server/uploads/<?php echo $file_name;?>"><?php echo $product->product_name;?></a></li>
						<?php }?>
					</ul>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
</section>