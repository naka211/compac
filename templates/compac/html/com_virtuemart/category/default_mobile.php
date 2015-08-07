<?php
defined ('_JEXEC') or die('Restricted access');
$i = 1;
$categoryModel = VmModel::getModel('category');
$children = $categoryModel->getChildCategoryList(1, $this->category->virtuemart_category_id);
$session = JFactory::getSession();
?>
<script type="text/javascript">
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
<section class="services">
	<div class="container">
		<div class="col-xs-12">
			<h2 class="no-span"><?php echo vmText::_($this->category->category_name); ?></h2>
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
					<div class="col-xs-6">
						<h3><?php echo vmText::_($category->category_name) ?></h3>
						<a href="<?php echo $caturl ?>"><?php echo $category->images[0]->displayMediaFull("",false);?></a>
					</div>
					<?php } else {
						if($session->get('accessDis') != 1){?>
					<div class="col-xs-6">
						<h3><?php echo vmText::_($category->category_name) ?></h3>
						<a href="javascript:void(0);" onClick="accessDistribute();"><?php echo $category->images[0]->displayMediaFull("",false);?></a>
					</div>
					<?php } else {
						$caturl = JRoute::_ ( 'index.php?option=com_virtuemart&view=category&layout=distributor&virtuemart_category_id=' . $category->virtuemart_category_id , FALSE);	
					?>
					<div class="col-xs-6">
						<h3><?php echo vmText::_($category->category_name) ?></h3>
						<a href="<?php echo $caturl ?>"><?php echo $category->images[0]->displayMediaFull("",false);?></a>
					</div>
					<?php }
					}
					if($i%2 == 0) echo '<div class="clearfix"></div>';
					$i++;
				}?>
		</div>
	</div>
</section>
