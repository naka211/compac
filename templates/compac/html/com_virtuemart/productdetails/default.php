<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
$imageArr = array();
$accessArr = array();
foreach($this->product->images as $image){
	if($image->file_is_downloadable == 1){
		$accessArr[] = $image;
	}
	if($image->file_is_downloadable == 0){
		$imageArr[] = $image;
	}
}
$db = JFactory::getDBO();
$db->setQuery("SELECT file_name FROM #__virtuemart_product_attachments WHERE virtuemart_product_id = ".(int)$this->product->virtuemart_product_id);
$files = $db->loadObjectList();
foreach($files as $file){
	$ext = substr($file->file_name, -3, 3);
	if(strtolower($ext) == "pdf"){
		$pdf_file = $file->file_name;
	} else {
		$tech_file = $file->file_name;
	}
}

$q = 
$db->setQuery("SELECT * FROM #__virtuemart_product_coord WHERE product_id = ".(int)$this->product->virtuemart_product_id." ORDER BY `order` ASC");
$coords = $db->loadObjectList();print_r($coords);exit;
?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(".stick").mouseenter(function(){
			var target = jQuery('#'+jQuery(this).attr('target'));
			jQuery(target).attr('class','actived clear-fix');
			jQuery(this).attr('class','stick actived clear-fix');
		});
		jQuery(".stick").mouseout(function(){
			var target = jQuery('#'+jQuery(this).attr('target'));
			jQuery(target).attr('class','clear-fix');
			jQuery(this).attr('class','stick clear-fix');
		});
		jQuery(".ha-sub-img").click(function(){
			var temp = jQuery(this).attr("src");
			var main = jQuery("#ha-img").attr("src");
			jQuery("#ha-img").attr("src",temp);
			//jQuery(this).attr("src",main);
		});
	});
</script>
<div id="max-container-content" class="max-container">
	<div class="container">
		<div class="content">
			<div id="product-wrapper" class="template clear-fix">
				<div class="heading clear-fix">
					<h2><?php echo $this->product->product_name ?></h2>
				</div>
				<div class="clear"></div>
				<div class="prd-detail">
					<div class="left-prd">
						<div class="img-larg"><img src="<?php echo JURI::base().$imageArr[0]->file_url;?>" id="ha-img"></div>
						<ul class="sub-prd">
							<?php foreach($imageArr as $image){?>
							<li><a href="#"><img width="92" height="52" alt="" src="<?php echo JURI::base().$image->file_url;?>" class="ha-sub-img"></a></li>
							<?php }?>
						</ul>
						<div class="clear-fix">&nbsp;</div>
						<!-- <h4 class="title-h4">TILBEHØR:</h4> -->
						<h4 style="font-size: 16px; padding: 10px 0 0; color: #318C6D; font-weight: bold; border-bottom: 1px solid #318C6D; " class="title-h4"><?php echo JText::_('ACCESSORIES');?></h4>
						<ul class="sub-prd">
							<?php foreach($accessArr as $access){?>
							<li><a href="#"><img width="92" height="52" alt="" src="<?php echo JURI::base().$access->file_url;?>" class="ha-sub-img"></a></li>
							<?php }?>
						</ul>
						<div class="clear-fix"></div>
						<?php
						if(!empty($this->product->product_url)){
						
							$youtubeid = ""; 
							preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$this->product->product_url,$matches);
							if(count($matches)){
								$youtubeid = $matches[1];
								$youtubeimagelink = 'http://img.youtube.com/vi/' . $youtubeid . "/0.jpg";
								$youtublink = 'http://www.youtube.com/embed/'. $youtubeid."?rel=0";
							}
						?>
						<br />
						<h4 class="title-h4" style="font-size: 16px; padding: 10px 0 0; color: #318C6D; font-weight: bold; border-bottom: 1px solid #318C6D; "><?php echo JText::_('PRESENTATION'); ?></h4>
						<div style="margin-top: 10px">
						<a href="<?php echo $youtublink?>" class="fancybox iframe"><img src="<?php echo $youtubeimagelink;?>" width="300" alt=""/></a>
						</div>
						<div class="clear-fix"></div>
						<?php }?>
						<?php if($pdf_file){?>
						<a target="_blank" href="<?php echo JURI::base();?>plugins/system/vm_multiupload_attachment/js/multiupload/server/uploads/<?php echo $pdf_file;?>" class="bnt-1 mt20"><?php echo JText::_('MANUAL');?><span class="iconPDF"></span></a>
						<div class="clear"></div>
						<?php }?>
						<a target="_blank" href="index.php?option=com_virtuemart&view=category&layout=documents&virtuemart_category_id=10&Itemid=1001&lang=en" class="bnt-1"><?php echo JText::_('SPARE_PARTS');?><span class="iconSharepart"></span></a> </div>
					<div class="right-prd">
						<h4><?php echo $this->product->product_name ?></h4>
						<div class="img-prd">
							<?php for($i = 0; $i < count($coords); $i++){?>
							<div class="stick" target="des_<?php echo $i;?>" style="top:<?php echo $coords[$i]->y;?>px; left:<?php echo $coords[$i]->x;?>px;"><?php echo $i + 1; ?></div>
							<?php }?>
							<img alt="" src="<?php echo JURI::base().'images/upload/'.$this->product->coord_image;?>"> </div>
						<div class="description">
							<ul>
								<?php for($i = 0; $i < count($coords); $i++){?>
								<li id="des_<?php echo $i; ?>" class="clear-fix"><span><?php echo $i + 1; ?></span><p><?php echo vmText::_($coords[$i]->description); ?></p></li>
								<?php }?>
							</ul>
						</div>
						<div class="clear"></div>
						<?php if($tech_file){?>
						<div class="prd-info"> <img alt="" src="<?php echo JURI::base();?>plugins/system/vm_multiupload_attachment/js/multiupload/server/uploads/<?php echo $tech_file;?>"> </div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
