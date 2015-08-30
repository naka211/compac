<?php
defined('_JEXEC') or die;
$tmpl = JURI::base().'templates/compac/mobile/';
?>

<section class="banner text-center">
	{module Banners}
	
	<h2>{article 55}{title}{/article}</h2>
	{article 55}{introtext}{/article}
	<a class="btn btnFind" href="index.php?option=com_contact&view=contact&id=1&Itemid=1003&lang=<?php echo JRequest::getVar('lang');?>"><?php echo JText::_('FIND_US_HERE');?><i class="fa fa-chevron-right fa-lg"></i></a>
	<div class="row">
		<div class="col-xs-12">
			<a href="http://apps.appmachine.com/compac" target="_blank" class="btn btnFind mr0">Download Compac App <i class="fa fa-cloud-download fa-lg"></i></a>
		</div>
	</div>
</section>
<section class="main">
	<div class="container">
		{module Documentation}
		{module Spare parts}
		{module News}
	</div>
</section>