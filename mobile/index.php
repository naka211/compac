<!DOCTYPE html>
<html>
	<head>
		<?php require_once('head.php'); ?>
	</head>
	<body>
		<?php require_once('header.php'); ?>
		<?php require_once('menu.php'); ?> 
		<div id="page"> 
			<div class="content">
			    <section class="banner text-center">
			    	<img class="img-responsive" src="img/img01.jpg" alt="">
			    	<h2><span>Welcome to</span> Compac Hydraulik</h2>
			    	<p>Manufacturer since 1946<br>Compac has been manufacturing high quality hydraulic products since 1946. The aim of the experienced engineering staff at Compac is to ensure excellence in quality and reliability with the key objective of creating satisfied customers.</p>
			    	<a class="btn btnFind" href="contact.php">Find Us Here <i class="fa fa-chevron-right fa-lg"></i></a>
			    </section>
			    <section class="main">
			    	<div class="container">
			    		<div class="row main-item">
			    			<div class="col-lg-12">
			    				<h1 class="pull-left">DOCUMENTATION</h1>
				    			<a class="btnMore pull-right" href="services.php">Read more</a>
				    			<div class="clearfix"></div>
				    			<a href="services.php"><img src="img/img02.jpg" alt="" class="img-responsive"></a>
			    			</div>
				    	</div>
				    	<div class="row main-item">
			    			<div class="col-lg-12">
			    				<h1 class="pull-left">SPARE PARTS</h1>
				    			<a class="btnMore pull-right" href="products.php">Read more</a>
				    			<div class="clearfix"></div>
				    			<a href="products.php"><img src="img/img03.jpg" alt="" class="img-responsive"></a>
			    			</div>
				    	</div>
				    	<div class="row main-item">
			    			<div class="col-lg-12">
			    				<h1 class="pull-left">NEWS</h1>
				    			<a class="btnMore pull-right" href="news.php">Read more</a>
				    			<div class="clearfix"></div>
				    			<a href="news.php"><img src="img/img04.jpg" alt="" class="img-responsive"></a>
			    			</div>
				    	</div>
			    	</div>
			    </section>
			    <section class="product">
			    	<div class="container">
			    		<div class="row">
			    			<h2>PRODUCTS</h2>
			    			<div id="myCarousel" class="carousel slide">
			                    <div class="carousel-inner">
			                        <div class="item active">
			                            <div class="row">
			                                <div class="col-xs-6">
			                                    <div class="thumbnail">
			                                        <a href="product2.php">
			                                            <img src="img/pro01.jpg" alt="">
			                                        </a>
			                                    </div>
			                                </div>
			                                <div class="col-xs-6">
			                                    <div class="thumbnail">
			                                        <a href="product2.php">
			                                            <img src="img/pro02.jpg" alt="">
			                                        </a>
			                                    </div> 
			                                </div>
			                            </div>
			                        </div>
			                        <div class="item">
			                        	<div class="row">
				                            <div class="col-xs-6">
			                                    <div class="thumbnail">
			                                        <a href="product2.php">
			                                            <img src="img/pro01.jpg" alt="">
			                                        </a>
			                                    </div>        
			                                </div>
			                                <div class="col-xs-6">
			                                    <div class="thumbnail">
			                                        <a href="product2.php">
			                                            <img src="img/pro02.jpg" alt="">
			                                        </a>
			                                    </div> 
			                                </div>
		                                </div>
			                        </div>
			                    </div>
			                    <a class="left carousel-control" href="#myCarousel" data-slide="prev"></a>
			                    <a class="right carousel-control" href="#myCarousel" data-slide="next"></a>
			                </div><!-- End Carousel -->
			    		</div>
			    	</div>
			    </section>
			</div>
			<?php require_once('footer.php'); ?>
		</div>
	</body>
</html>