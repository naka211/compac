<?php
defined('_JEXEC') or die;
?>
<div id="max-container-content" class="max-container">
	<div class="container">
		<div class="content">
			<div id="contact-page" class="template clear-fix">
				<div class="heading clear-fix">
					<h2></h2>
				</div>
				<div class="contact-wrapper clear-fix">
					<div class="contact-left">
						<h2>{article 1115}{title}{/article}</h2>
						{article 1115}{introtext}{/article}
						<div id="contact-link">
							<ul>
								<li><a id="c-event" href="index.php?option=com_content&view=category&layout=exhibitions&id=51&Itemid=1003&lang=<?php echo JRequest::getVar('lang');?>"><?php echo JText::_('EXHIBITIONS');?></a></li>
								<li><a id="c-contact" href="index.php?option=com_contact&view=contact&id=1&Itemid=1003&lang=<?php echo JRequest::getVar('lang');?>"><?php echo JText::_('CONTACT');?></a></li>
							</ul>
						</div>
					</div>
					<div class="contact-right">
						<div class="clear-fix" id="member-wrapper">
							<?php foreach($this->items as $item){
							$images = json_decode($item->images);
							?>
							<div class="eachMember clear-fix">
								<div class="e-member-left"> <img alt="" src="<?php echo $images->image_intro;?>"> </div>
								<div class="e-member-right">
									<?php echo $item->introtext;?>
								</div>
							</div>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
