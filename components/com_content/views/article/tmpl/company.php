<?php
defined('_JEXEC') or die;
$images  = json_decode($this->item->images);
?>
<div id="max-container-content" class="max-container">
	<div class="container">
		<div class="content">
			<div id="profile-wrapper" class="template clear-fix">
				<div class="heading clear-fix">
					<h2><?php echo $this->item->title;?></h2>
				</div>
				<div class="profile-page clear-fix">
					<div class="profile-left">
						<img alt="" src="<?php echo $images->image_intro;?>">
					</div>
					<div class="profile-right">
					<?php echo $this->item->text;?>	
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>