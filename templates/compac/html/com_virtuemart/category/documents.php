<?php
defined ('_JEXEC') or die('Restricted access');
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
