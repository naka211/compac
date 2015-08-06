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
    include('thankyou_mobile.php');
    return;
}
//Detect mobile ends
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