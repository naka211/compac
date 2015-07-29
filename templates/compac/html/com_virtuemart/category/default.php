<?php
defined ('_JEXEC') or die('Restricted access');
?>
<div id="max-container-content" class="max-container">
	<div class="container">
		<div class="content">
			<div id="product-wrapper" class="template clear-fix">
				<div class="heading clear-fix">
					<h2><?php echo JText::_("PRODUCTS");?></h2>
				</div>
				<div class="list-product-wrapper clear-fix">
					<?php foreach ($this->category->children as $category ) {
					$caturl = JRoute::_ ( 'index.php?option=com_virtuemart&view=category&layout=level2&virtuemart_category_id=' . $category->virtuemart_category_id , FALSE);	
					?>
					<div class="prd-item">
						<a href="<?php echo $caturl ?>"><span><?php echo vmText::_($category->category_name) ?></span>
						<?php echo $category->images[0]->displayMediaThumb("",false);?>
						<!--<img width="138" height="103" src="http://localhost/compac_bk/components/com_virtuemart/shop_image/category/Jacks_1_5___3_to_51d3def15775c.jpg">--> </a>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
