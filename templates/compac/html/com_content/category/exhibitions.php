<?php
defined('_JEXEC') or die;
//Detect mobile
session_start();
$config =& JFactory::getConfig();
$showPhone = $config->get( 'show_phone' );
$enablePhone = $config->get( 'enable_phone' );
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
if(!isset($_SESSION['mobile'])){
	if($detect->isMobile()){
		$_SESSION['mobile'] = true;
	}
}
if($showPhone){
	$_SESSION['mobile'] = $showPhone;
}
if ( ($showPhone || $detect->isMobile()) && ($enablePhone) && ($_SESSION['mobile'])) {
    include('exhibitions_mobile.php');
    return;
}
//Detect mobile ends
?>
<div id="max-container-content" class="max-container">
	<div class="container">
		<div class="content">
			<div id="contact-page" class="template clear-fix">
				<div class="heading clear-fix">
					<h2><?php echo JText::_('CONTACT'); ?></h2>
				</div>
				<div class="contact-wrapper clear-fix">
					<div class="contact-left">
						<h2>{article 1115}{title}{/article}</h2>
						{article 1115}{introtext}{/article}
						<div id="contact-link">
							<ul>
								<li><a id="c-who" href="index.php?option=com_content&view=category&layout=contact&id=50&Itemid=1003&lang=<?php echo JRequest::getVar('lang');?>"><?php echo JText::_('CONTACT_INFO');?></a></li>
								<li><a id="c-contact" href="index.php?option=com_contact&view=contact&id=1&Itemid=1003&lang=<?php echo JRequest::getVar('lang');?>"><?php echo JText::_('CONTACT');?></a></li>
							</ul>
						</div>
					</div>
					<div class="contact-right">
						<div class="clear-fix" id="event-wrapper">
							<table id="table-event">
								<tbody>
									<tr class="table-heading">
										<th width="35"><?php echo JText::_('EXHIBITIONS');?></th>
										<th width="25"><?php echo JText::_('DATE');?></th>
										<th width="40"><?php echo JText::_('VENUE');?></th>
									</tr>
									<?php foreach($this->items as $item){?>
									<tr>
										<td width="35"><?php echo $item->title;?></td>
										<td width="25"><?php echo $item->introtext;?></td>
										<td width="40"><?php echo $item->fulltext;?></td>
									</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
