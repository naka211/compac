<?php
defined('_JEXEC') or die;
?>
<section class="news">
	<div class="container">
		<div class="col-xs-12">
			<div class="row">
				<?php echo $this->item->text;?>
			</div>
			<div class="row mt10 text-left">
				<a href="<?php echo JURI::base();?>" class="read-more-2"><?php echo JText::_('HOME')?></a>
			</div>
		</div>
	</div>
</section>