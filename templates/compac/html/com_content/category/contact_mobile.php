<?php
defined('_JEXEC') or die;
$i = 1;
?>
<div class="container contact">
	<div class="row">
		<div class="col-md-12">
			<h2 class="no-span"><?php echo JText::_('CONTACT'); ?></h2>
			<div class="row mt20">
				<div class="col-xs-12">
					<h3>{article 1115}{title}{/article}</h3>
				</div>
				<div class="col-xs-6">
					{article 1115}{introtext}{/article}
				</div>
				<div class="col-xs-6">
					{article 1115}{fulltext}{/article}
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<a class="btn btnContact" href="index.php?option=com_contact&view=contact&id=1&Itemid=1003&lang=<?php echo JRequest::getVar('lang');?>"><?php echo JText::_('CONTACT');?> <i class="fa fa-angle-double-right fa-lg"></i></a>
				</div>
				<div class="col-xs-6">
					<a class="btn btnContact" href="index.php?option=com_content&view=category&layout=exhibitions&id=51&Itemid=1003&lang=<?php echo JRequest::getVar('lang');?>"><?php echo JText::_('EXHIBITIONS');?> <i class="fa fa-angle-double-right fa-lg"></i></a>
				</div>
			</div>
			<div class="line-hr clearfix"></div>
			<?php foreach($this->items as $item){
			$images = json_decode($item->images);
			?>
			<div class="col-xs-6">
				<img src="<?php echo $images->image_intro;?>" alt="" class="img-responsive">
				<?php echo $item->introtext;?>
			</div>
			<?php if($i%2 == 0){?><div class="clearfix"></div><?php }?>
			<?php $i++;}?>
		</div>
	</div>
</div>
