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
	<title>East Aurora Tower</title>

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
	<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll" style="padding: 0;">
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
			<div class="container" style="margin-top: -100px;"> <!--margin top decreased-->
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

		<div class="main main-raised" style="margin-top: -260px;"> <!--margin top decreased-->
			<div class="section section-basic" style="padding: 0"> <!--added padding-->
				<!-- <div class="page-header" style="margin: 40px 300px 20px; border-bottom: 3px solid #000000;"> -->
					<center><h2>East Aurora Tower</h2></center>
				<!-- </div> -->
				<div id="directions-panel" style="position: absolute; z-index: 99; border: groove; right: 8%; top: 30%;background-color: rgba(0, 0, 0, 0.23); border-radius: 10px; max-width: 234px; font-weight: 600;"></div>
				<!-- <div class="container" style="margin-top: 15px;"> -->
					<div id="container" style="width:100%;height:100vh;">
						<!-- This content requires HTML5/CSS3, WebGL, or Adobe Flash Player Version 10 or higher. -->
					</div>
				<!-- </div> -->
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
		//variables for waypoints
		var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true, polylineOptions: {strokeColor: "#456E89"}}); //suppressMarkers removes the default marker e.g: A, B etc.

        //variables for way points

			var map = new google.maps.Map(document.getElementById('container'), {
				zoom: 13,
				streetViewControl: false,
				center: {lat: 10.322090, lng: 123.914076},
				mapTypeControl: true,
          		mapTypeControlOptions: {
              	style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
              	position: google.maps.ControlPosition.TOP_RIGHT}
			});

		//codes for waypoints
			directionsDisplay.setMap(map);
	   		calculateAndDisplayRoute(directionsService, directionsDisplay);
   		//codes for waypoints

   		//set markers
   			var markerEAT = new google.maps.Marker({
				position: {lat: 10.322090, lng: 123.914076},
				map: map,
				title: 'Mabolo Gardent Flats',
				icon: '../src/icon_marker.png'

			});
			var marker2Quad = new google.maps.Marker({
				position: {lat: 10.314291, lng: 123.905279},
				map: map,
				title: '2Quad',
				icon: '../src/icon_marker.png',
				url: '../2quad/2quad.php'
			});

			//listen to click event, display 360 image when marker is clicked
			markerEAT.addListener('click', get360Image); 
			marker2Quad.addListener('click', function (){
			window.location.href = this.url;
			});
		//end for markers


		}
		

		//code for waypoints and calculations
		function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var waypts = [];

        directionsService.route({
          origin: "2Quad Building, Cardinal Rosales Ave, Cebu City, Cebu",
          destination: "10.322090, 123.914076",
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var totalDistance = '';
            var replaceKm = 0;
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '<h3>SJD</h3>';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              /*summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';*/

              totalDistance = route.legs[i].distance.text;
              replaceKm += Number(totalDistance.replace('km',''));
            } 
            
            summaryPanel.innerHTML += replaceKm+' km from 2Quad';
            // summaryPanel.innerHTML += replaceKm.toFixed(2) + ' km';
          } else {
           directionsDisplay.set('directions', null);
           document.getElementById('directions-panel').innerHTML = '';

          }
        });
      }
      //end of code for way points and calculations
</script>


	<script type="text/javascript">
function get360Image() {
	document.getElementById('directions-panel').style.display ='none';
		
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

		$().ready(function(){
				// the body of this function is in assets/material-kit.js
				materialKit.initSliders();
				window_width = $(window).width();

				if (window_width >= 992){
					big_image = $('.wrapper > .header');

					$(window).on('scroll', materialKitDemo.checkScrollForParallax);
				}

			});
	</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZvVMstskP1EecnVeMt7mDDWVWHuEwIKc&libraries=geometry&callback=getMap"></script>

</body>
</html>