<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once("head.php"); ?>
<title><?php returnTitle('COMPAC'); ?></title>
</head>
<body>
	<?php 
		$t = 5;
		require_once('header.php'); 
	?>
<div class="max-container" id="max-container-content">
	<div class="container">
		<div class="content">
			<div class="template clear-fix" id="contact-page">
				<div class="heading clear-fix">
					<h2>CONTACT</h2>
				</div>
				<div class="contact-wrapper clear-fix">
					<div class="contact-left">
						<h2>Compac Hydraulik A/S</h2>
						<p>Strandhusevej 43 <br />
							DK-7130 Juelsminde <br />
							Denmark</p>
						<p>Tel.: + 45 75 69 37 22<br />
						Fax: + 45 75 69 54 18<br />
						Email:  <a href="mailto:info@compac.dk">info@compac.dk</a><br />
						Web: <a href="http://www.compac.dk">www.compac.dk</a></p>
					</div>
					<div class="contact-right">
						<form action="">
							<div class="contact-col-1">
								<h2>Where can we contact you</h2>
								<div class="eachInput clear-fix">
									<input type="text" value="Company" class="input-txt input-toggle" /><span class="red span-input">*</span>
								</div>
								<div class="eachInput clear-fix">
									<input type="text" value="Address" class="input-txt input-toggle" />
								</div>
								<div class="eachInput clear-fix">
									<input type="text" value="Postal Code" class="input-txt input-toggle" />
								</div>
								<div class="eachInput clear-fix">
									<input type="text" value="City" class="input-txt input-toggle" />
								</div>
								<div class="eachInput clear-fix">
									<input type="text" value="Country" class="input-txt input-toggle" />
								</div>
								<div class="eachInput clear-fix">
									<input type="text" value="Name" class="input-txt input-toggle" /><span class="red span-input">*</span>
								</div>
								<div class="eachInput clear-fix">
									<input type="text" value="Phone" class="input-txt input-toggle" /><span class="red span-input">*</span>
								</div>
								<div class="eachInput clear-fix">
									<input type="text" value="Fax" class="input-txt input-toggle" />
								</div>
								<div class="eachInput clear-fix">
									<input type="text" value="E-mail" class="input-txt input-toggle" /><span class="red span-input">*</span>
								</div>
								<p>Fields Marked <span class="red">*</span> must be filled out to submit <br />
									Die mit <span class="red">*</span> gekennzeichneten Felder sind Pflichtfelder.</p>
							</div>
							<div class="contact-col-2">
								<h2>Please contact us for further information</h2>
								<div class="eachInput clear-fix">
									<input type="checkbox" class="input-chk" />
									<span>Information about the nearest COMPAC dealer</span>
								</div>
								<div class="eachInput clear-fix">
									<input type="checkbox" class="input-chk" />
									<span>Spare parts for COMPAC products</span>
								</div>
								<div class="eachInput clear-fix">
									<input type="checkbox" class="input-chk" />
									<span>We would like to be contacted by COMPAC</span>
								</div>
								<div class="tempContact">
									<h2>Please send us leaflets on the following products</h2>
									<div class="eachInput clear-fix"><input type="checkbox" class="input-chk" /><span>Trolley Jacks</span></div>
									<div class="eachInput clear-fix"><input type="checkbox" class="input-chk" /><span>Axle Stands</span></div>
									<div class="eachInput clear-fix"><input type="checkbox" class="input-chk" /><span>Air-hydraulic Jacks</span></div>
									<div class="eachInput clear-fix"><input type="checkbox" class="input-chk" /><span>Bottle Jacks</span></div>
									<div class="eachInput clear-fix"><input type="checkbox" class="input-chk" /><span>Transmission Jacks</span></div>
									<div class="eachInput clear-fix"><input type="checkbox" class="input-chk" /><span>Workshop Presses</span></div>
									<div class="eachInput clear-fix"><input type="checkbox" class="input-chk" /><span>Jacking Beams</span></div>
									<div class="eachInput clear-fix"><input type="checkbox" class="input-chk" /><span>Workshop Cranes</span></div>
									<div class="eachInput clear-fix"><input type="checkbox" class="input-chk" /><span>Wheel Dolly</span></div>
								</div>
							</div>
							<div class="clear"></div>	
							<label>Comments</label>
							<textarea></textarea>
							<div class="contact-submit clear-fix">
								<a href="" id="contact-send">Send</a>
								<input id="contact-reset" type="reset" value="reset" />
							</div>
						</form>						
					</div>
				</div>				
			</div>			
		</div>
	</div>
</div>
<div class="max-container" id="max-container-footer">
	<?php 		
		require_once('footer.php');
	 ?>
</div>
</body>
</html>
