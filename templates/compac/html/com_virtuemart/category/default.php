<?php
defined ('_JEXEC') or die('Restricted access');
$categoryModel = VmModel::getModel('category');
$children = $categoryModel->getChildCategoryList(1, $this->category->virtuemart_category_id);
?>
<script language="javascript">
jQuery(document).ready(function(){
	accessDistribute = function(){
		var access = prompt(jQuery("#promptContent").text());
		if(access != null){
			location.href="<?php echo JURI::base();?>index.php?option=com_virtuemart&controller=virtuemart&task=accessDistribute&pass="+access;
		}
	}
});
</script>
<span id="promptContent" style="display:none;">{article 112}{introtext}{/article}</span>
<div id="max-container-content" class="max-container">
	<div class="container">
		<div class="content">
			<div id="product-wrapper" class="template clear-fix">
				<div class="heading clear-fix">
					<h2><?php echo vmText::_($this->category->category_name); ?></h2>
				</div>
				<div class="list-product-wrapper clear-fix">
					<?php foreach ($children as $category ) {
					$caturl = JRoute::_ ( 'index.php?option=com_virtuemart&view=category&layout=level2&virtuemart_category_id=' . $category->virtuemart_category_id , FALSE);
					if($category->virtuemart_category_id == 18){
						$caturl = "index.php?option=com_virtuemart&controller=virtuemart&task=downloadFile&file=wheels.pdf";
					}
					if($category->virtuemart_category_id == 19){
						$caturl = "index.php?option=com_virtuemart&controller=virtuemart&task=downloadFile&file=garanti.pdf";
					}
					if($category->virtuemart_category_id == 10){
						$caturl = JRoute::_ ( 'index.php?option=com_virtuemart&view=category&layout=documents&virtuemart_category_id=' . $category->virtuemart_category_id , FALSE);
					}
					if($category->virtuemart_category_id != 20){
					?>
					<div class="prd-item">
						<a href="<?php echo $caturl ?>"><span><?php echo vmText::_($category->category_name) ?></span>
						<?php echo $category->images[0]->displayMediaFull("",false);?>
						</a>
					</div>
					<?php } else {?>
					<div class="prd-item">
						<a href="javascript:void(0);" onClick="accessDistribute();"><span><?php echo vmText::_($category->category_name) ?></span>
						<?php echo $category->images[0]->displayMediaFull("",false);?>
						</a>
					</div>
					<?php }?>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
