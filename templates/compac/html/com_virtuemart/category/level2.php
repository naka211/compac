<?php
defined ('_JEXEC') or die('Restricted access');
$productModel = VmModel::getModel ('product');
$db= JFactory::getDBO();
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
					$products1 = $productModel->getProductsInCategory ($category->virtuemart_category_id);
					?>
					<div class="title-prd"><img alt="" src="templates/compac/images/bullet_title.png"><?php echo vmText::_($category->category_name) ?></div>
					<?php foreach($products1 as $product){
						$q = "SELECT file_url FROM #__virtuemart_medias WHERE virtuemart_media_id = ".$product->virtuemart_media_id[0];
						$db->setQuery($q);
						$file_url = $db->loadResult();
					?>
					<div class="prd-item"> <a href="<?php echo $product->link.'&Itemid=1002&lang='.JRequest::getVar('lang');?>"><span><?php echo $product->product_name;?></span> <img src="<?php echo JURI::base().$file_url;?>"> </a> </div>
					<?php }?>
					<div class="border-prd"></div>
				</div>
				<?php }?>
			</div>
		</div>
	</div>
</div>
</div>
