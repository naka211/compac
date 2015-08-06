<?php
defined('_JEXEC') or die;
$images  = json_decode($this->item->images);
?>
<section class="company">
	<div class="container">
		<div class="col-xs-12">
			<h2 class="no-span"><?php echo $this->item->title;?></h2>
			<div class="row mt20">
				<img src="<?php echo $images->image_intro;?>" alt="" class="img-responsive">
				<?php echo $this->item->text;?>	
			</div>
		</div>
	</div>
</section>