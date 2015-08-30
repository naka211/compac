<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
$session = JFactory::getSession();
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
$coords = $db->loadObjectList();

if($session->get("screenWidth") <= 320){
	$ratio = 0.81;
} else {
	$ratio = 1;
}
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
<section class="products">
	<div class="container">
		<div class="col-xs-12">
			<h2 class="no-span"><?php echo $this->product->product_name ?></h2>
			<div class="row showproduct">
				<div id="carousel" class="carousel slide thumb-larg" data-ride="carousel">
					<div class="carousel-inner">
						<img class="img-responsive" src="<?php echo JURI::base().$imageArr[0]->file_url;?>" id="ha-img">
					</div>
				</div> 
				<div class="clearfix">
					<div id="thumbcarousel" class="carousel slide" data-interval="false">
						<div class="carousel-inner">
							<div class="row mt20">
								<?php foreach($imageArr as $image){?>
								<div class="col-xs-4">
									<div class="thumb"><img class="img-responsive ha-sub-img" src="<?php echo JURI::base().$image->file_url;?>"></div>
								</div>
								<?php }?>
							</div>
							<div class="row mt20">
								<h5 class="h5"><?php echo JText::_('ACCESSORIES');?></h5>
								<?php foreach($accessArr as $access){?>
								<div class="col-xs-4">
									<div class="thumb"><img class="img-responsive ha-sub-img" src="<?php echo JURI::base().$access->file_url;?>"></div>
								</div>
								<?php }?>
							</div>							                
						</div><!-- /carousel-inner -->
						
					</div> <!-- /thumbcarousel -->
				</div><!-- /clearfix -->
			</div>
			<div class="row mt20">
				<div class="info-pro clearfix">
					<div style="background-color:white; width:100%; float:left;">
					<div class="col-xs-12 pad0 img-larg">
						<img src="<?php echo JURI::base().'images/upload/'.$this->product->coord_image;?>">
						<?php for($i = 0; $i < count($coords); $i++){?>
						<span style="top: <?php echo $coords[$i]->y;?>px; left: <?php echo $coords[$i]->x*$ratio;?>px;" class="circle"><?php echo $i + 1; ?></span>
						<?php }?>
					</div>
					</div>
					<div class="col-xs-12">
						<?php for($i = 0; $i < count($coords); $i++){?>
						<div class="row info-item">
							<div class="col-xs-2">
								<h1><?php echo $i + 1; ?></h1>
							</div>
							<div class="col-xs-10">
								<?php echo vmText::_($coords[$i]->description); ?>
							</div>
						</div>
						<?php }?>
					</div>
					<?php if($tech_file){?>
					<div class="row">
						<div class="col-xs-12">
							<img src="<?php echo JURI::base();?>plugins/system/vm_multiupload_attachment/js/multiupload/server/uploads/<?php echo $tech_file;?>" alt="" class="img-responsive">
						</div>
					</div>
					<?php }?>
				</div>
			</div>
			<?php
			if(!empty($this->product->product_url)){
				$youtubeid = ""; 
				preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$this->product->product_url,$matches);
				if(count($matches)){
					$youtubeid = $matches[1];
					$youtublink = 'http://www.youtube.com/embed/'. $youtubeid."?rel=0";
				}
			?>
			<div class="row mt20">
				<h5 class="h5 ml0"><?php echo JText::_('PRESENTATION'); ?></h5>
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="<?php echo $youtublink;?>"></iframe>
				</div>
			</div>
			<?php }?>
			<div class="row mt20">
				<?php if($pdf_file){?>
				<div class="col-xs-12 pad0">
					<a class=" btn btn-intros" href="<?php echo JURI::base();?>plugins/system/vm_multiupload_attachment/js/multiupload/server/uploads/<?php echo $pdf_file;?>"><span class="text"><?php echo JText::_('MANUAL');?></span><span class="icon-PDF"></span></a>
				</div>
				<?php }?>
				<div class="col-xs-12 pad0 mt10">
					<a class="btn btn-intros mr0" href="index.php?option=com_virtuemart&view=category&layout=documents&virtuemart_category_id=10&Itemid=1001&lang=en"><span class="text2"><?php echo JText::_('SPARE_PARTS');?></span><span class="icon-setting"></span></a>
				</div>
			</div>
		</div>
	</div>
</section>