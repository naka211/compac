<?php
defined ('_JEXEC') or die('Restricted access');
$categoryModel = VmModel::getModel('category');
$productModel = VmModel::getModel ('product');
$db = JFactory::getDBO();
?>
<section class="services-detail">
	<div class="container">
		<div class="col-xs-12">
			<h2 class="no-span"><?php echo vmText::_($this->category->category_name) ?></h2>
			<?php foreach ($this->category->children as $category ) {
				$children = $categoryModel->getChildCategoryList(1, $category->virtuemart_category_id);
			?>
			<div class="row box">
				<h3><?php echo $category->category_name?></h3>
				<div class="box-content">
					<img src="<?php echo $category->file_url;?>" alt="" class="img-responsive">
				</div>
			</div>
			<?php
				foreach($children as $child){
				$products = $productModel->getProductsInCategory ($child->virtuemart_category_id);
				/*$q = "SELECT p.virtuemart_product_id, pe.product_name FROM #__virtuemart_products p INNER JOIN #__virtuemart_products_en_gb pe ON p.virtuemart_product_id = pe.virtuemart_product_id INNER JOIN #__virtuemart_product_categories pc ON p.virtuemart_product_id = pc.virtuemart_product_id WHERE p.published = 1 AND pc.virtuemart_category_id = ".$child->virtuemart_category_id." ORDER BY p.pordering, pe.product_name";
				$db->setQuery($q);
				$products = $db->loadObjectList();*/
			?>
			<div class="row box">
				<h3><?php echo $child->category_name;?></h3>
				<div class="box-content">
					<ul class="list-models">
						<?php foreach($products as $product){
						$db->setQuery("SELECT file_name FROM #__virtuemart_product_attachments WHERE virtuemart_product_id = ".(int)$product->virtuemart_product_id);	
						$file_name = $db->loadResult();
						?>
						<li><a href="<?php echo JURI::base();?>plugins/system/vm_multiupload_attachment/js/multiupload/server/uploads/<?php echo $file_name;?>"><?php echo $product->product_name;?></a></li>
						<?php }?>
					</ul>
				</div>
			</div>
			
			<?php }
			}?>
		</div>
	</div>
</section>
