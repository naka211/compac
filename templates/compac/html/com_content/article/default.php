<?php
defined('_JEXEC') or die;
?>
<div id="max-container-content" class="max-container">
	<div class="container">
		<div class="content">
			<div id="profile-wrapper" class="template clear-fix">
				<div class="heading clear-fix">
					<h2><?php echo $this->item->title;?></h2>
				</div>
				<div class="template-wrapper">
				<?php echo $this->item->fulltext;?>				
				<a class="read-more-2" onclick="window.history.back();" href="#"><?php echo JText::_('BACK');?></a>
				</div>				
			</div>			
		</div>
	</div>
</div>