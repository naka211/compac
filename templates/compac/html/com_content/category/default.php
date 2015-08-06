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
			<div id="news-page" class="template clear-fix">
				<div class="heading clear-fix">
					<h2><?php echo $this->category->title;?></h2>
				</div>
				<div class="news-wrapper clear-fix">
					<?php foreach($this->items as $item){
					$link = "index.php?option=com_content&view=article&id=".$item->id."&Itemid=1004";
					$images = json_decode($item->images);
					$tmp = explode(" ", $item->created);
					$tmp1 = explode("-", $tmp[0]);
					?>
					<div class="eachNews clear-fix">
						<div class="news-left"> <a href="<?php echo $link;?>"><img alt="" src="<?php echo $images->image_intro;?>"></a> </div>
						<div class="news-right">
							<h1><a href="<?php echo $link;?>"><?php echo $item->title;?></a></h1>
							<h3><?php echo $tmp1[2].'-'.$tmp1[1].'-'.$tmp1[0];?></h3>
							<?php echo $item->introtext;?>
							<a class="read-more" href="<?php echo $link;?>"><?php echo JText::_("READ_MORE");?>...</a> </div>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
