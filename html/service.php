<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once("head.php"); ?>
<title><?php returnTitle('COMPAC'); ?></title>
</head>
<body>
	<?php 
		$t = 3;
		require_once('header.php'); 
	?>
<div class="max-container" id="max-container-content">
	<div class="container">
		<div class="content">
			<div class="template clear-fix" id="news-page">
				<div class="heading clear-fix">
					<h2>SERVICES</h2>
				</div>
				<div class="news-wrapper clear-fix">
					<div class="prd-item">
                    	<a href="service_list.php"><span>Spare parts</span>
                        	<img src="images/news_img1.jpg"/>
                        </a>
                    </div>
                    <div class="prd-item">
                    	<a href="service_list.php"><span>Wheels</span>
                        	<img src="images/news_img2.jpg"/>
                        </a>
                    </div>
					<div class="prd-item">
                    	<a href="service_list.php"><span>Garanti</span>
                        	<img src="images/news_img3.jpg"/>
                        </a>
                    </div>
					<div class="prd-item">
                    	<a href="service_list.php"><span>Dokumentation</span>
                        	<img src="images/news_img4.jpg"/>
                        </a>
                    </div>
                    <div class="prd-item">
                    	<a href="service_list.php"><span>Oil</span>
                        	<img src="images/news_img5.jpg"/>
                        </a>
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
