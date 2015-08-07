<?php
defined ('_JEXEC') or die('Restricted access');
$productModel = VmModel::getModel ('product');
$db= JFactory::getDBO();
?>
<section class="products">
	<div class="container">
		<div class="col-xs-12">
			<h2 class="no-span"><?php echo vmText::_($this->category->category_name) ?></h2>
			<?php foreach ($this->category->children as $category ) {
			$products1 = $productModel->getProductsInCategory ($category->virtuemart_category_id);
			?>
			<div class="row">
				<h4><i class="fa fa-arrow-circle-right"></i> <?php echo vmText::_($category->category_name) ?></h4>
				<?php foreach($products1 as $product){
					$mid = (int)$product->virtuemart_media_id[0];
					$q = "SELECT file_url FROM #__virtuemart_medias WHERE virtuemart_media_id = ".$mid;
					$db->setQuery($q);
					$file_url = $db->loadResult();
					if(!$file_url){
						$file_url = "components/com_virtuemart/assets/images/vmgeneral/noimage.gif";
					}
				?>
				<div class="col-xs-6">
					<p class="title"><?php echo $product->product_name;?></p>
					<a href="<?php echo $product->link.'&Itemid=1002&lang='.JRequest::getVar('lang');?>"><img src="<?php echo JURI::base().$file_url;?>" alt="" class="img-responsive"></a>
				</div>
				<?php }?>
			</div>
			<?php }?>
		</div>
	</div>
</section>