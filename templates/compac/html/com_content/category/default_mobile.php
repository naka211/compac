<?php
defined('_JEXEC') or die;
?>
<section class="news">
	<div class="container">
		<div class="col-xs-12">
			<h2 class="no-span"><?php echo $this->category->title;?></h2>
			<div class="row">
				<?php foreach($this->items as $item){
				$link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language));
				$images = json_decode($item->images);
				$tmp = explode(" ", $item->created);
				$tmp1 = explode("-", $tmp[0]);
				?>
				<article class="news-item">
					<a href="<?php echo $link;?>"><img class="img-responsive" src="<?php echo $images->image_intro;?>" alt=""></a>
					<h4><?php echo $item->title;?></h4>
					<p><?php echo $tmp1[2].'-'.$tmp1[1].'-'.$tmp1[0];?></p>
					<?php echo $item->introtext;?>
					<a class="btnMore" href="<?php echo $link;?>"><?php echo JText::_("READ_MORE");?>...</a>
				</article>
				<?php }?>
			</div>
		</div>
	</div>
</section>