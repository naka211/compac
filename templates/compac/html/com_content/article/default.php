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
    include('default_mobile.php');
    return;
}
//Detect mobile ends
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
				<a class="read-more-2" href="javascript:history.go(-1);"><?php echo JText::_('BACK');?></a>
				</div>				
			</div>			
		</div>
	</div>
</div>