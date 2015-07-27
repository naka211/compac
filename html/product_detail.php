<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once("head.php"); ?>
<title><?php returnTitle('COMPAC'); ?></title>
</head>
<body>
	<?php 
		$t = 4;
		require_once('header.php'); 
	?>
<div class="max-container" id="max-container-content">
	<div class="container">
		<div class="content">
			<div class="template clear-fix" id="product-wrapper">
				<div class="heading clear-fix">
					<h2>JACK</h2>
                  </div>
                  <div class="breakcum">
                    	<ul>
                        	<li class="first"><a href="product.php">Product</a></li>
                            <li><a href="#">Jacks</a></li>
                        </ul>
                    </div>
                     <div class="clear"></div>
                    <div class="prd-detail">
                    	<div class="left-prd">
                        	<div class="img-larg"><img src="images/img_lar.jpg" alt=""/></div>
                            <ul class="sub-prd">
                            	<li><a href="#"><img src="images/img_small.jpg" alt=""/></a></li>
                                <li><a href="#"><img src="images/img_small.jpg" alt=""/></a></li>
                                <li><a href="#"><img src="images/img_small.jpg" alt=""/></a></li>
                            </ul>
                            <a class="btn-down" href="#"><img src="images/btn_download.jpg" alt=""/></a>
                        </div>
                        <div class="right-prd">
                        	<h4>Highlift jack</h4>
                            <div class="img-prd">
                            	<div class="stick actived" style="top:40px; left:50px;">1</div>
                                <div class="stick" style="top:120px; left:50px;">2</div>
                                <div class="stick" style="top:180px; left:50px;">3</div>
                                <div class="stick" style="top:300px; left:80px;">4</div>
                                <div class="stick" style="top:300px; left:280px;">5</div>
                                <div class="stick" style="top:220px; left:220px;">6</div>
                            	<img src="images/prd_img1.jpg" alt=""/>
                            </div>
                            <div class="description">
                            	<ul>
                                	<li class="actived"><span>1</span>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                    <li><span>2</span>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                    <li><span>3</span>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                    <li><span>4</span>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                    <li><span>5</span>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                    <li><span>6</span>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                                </ul>
                            </div>
                        </div>
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
