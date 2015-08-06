<?php
defined('_JEXEC') or die;
?>
<section class="news">
	<div class="container">
		<div class="col-xs-12">
			<h2 class="no-span"><?php echo $this->item->title;?></h2>
			<div class="row">
				<?php echo $this->item->fulltext;?>	
			</div>
			<div class="row mt10 text-left">
				<a class="btnMore" onclick="window.history.back();" href="#"><?php echo JText::_('BACK');?></a>
			</div>
		</div>
	</div>
</section>