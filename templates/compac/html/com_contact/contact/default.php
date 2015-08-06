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
JHTML::_('behavior.formvalidator');
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
						{article 1115}{text}{/article}
						<div id="contact-link">
							<ul>
								<li><a id="c-who" href="index.php?option=com_content&view=category&layout=contact&id=50&Itemid=1003&lang=<?php echo JRequest::getVar('lang');?>"><?php echo JText::_('CONTACT_INFO');?></a></li>
								<li><a id="c-event" href="index.php?option=com_content&view=category&layout=exhibitions&id=51&Itemid=1003&lang=<?php echo JRequest::getVar('lang');?>"><?php echo JText::_('EXHIBITIONS');?></a></li>
							</ul>
						</div>
					</div>
					<div class="contact-right">
						<form id="emailForm" name="emailForm" method="post" action="index.php" class="form-contact form-validate" >
							<div class="contact-col-1">
								<h2><?php echo JText::_('WHERE_CAN');?></h2>
								<div class="eachInput clear-fix">
									<input type="text" name="company" id="company" class="input-txt required" title="Company" value="" placeholder="<?php echo JText::_('COMPANY');?>">
									<span class="red span-input">*</span> </div>
								<div class="eachInput clear-fix">
									<input type="text" id="address" name="address" class="input-txt" title="Address" value="" placeholder="<?php echo JText::_('ADDRESS');?>">
								</div>
								<div class="eachInput clear-fix">
									<input type="text" id="postalcode" name="postalcode" class="input-txt" title="Postal Code" value="" placeholder="<?php echo JText::_('POSTAL_CODE');?>">
								</div>
								<div class="eachInput clear-fix">
									<input type="text" id="city" name="city" class="input-txt" title="City" value="" placeholder="<?php echo JText::_('CITY');?>">
								</div>
								<div class="eachInput clear-fix">
									<input type="text" id="country" name="country" class="input-txt" title="Country" value="" placeholder="<?php echo JText::_('COUNTRY');?>">
								</div>
								<div class="eachInput clear-fix">
									<input type="text" id="name" name="name" class="input-txt required" title="Name" value="" placeholder="<?php echo JText::_('NAME');?>">
									<span class="red span-input">*</span> </div>
								<div class="eachInput clear-fix">
									<input type="text" id="phone" name="phone" class="input-txt required" title="Phone" value="" placeholder="<?php echo JText::_('PHONE');?>">
									<span class="red span-input">*</span> </div>
								<div class="eachInput clear-fix">
									<input type="text" name="fax" id="fax" class="input-txt" title="Fax" value="" placeholder="<?php echo JText::_('FAX');?>">
								</div>
								<div class="eachInput clear-fix">
									<input type="text" name="email" id="email" class="input-txt required validate-email" title="E-mail" value="" placeholder="<?php echo JText::_('EMAIL');?>">
									<span class="red span-input">*</span> </div>
								<p><?php echo JText::_('FILL_OUT');?></p>
							</div>
							<div class="contact-col-2">
								<h2><?php echo JText::_('PLEASE_CONTACT');?></h2>
								<div class="eachInput clear-fix">
									<input type="checkbox" value="<?php echo JText::_('PLEASE_CONTACT1');?>" name="futureinfo[]" id="futureinfo_4" class="input-chk">
									<span><?php echo JText::_('PLEASE_CONTACT1');?></span> </div>
								<div class="eachInput clear-fix">
									<input type="checkbox" value="<?php echo JText::_('PLEASE_CONTACT2');?>" name="futureinfo[]" id="futureinfo_5" class="input-chk">
									<span><?php echo JText::_('PLEASE_CONTACT2');?></span> </div>
								<div class="eachInput clear-fix">
									<input type="checkbox" value="<?php echo JText::_('PLEASE_CONTACT3');?>" name="futureinfo[]" id="futureinfo_6" class="input-chk">
									<span><?php echo JText::_('PLEASE_CONTACT3');?></span> </div>
								<div class="tempContact">
									<h2><?php echo JText::_('PLEASE_SEND');?></h2>
									<div class="eachInput clear-fix">
										<input type="checkbox" value="<?php echo JText::_('PLEASE_SEND1');?>" name="leaflets[]" id="leaflets_7" class="input-chk">
										<span><?php echo JText::_('PLEASE_SEND1');?></span></div>
									<div class="eachInput clear-fix">
										<input type="checkbox" value="<?php echo JText::_('PLEASE_SEND2');?>" name="leaflets[]" id="leaflets_8" class="input-chk">
										<span><?php echo JText::_('PLEASE_SEND2');?></span></div>
									<div class="eachInput clear-fix">
										<input type="checkbox" value="<?php echo JText::_('PLEASE_SEND3');?>" name="leaflets[]" id="leaflets_9" class="input-chk">
										<span><?php echo JText::_('PLEASE_SEND3');?></span></div>
									<div class="eachInput clear-fix">
										<input type="checkbox" value="<?php echo JText::_('PLEASE_SEND4');?>" name="leaflets[]" id="leaflets_10" class="input-chk">
										<span><?php echo JText::_('PLEASE_SEND4');?></span></div>
									<div class="eachInput clear-fix">
										<input type="checkbox" value="<?php echo JText::_('PLEASE_SEND5');?>" name="leaflets[]" id="leaflets_11" class="input-chk">
										<span><?php echo JText::_('PLEASE_SEND5');?></span></div>
									<div class="eachInput clear-fix">
										<input type="checkbox" value="<?php echo JText::_('PLEASE_SEND6');?>" name="leaflets[]" id="leaflets_12" class="input-chk">
										<span><?php echo JText::_('PLEASE_SEND6');?></span></div>
									<div class="eachInput clear-fix">
										<input type="checkbox" value="<?php echo JText::_('PLEASE_SEND7');?>" name="leaflets[]" id="leaflets_13" class="input-chk">
										<span><?php echo JText::_('PLEASE_SEND7');?></span></div>
									<div class="eachInput clear-fix">
										<input type="checkbox" value="<?php echo JText::_('PLEASE_SEND8');?>" name="leaflets[]" id="leaflets_14" class="input-chk">
										<span><?php echo JText::_('PLEASE_SEND8');?></span></div>
									<div class="eachInput clear-fix">
										<input type="checkbox" value="<?php echo JText::_('PLEASE_SEND9');?>" name="leaflets[]" id="leaflets_15" class="input-chk">
										<span><?php echo JText::_('PLEASE_SEND9');?></span></div>
									<div class="eachInput clear-fix">
										<input type="checkbox" value="<?php echo JText::_('PLEASE_SEND10');?>" name="leaflets[]" id="leaflets_16" class="input-chk">
										<span><?php echo JText::_('PLEASE_SEND10');?></span></div>
								</div>
							</div>
							<div class="clear"></div>
							<label><?php echo JText::_('COMMENTS');?></label>
							<textarea name="message" id="message"></textarea>
							<div class="contact-submit clear-fix">
								<!--<a onclick="click_send()" id="" class="btnSend" href="javascript:void(0)">Send</a>-->
								<input type="submit" style="cursor:pointer;" value="<?php echo JText::_('SEND');?>" id="send" name="send" class="btnSend validate">
								<input type="reset" value="<?php echo JText::_('RESET');?>" class="btnReset">
							</div>
							<input type="hidden" name="option" value="com_contact" />
							<input type="hidden" name="task" value="contact.submit" />
							<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
							<input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
							<?php echo JHtml::_('form.token'); ?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
