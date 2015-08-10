<?php // no direct access
defined ('_JEXEC') or die('Restricted access');
?>
<ul class="bxslider">
	<?php foreach ($products as $product){
	$link = 'index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id;
	?>
	<li><a href="<?php echo $link;?>"><img src="<?php echo JURI::base()."timthumb/timthumb.php?src=".JURI::base().$product->images[0]->file_url."&h=186&w=247&q=100";?>" /></a></li>
  	<?php }?>
</ul>