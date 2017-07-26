<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:../index.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>La Guardia Flats 2</title>

	<!-- Bootstrap CSS -->
	<link href="../common/css/bootstrap.min.css" rel="stylesheet">
	<link href="../common/css/material-kit.css" rel="stylesheet">
	<link href="../common/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<link href="../common/css/material-icons.css" rel="stylesheet">
	<link href="../common/css/demo.css" rel="stylesheet">

	<script type="text/javascript" src="swfobject.js"></script>
	<script type="text/javascript" src="pano2vr_player.js"></script>
	<script type="text/javascript" src="skin.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="index-page">
	<!-- Navbar -->
	<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="../map.php">
					<div class="logo-container">
						<div class="logo">
							<img src="../assets/img/logo.png" alt="Creative Tim Logo" rel="tooltip"  data-placement="bottom" data-html="true">
						</div>
						<div class="brand" style="margin-top: 18px;">
							VR HUB
						</div>


					</div>
				</a>
			</div>

			<div class="collapse navbar-collapse" id="navigation-index">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="../map.php">
							<i class="material-icons">map</i> Map
						</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">navigation</i> location
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="../2quad/2quad.php"><i class="material-icons">place</i> 2Quad</a></li>
							<li><a href="../avalon/avalon.php"><i class="material-icons">place</i> Avalon</a></li>
							<li><a href="../lgf1/lgf1.php"><i class="material-icons">place</i> La Guardia Flats 1</a></li>
							<li><a href="../lgf2/lgf2.php"><i class="material-icons">place</i> La Guardia Flats 2</a></li>
							<li><a href="../clip/clip.php"><i class="material-icons">place</i> Clip</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">face</i> admin
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="../logout2.php"><i class="material-icons">keyboard_return</i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- End Navbar -->

	<div class="wrapper">
		<div class="header" style="background-image: url('../assets/img/2quadbuilding.png');">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="brand">
							<h1>HR VR TOUR</h1>
							<h3>a virtual reality tour inside our building</h3>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="main main-raised">
			<div class="section section-basic">
				<div class="page-header" style="margin: 40px 300px 20px; border-bottom: 3px solid #000000;">
					<center><h1>La Guardia Flats 2</h1></center>
				</div>
				<div class="container" style="margin-top: 15px;">

					<div id="container" style="width:100%;height:100vh;">
						<!-- This content requires HTML5/CSS3, WebGL, or Adobe Flash Player Version 10 or higher. -->
					</div>

				</div>
			</div>
		</div>

		<footer class="footer">
			<div class="container">
				<div class="copyright pull-right">
					&copy; 2017, Created by MIS
				</div>
			</div>
		</footer>
	</div>

	<script type="text/javascript">
	function getMap () {
			var map = new google.maps.Map(document.getElementById('container'), {
				zoom: 14,
				streetViewControl: false,
				center: {lat: 10.3304499, lng: 123.90739229999997}
			});

			var markerLGF2 = new google.maps.Marker({
				position: {lat: 10.329193, lng: 123.903982},
				map: map,
				title: 'La Guardia Flats 2',
				icon: '../src/icon_marker.png'
			});

			var marker2Quad = new google.maps.Marker({
				position: {lat: 10.314291, lng: 123.905279},
				map: map,
				title: '2Quad',
				icon: '../src/icon_marker.png'
			});

			markerLGF2.addListener('click', get360Image);

		}
	</script>


	<script type="text/javascript">
	function get360Image () {

		// check for CSS3 3D transformations and WebGL
		if (ggHasHtml5Css3D() || ggHasWebGL()) {
			// use HTML5 panorama
			// create the panorama player with the container
			pano=new pano2vrPlayer("container");
		} else 
		if (swfobject.hasFlashPlayerVersion("10.0.0")) {
			var flashvars = {};
			var params = {};
			// enable javascript interface
			flashvars.externalinterface="1";
			params.quality = "high";
			params.bgcolor = "";
			params.allowscriptaccess = "sameDomain";
			params.allowfullscreen = "true";
			var attributes = {};
			attributes.id = "flashpano";
			attributes.name = "flashpano";
			attributes.align = "middle";

			params.base=".";
			params.wmode = "transparent";
			pano=new pano2vrPlayer("container",{ useFlash:true, flashPlayerId: 'flashpano', flashContainerId:'flashcontainer'});
			swfobject.embedSWF("pano2vr_player.swf", "flashcontainer", "100%", "100%", "10.0.0", "", flashvars, params, attributes);
		}
		// add the skin object
		skin=new pano2vrSkin(pano);

			// load the configuration when  markerLGF2 is clicked
			pano.readConfigUrlAsync("pano.xml");
	}
	</script>

	<script src="../common/js/jquery.min.js" type="text/javascript"></script>
	<script src="../common/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../common/js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<!-- <script src="../common/js/nouislider.min.js" type="text/javascript"></script> -->

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<!-- <script src="../common/js/bootstrap-datepicker.js" type="text/javascript"></script> -->

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="../common/js/material-kit.js" type="text/javascript"></script>

	<script type="text/javascript">

	//this function is not working
	/*	$().ready(function(){
				// the body of this function is in assets/material-kit.js
				materialKit.initSliders();
				window_width = $(window).width();

				if (window_width >= 992){
					big_image = $('.wrapper > .header');

					$(window).on('scroll', materialKitDemo.checkScrollForParallax);
				}

			});*/
	</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZvVMstskP1EecnVeMt7mDDWVWHuEwIKc&libraries=geometry&callback=getMap"></script>
</body>
</html>