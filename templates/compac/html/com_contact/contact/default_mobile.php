<?php
defined('_JEXEC') or die;
JHTML::_('behavior.formvalidator');
$tmpl = JURI::base().'templates/compac/mobile/';
?>
<script type="text/javascript" src="<?php echo $tmpl;?>js/jquery.h5validate.js"></script>
<script>
jQuery(document).ready(function () {
    jQuery('form').h5Validate();
});
</script>
<style>
.invalid {border: 1px solid red;}
</style>
<div class="container contact">
	<div class="row">
		<div class="col-md-12">
			<h2 class="no-span"><?php echo JText::_('CONTACT'); ?></h2>
			<div class="row mt20">
				<div class="col-xs-12">
					<h3>{article 1115}{title}{/article}</h3>
				</div>
				<div class="col-xs-6">
					{article 1115}{introtext}{/article}
				</div>
				<div class="col-xs-6">
					{article 1115}{fulltext}{/article}
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<a class="btn btnContact" href="index.php?option=com_content&view=category&layout=contact&id=50&Itemid=1003&lang=<?php echo JRequest::getVar('lang');?>"><?php echo JText::_('CONTACT_INFO');?> <i class="fa fa-angle-double-right fa-lg"></i></a>
				</div>
				<div class="col-xs-6">
					<a class="btn btnContact" href="index.php?option=com_content&view=category&layout=exhibitions&id=51&Itemid=1003&lang=<?php echo JRequest::getVar('lang');?>"><?php echo JText::_('EXHIBITIONS');?> <i class="fa fa-angle-double-right fa-lg"></i></a>
				</div>
			</div>
			<div class="line-hr clearfix"></div>
			<div class="row">
				<div class="col-xs-12">
					<h3><?php echo JText::_('WHERE_CAN');?></h3>
					<form id="emailForm" name="emailForm" method="post" action="index.php" class="form-validate">
						<div class="form-group">
							<input type="text" class="form-control required" placeholder="<?php echo JText::_('COMPANY');?>" name="company">
							<span class="red">*</span>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="<?php echo JText::_('ADDRESS');?>" name="address">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="<?php echo JText::_('POSTAL_CODE');?>" name="postalcode">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="<?php echo JText::_('CITY');?>" name="city">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="<?php echo JText::_('COUNTRY');?>" name="country">
						</div>
						<div class="form-group">
							<input type="text" class="form-control required" placeholder="<?php echo JText::_('NAME');?>" name="name">
							<span class="red">*</span>
						</div>
						<div class="form-group">
							<input type="text" class="form-control required" placeholder="<?php echo JText::_('PHONE');?>" name="phone">
							<span class="red">*</span>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="<?php echo JText::_('FAX');?>" name="fax">
						</div>
						<div class="form-group">
							<input type="text" class="form-control required validate-email" placeholder="<?php echo JText::_('EMAIL');?>" name="email">
							<span class="red">*</span>
						</div>
						<p><?php echo JText::_('FILL_OUT');?></p>
						<div class="line-hr clearfix"></div>
						<h3><?php echo JText::_('PLEASE_CONTACT');?></h3>
						<div class="checkbox">
							<label><input type="checkbox" value="<?php echo JText::_('PLEASE_CONTACT1');?>" name="futureinfo[]"><?php echo JText::_('PLEASE_CONTACT1');?></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" value="<?php echo JText::_('PLEASE_CONTACT2');?>" name="futureinfo[]"><?php echo JText::_('PLEASE_CONTACT2');?></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" value="<?php echo JText::_('PLEASE_CONTACT3');?>" name="futureinfo[]"><?php echo JText::_('PLEASE_CONTACT3');?></label>
						</div>
						<h3><?php echo JText::_('PLEASE_SEND');?></h3>
						<div class="checkbox">
							<label><input type="checkbox" value="<?php echo JText::_('PLEASE_SEND1');?>" name="leaflets[]"><?php echo JText::_('PLEASE_SEND1');?></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" value="<?php echo JText::_('PLEASE_SEND2');?>" name="leaflets[]"><?php echo JText::_('PLEASE_SEND2');?></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" value="<?php echo JText::_('PLEASE_SEND3');?>" name="leaflets[]"><?php echo JText::_('PLEASE_SEND3');?></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" value="<?php echo JText::_('PLEASE_SEND4');?>" name="leaflets[]"><?php echo JText::_('PLEASE_SEND4');?></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" value="<?php echo JText::_('PLEASE_SEND5');?>" name="leaflets[]"><?php echo JText::_('PLEASE_SEND5');?></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" value="<?php echo JText::_('PLEASE_SEND6');?>" name="leaflets[]"><?php echo JText::_('PLEASE_SEND6');?></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" value="<?php echo JText::_('PLEASE_SEND7');?>" name="leaflets[]"><?php echo JText::_('PLEASE_SEND7');?></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" value="<?php echo JText::_('PLEASE_SEND8');?>" name="leaflets[]"><?php echo JText::_('PLEASE_SEND8');?></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" value="<?php echo JText::_('PLEASE_SEND9');?>" name="leaflets[]"><?php echo JText::_('PLEASE_SEND9');?></label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" value="<?php echo JText::_('PLEASE_SEND10');?>" name="leaflets[]"><?php echo JText::_('PLEASE_SEND10');?></label>
						</div>
						<p><?php echo JText::_('COMMENTS');?></p>
						<div class="form-group">
							<textarea class="form-control" name="message"></textarea>
						</div>
						<input type="submit" value="<?php echo JText::_('SEND');?>" name="send" class="btn btnSend validate">
						<input type="reset" value="<?php echo JText::_('RESET');?>" class="btn btnReset">
						<!--<a class="btn btnSend" href="#">Send</a>
						<a class="btn btnReset" href="#">Reset</a>-->
					</form>
				</div>
			</div>
		</div>
	</div>
</div>