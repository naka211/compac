<?php
defined('_JEXEC') or die;
?>
<div class="max-container" id="max-container-content">
	<div class="container">
		<div class="content">
			<div class="template clear-fix" id="profile-wrapper">
				<div class="heading clear-fix">
				</div>
				<div class="template-wrapper">
				<?php echo $this->item->text;?>
				<a href="<?php echo JURI::base();?>" class="read-more-2"><?php echo JText::_('HOME')?></a>
				</div>				
			</div>			
		</div>
	</div>
</div>