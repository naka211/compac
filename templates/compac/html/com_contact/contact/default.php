<?php
defined('_JEXEC') or die;
?>
<div id="max-container-content" class="max-container">
	<div class="container">
		<div class="content">
			<div id="contact-page" class="template clear-fix">
				<div class="heading clear-fix">
					<h2><?php echo $this->contact->name; ?></h2>
				</div>
				<div class="contact-wrapper clear-fix">
					<div class="contact-left">
						<h2>{article 1115}{title}{/article}</h2>
						{article 1115}{introtext}{/article}
						<div id="contact-link">
							<ul>
															
														<li><a id="c-who" href="index.php?option=com_content&view=category&layout=contact&id=50&Itemid=1003&lang=<?php echo JRequest::getVar('lang');?>">Contact info</a></li>
														
							<li><a id="c-event" href="index.php?option=com_content&view=category&layout=exhibitions&id=51&Itemid=1003&lang=<?php echo JRequest::getVar('lang');?>">Exhibitions</a></li>								
							</ul>
						</div>
					</div>
					<div class="contact-right">
											
						
												
						<form id="emailForm" name="emailForm" method="post" action="/index.php?option=com_mwccontact&amp;mid=5&amp;Itemid=63&amp;lang=en" class="form-contact">
							<div class="contact-col-1">
								<h2>Where can we contact you</h2>
								<div class="eachInput clear-fix">
									<label for="company" class="txt1" style="display: block; position: absolute; z-index: 2; left: 216px; top: 64px;">Company</label><input type="text" name="company" id="company" class="input-txt input-toggle" title="Company" value=""><span class="red span-input">*</span>
								</div>
								<div class="eachInput clear-fix">
									<label for="address" class="txt1" style="display: block; position: absolute; z-index: 2; left: 216px; top: 96px;">Address</label><input type="text" id="address" name="address" class="input-txt input-toggle" title="Address" value="">
								</div>
								<div class="eachInput clear-fix">
									<label for="postalcode" class="txt1" style="display: block; position: absolute; z-index: 2; left: 216px; top: 128px;">Postal Code</label><input type="text" id="postalcode" name="postalcode" class="input-txt input-toggle" title="Postal Code" value="">
								</div>
								<div class="eachInput clear-fix">
									<label for="city" class="txt1" style="display: block; position: absolute; z-index: 2; left: 216px; top: 160px;">City</label><input type="text" id="city" name="city" class="input-txt input-toggle" title="City" value="">
								</div>
								<div class="eachInput clear-fix">
									<label for="country" class="txt1" style="display: block; position: absolute; z-index: 2; left: 216px; top: 192px;">Country</label><input type="text" id="country" name="country" class="input-txt input-toggle" title="Country" value="">
								</div>
								<div class="eachInput clear-fix">
									<label for="name" class="txt1" style="display: block; position: absolute; z-index: 2; left: 216px; top: 224px;">Name</label><input type="text" id="name" name="name" class="input-txt input-toggle" title="Name" value=""><span class="red span-input">*</span>
								</div>
								<div class="eachInput clear-fix">
									<label for="phone" class="txt1" style="display: block; position: absolute; z-index: 2; left: 216px; top: 256px;">Phone</label><input type="text" id="phone" name="phone" class="input-txt input-toggle" title="Phone" value=""><span class="red span-input">*</span>
								</div>
								<div class="eachInput clear-fix">
									<label for="fax" class="txt1" style="display: block; position: absolute; z-index: 2; left: 216px; top: 288px;">Fax</label><input type="text" name="fax" id="fax" class="input-txt input-toggle" title="Fax" value="">
								</div>
								<div class="eachInput clear-fix">
									<label for="email" class="txt1" style="display: block; position: absolute; z-index: 2; left: 216px; top: 320px;">E-mail</label><input type="text" name="email" id="email" class="input-txt input-toggle" title="E-mail" value=""><span class="red span-input">*</span>
								</div>
								<p>Fields marked <span class="red">*</span> must be filled out to submit.</p>							</div>
							<div class="contact-col-2">
								<h2>Please contact us for further information</h2>
																<div class="eachInput clear-fix">
									<input type="checkbox" value="Information about the nearest COMPAC dealer" name="futureinfo[]" id="futureinfo_4" class="input-chk">
									<span>Information about the nearest COMPAC dealer</span>
								</div>
																<div class="eachInput clear-fix">
									<input type="checkbox" value="Spare parts for COMPAC products" name="futureinfo[]" id="futureinfo_5" class="input-chk">
									<span>Spare parts for COMPAC products</span>
								</div>
																<div class="eachInput clear-fix">
									<input type="checkbox" value="We would like to be contacted by COMPAC" name="futureinfo[]" id="futureinfo_6" class="input-chk">
									<span>We would like to be contacted by COMPAC</span>
								</div>
																
								<div class="tempContact">
									<h2>Please send us leaflets on the following products</h2>
																		<div class="eachInput clear-fix"><input type="checkbox" value="Trolley Jacks" name="leaflets[]" id="leaflets_7" class="input-chk"><span>Trolley Jacks</span></div>
																		<div class="eachInput clear-fix"><input type="checkbox" value="Axle Stands" name="leaflets[]" id="leaflets_8" class="input-chk"><span>Axle Stands</span></div>
																		<div class="eachInput clear-fix"><input type="checkbox" value="Air-hydraulic Jacks" name="leaflets[]" id="leaflets_9" class="input-chk"><span>Air-hydraulic Jacks</span></div>
																		<div class="eachInput clear-fix"><input type="checkbox" value="Bottle Jacks" name="leaflets[]" id="leaflets_10" class="input-chk"><span>Bottle Jacks</span></div>
																		<div class="eachInput clear-fix"><input type="checkbox" value="Transmission Jacks" name="leaflets[]" id="leaflets_11" class="input-chk"><span>Transmission Jacks</span></div>
																		<div class="eachInput clear-fix"><input type="checkbox" value="Workshop Presses" name="leaflets[]" id="leaflets_12" class="input-chk"><span>Workshop Presses</span></div>
																		<div class="eachInput clear-fix"><input type="checkbox" value="Body Repair kit" name="leaflets[]" id="leaflets_13" class="input-chk"><span>Body Repair kit</span></div>
																		<div class="eachInput clear-fix"><input type="checkbox" value="Workshop Cranes" name="leaflets[]" id="leaflets_14" class="input-chk"><span>Workshop Cranes</span></div>
																		<div class="eachInput clear-fix"><input type="checkbox" value="Wheel Dolly" name="leaflets[]" id="leaflets_15" class="input-chk"><span>Wheel Dolly</span></div>
																		<div class="eachInput clear-fix"><input type="checkbox" value="Spring Compressor" name="leaflets[]" id="leaflets_16" class="input-chk"><span>Spring Compressor</span></div>
																		
								</div>
							</div>
							<div class="clear"></div>	
							<label>Comments</label>
							<textarea name="message" id="message"></textarea>
							<div class="contact-submit clear-fix">
								<a onclick="click_send()" id="" class="btnSend" href="javascript:void(0)">Send</a>
								<input type="submit" style="display: none" value="Send" id="send" name="send">
								<input type="reset" value="Reset" id="" class="btnReset">
							</div>
							<input type="hidden" value="com_contact" name="option">
							<input type="hidden" value="contact" name="view">
							<input type="hidden" value="submit" name="task">
							<input type="hidden" value="1" name="id">
							<input type="hidden" value="5" name="mid">
							
							<input type="hidden" value="1" name="4a6e299164fd154370ae03114d477a9b">						</form>
											</div>
				</div>				
			</div>			
		</div>
	</div>
</div>