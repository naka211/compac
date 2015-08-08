<?php
defined('_JEXEC') or die;
$i = 1;
$baseurl = JUri::base();
?>
<div id="myCarousel2" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<?php foreach ($list as $item){
			$link = JRoute::_('index.php?option=com_banners&task=click&id=' . $item->id);
			$imageurl = $item->params->get('imageurl');
		?>
		<div class="item <?php if($i==1) echo 'active';?>">
			<a href="<?php echo $link; ?>">
				<img src="<?php echo $baseurl . $imageurl;?>" alt="<?php echo $alt;?>"/>
			</a>
		</div>
		<?php $i++; }?>
	</div>
</div>