<?php
function returnTitle($name = NULL){
	echo (strrpos($_SERVER['REQUEST_URI'],'.') == NULL)?
		"INDEX"	:
		(($name == NULL)?
                        (strtoupper(substr($request_url= $_SERVER['REQUEST_URI'],strrpos($request_url,'/')+1,(strrpos($request_url,'.')-strrpos($request_url,'/'))-1))):
                        strtoupper($name));
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="src/images/icon.ico" />
<link rel="stylesheet" type="text/css" href="src/css/style.css"/>
<link rel="stylesheet" type="text/css" href="src/css/cuong.css"/>
<link rel="stylesheet" type="text/css" href="src/css/reveal.css"/>
<link rel="stylesheet" type="text/css" href="src/css/prettyPhoto.css"/>
<link rel="stylesheet" type="text/css" href="src/css/jquery.tooltip.css"/>

<!--[if IE]>
<link href="src/css/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 9]>
<link href="src/css/ie9.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if lt IE 9]>
<link href="src/css/ie78.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 7]>
<link href="src/css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript" src="src/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="src/js/jquery.carouFredSel-5.5.0-packed.js"></script>
<script type="text/javascript" src="src/js/jquery.tooltip.min.js"></script>
<script type="text/javascript" src="src/js/jquery.easing.js"></script>
<script type="text/javascript" src="src/js/jquery.reveal.js"></script>
<script type="text/javascript" src="src/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="src/js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="src/js/jquery.inputToggle.js"></script>
<script type="text/javascript" src="src/js/init.js"></script>