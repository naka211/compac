<?php
defined('_JEXEC') or die;
$tmpl = JURI::base().'templates/compac/';
?>
<div class="max-container" id="max-container-slider">
		<div class="slider clear-fix">
			<div class="welcome-wrapper">
				<h2>{article 55}{title}{/article}</h2>
				{article 55}{introtext}{/article}
				<a href="contact.php" id="btnFindUs"><?php echo JText::_('FIND_US_HERE');?></a>
			</div>
			<div class="slider-wrapper">
				{module Banners}
			</div>
		</div>
	</div>

	<div class="max-container" id="max-container-content">
		<div class="container">
			<div class="content">
				<div class="template clear-fix" id="homepage-wrapper">
					{module Documentation}
					{module Spare parts}
					{module News}
				</div>
			</div>
		</div>
	</div>