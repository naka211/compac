<div class="max-container" id="max-container-header">
	<div class="container">
		<div class="header clear-fix">
			<h2 class="logo"><a href="index.php">COMPAC</a></h2>
			<div class="language-bar">
				<ul class="language-select clear-fix">
					<li><a href="index.php" class="active-lang" id="lang-en" title="English">English</a></li>
					<li><a href="index.php" id="lang-ne" title="Dutch" >Netherland</a></li>
					<li><a href="index.php" id="lang-fr" title="French">France</a></li>
					<li><a href="index.php" id="lang-it" title="Italian">Italy</a></li>
					<li><a href="index.php" id="lang-ge" title="German">Germany</a></li>
					<li><a href="index.php" id="lang-sw" title="Norwegian">Norwegian</a></li>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="navigation-wrapper">
				<ul class="navigation">
					<li><a class="<?php if(isset($t) && $t == 1) echo 'current-page'; ?>" href="index.php">Home</a></li>
					<li><a class="<?php if(isset($t) && $t == 2) echo 'current-page'; ?>" href="profile.php">Company Profile</a></li>
					<li><a class="<?php if(isset($t) && $t == 3) echo 'current-page'; ?>" href="service.php">Services</a></li>
					<li>
						<a class="<?php if(isset($t) && $t == 4) echo 'current-page'; ?>" href="product.php">products</a>
						<!-- <ul class="submenu">
							<li>
								<a href="product.php">product 1</a>
								<ul class="submenu-2">
									<li><a href="product.php">Product 2</a></li>
									<li><a href="product.php">Product 2</a></li>
									<li><a href="product.php">Product 2</a></li>
									<li><a href="product.php">Product 2</a></li>
									<li><a href="product.php">Product 2</a></li>
								</ul>
							</li>
							<li><a href="product.php">product 1</a></li>
							<li><a href="product.php">product 1</a></li>
							<li><a href="product.php">product 1</a></li>
							<li><a href="product.php">product 1</a></li>
							<li><a href="product.php">product 1</a></li>
							<li><a href="product.php">product 1</a></li>
							<li><a href="product.php">product 1</a></li>
						</ul> -->
					</li>
					<li><a class="<?php if(isset($t) && $t == 5) echo 'current-page'; ?>" href="contact.php">Contact</a></li>
					<li><a class="<?php if(isset($t) && $t == 6) echo 'current-page'; ?> no-padding-right" href="news.php">news</a></li>
				</ul>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>