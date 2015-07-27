<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once("head.php"); ?>
<title><?php returnTitle('COMPAC'); ?></title>
</head>
<body>
	<?php 
		$t = 1;
		require_once('header.php'); 
		require_once('slider.php');
	?>
<div class="max-container" id="max-container-content">
	<div class="container">
		<div class="content">
			<div class="template clear-fix" id="homepage-wrapper">
				<div class="homepage-col" id="hp-col1">
					<div class="heading clear-fix">
						<h2>Services</h2>
					</div>
					<div class="hp-col-content">
						<a class="hp-a-link" href=""><img src="images/temp1.jpg" alt="Service" /></a>
						<p>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.</p>
						<a href="service.php" class="read-more">Read more</a>
					</div>
				</div>
				<div class="homepage-col" id="hp-col2">
					<div class="heading clear-fix">
						<h2>PARTS</h2>
					</div>
					<div class="hp-col-content">
						<a class="hp-a-link" href=""><img src="images/temp2.jpg" alt="Service" /></a>
						<p>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.</p>
						<a href="product.php" class="read-more">Read more</a>
					</div>					
				</div>
				<div class="homepage-col" id="hp-col3">
					<div class="heading clear-fix">
						<h2>DOCUMENTATION</h2>
					</div>
					<div class="hp-col-content">
						<a class="hp-a-link" href=""><img src="images/temp3.jpg" alt="Service" /></a>
						<p>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.</p>
						<a href="template.php" class="read-more">Read more</a>
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>
<div class="max-container" id="max-container-footer">
	<?php 
		require_once('slider_product.php');
		require_once('footer.php');
	 ?>
</div>
</body>
</html>
