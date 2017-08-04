<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:index.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Map</title>

	<!-- Bootstrap CSS -->
	<link href="common/css/bootstrap.min.css" rel="stylesheet">
	<link href="common/css/material-kit.css" rel="stylesheet">
	<link href="common/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<link href="common/css/material-icons.css" rel="stylesheet">
	<link href="common/css/demo.css" rel="stylesheet">
	<link href="src/index.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
		</head>
		<body class="index-page">
			<!-- Navbar -->
			<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll" style="padding: 0;"> <!-- added padding to make the navbar decrease the height -->
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="map.php">
							<div class="logo-container">
								<div class="logo">
									<img src="assets/img/logo.png" alt="Creative Tim Logo" rel="tooltip" data-placement="bottom" data-html="true">
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
								<a href="map.php">
									<i class="material-icons">map</i> Map
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">navigation</i> location
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="2quad/2quad.php"><i class="material-icons">place</i> 2Quad</a></li>
									<li><a href="avalon/avalon.php"><i class="material-icons">place</i> Avalon</a></li>
									<li><a href="lgf1/lgf1.php"><i class="material-icons">place</i> La Guardia Flats 1</a></li>
									<li><a href="lgf2/lgf2.php"><i class="material-icons">place</i> La Guardia Flats 2</a></li>
									<li><a href="clip/clip.php"><i class="material-icons">place</i> Clip</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">face</i> admin
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="logout.php"><i class="material-icons">keyboard_return</i> Logout</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- End Navbar -->

			<div class="wrapper">
				<div class="header" style="background-image: url('assets/img/2quadbuilding.png'); height: 55vh;">
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="brand" style="margin-top: 20vh;">
									<h1>HR VR TOUR</h1>
									<h3>a virtual reality tour inside our building</h3>
								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="main main-raised">
					<div class="section section-basic" style="padding: 0;"> <!-- added padding to remove the padding in the bottom -->
						<!-- <div class="page-header" style="padding: 0;"> -->
							<center><h3>Cebu Map</h3></center>
						<!-- </div> -->
						<!-- <div class="container" style="margin-top: 15px;"> --> <!-- removed to make map full width -->
							<style>
								#map {
									height: 550px;
									width: 100%;
								}
							</style>
							<div id="map"></div>
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

		</body>
		<script src="common/js/jquery.min.js" type="text/javascript"></script>
		<script src="common/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="common/js/material.min.js"></script>

		<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
		<script src="common/js/nouislider.min.js" type="text/javascript"></script>

		<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
		<script src="common/js/bootstrap-datepicker.js" type="text/javascript"></script>

		<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
		<script src="common/js/material-kit.js" type="text/javascript"></script>

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
		<script>
			function initMap() {
				var ulurua   = {lat: 10.314291, lng: 123.905279};
				var ulurub   = {lat: 10.329193, lng: 123.903982};
				var uluruc   = {lat: 10.331583, lng: 123.904338};
				var ulurud   = {lat: 10.316291, lng: 123.904344};
				var ulurue   = {lat: 10.288038, lng: 123.960269};
				var uluruSJD = {lat: 10.305767, lng: 123.898923};
				var uluruMGF = {lat: 10.319378, lng: 123.912979};
				var uluruMH  = {lat: 10.338457, lng: 123.953847};
				var uluruMM  = {lat: 10.338304, lng: 123.954172};
				var uluruSM  = {lat: 10.242547, lng: 123.798016};
				var uluruEN  = {lat: 10.368265, lng: 123.927895};
				var uluruEAT = {lat: 10.322090, lng: 123.914076};
				var uluruI3  = {lat: 10.327910, lng: 123.907005};
				var uluruI2  = {lat: 10.327624, lng: 123.906751};
				var uluruI1  = {lat: 10.328706, lng: 123.907481};

				var map = new google.maps.Map(document.getElementById('map'), {
					zoom: 16,
					streetViewControl: false,
					center: ulurua
				});
				

				// set boundary limit when user uses the drag event
				var strictBounds = new google.maps.LatLngBounds(
				new google.maps.LatLng(9.719788699999999, 122.49200880000001),
				new google.maps.LatLng(11.8240433, 124.84034080000004));

				// Listen for the dragend event
				 google.maps.event.addListener(map, 'dragend', function () {
				     if (strictBounds.contains(map.getCenter())) return;

				     // We're out of bounds - Move the map back within the bounds

				     var c = map.getCenter(),
				         x = c.lng(),
				         y = c.lat(),
				         maxX = strictBounds.getNorthEast().lng(),
				         maxY = strictBounds.getNorthEast().lat(),
				         minX = strictBounds.getSouthWest().lng(),
				         minY = strictBounds.getSouthWest().lat();

				     if (x < minX) x = minX;
				     if (x > maxX) x = maxX;
				     if (y < minY) y = minY;
				     if (y > maxY) y = maxY;

				     map.setCenter(new google.maps.LatLng(y, x));
				 });

				google.maps.event.addListener(map, 'zoom_changed', function () {
			     if (map.getZoom() < 8) map.setZoom(8);
			 	});


				/*set markers for each sites*/

				var marker1 = new google.maps.Marker({
					position: ulurua,
					map: map,
					icon: 'src/icon_marker.png',
					title: '2Quad',
					url: '2quad/2quad.php'

				});

				marker1.addListener('click', function() {
					window.location.href = this.url;
				});

				var marker2 = new google.maps.Marker({
					position: ulurub,
					map: map,
					icon: 'src/icon_marker.png',
					title: 'La Guardia Flats 2',
					url: 'lgf2/lgf2.php'

				});

				marker2.addListener('click', function() {		   
           //map.setZoom(20);
           //map.setCenter(marker.getPosition());
           window.location.href = this.url;
       });

				var marker3 = new google.maps.Marker({
					position: uluruc,
					map: map,
					icon: 'src/icon_marker.png',
					title: 'La Guardia Flats 1',
					url: 'lgf1/lgf1.php'

				});

				marker3.addListener('click', function() {
           //map.setZoom(20);
           //map.setCenter(marker.getPosition());
           window.location.href = this.url;
       });


		
				var marker4 = new google.maps.Marker({
					position: ulurud,
					map: map,
					icon: 'src/icon_marker.png',
					title: 'Avalon',
					url: 'avalon/avalon.php'
					
				});

				marker4.addListener('click', function() {
           //map.setZoom(20);
           //map.setCenter(marker.getPosition());
           window.location.href = this.url;
       });
				var marker5 = new google.maps.Marker({
					position: ulurue,
					map: map,
					icon: 'src/icon_marker.png',
					title: 'Clip',
					url: 'clip/clip.php'

				});
				
				marker5.addListener('click', function() {
           //map.setZoom(20);
           //map.setCenter(marker.getPosition());
           window.location.href = this.url;


		});
				var markerSJD = new google.maps.Marker({
					position: uluruSJD,
					map: map,
					icon: 'src/icon_marker.png',
					title: 'St. John Dormitory',
					// url: 'clip/clip.php'

				});
				
				/*markerf.addListener('click', function() {
           //map.setZoom(20);
           //map.setCenter(marker.getPosition());
           window.location.href = this.url;


		});*/


			var markerMGF = new google.maps.Marker({
					position: uluruMGF,
					map: map,
					icon: 'src/icon_marker.png',
					title: 'Mabolo Garden Flats	',
					// url: 'clip/clip.php'

				});
				/*
				markerMGF.addListener('click', function() {
           //map.setZoom(20);
           //map.setCenter(marker.getPosition());
           window.location.href = this.url;


		});*/
			var markerMH = new google.maps.Marker({
					position: uluruMH,
					map: map,
					icon: 'src/icon_marker.png',
					title: 'Maayo Hotel	',
					// url: 'clip/clip.php'

				});
				/*
				markerMGF.addListener('click', function() {
           //map.setZoom(20);
           //map.setCenter(marker.getPosition());
           window.location.href = this.url;


		});*/
			var markerMM = new google.maps.Marker({
					position: uluruMM,
					map: map,
					icon: 'src/icon_marker.png',
					title: 'Maayo Medical',
					// url: 'clip/clip.php'

				});
				/*
				markerMGF.addListener('click', function() {
           //map.setZoom(20);
           //map.setCenter(marker.getPosition());
           window.location.href = this.url;


		});*/
			var markerSM = new google.maps.Marker({
					position: uluruSM,
					map: map,
					icon: 'src/icon_marker.png',
					title: 'Spark Minglanilla',
					// url: 'clip/clip.php'

				});
				/*
				markerMGF.addListener('click', function() {
           //map.setZoom(20);
           //map.setCenter(marker.getPosition());
           window.location.href = this.url;


		});*/
				var markerEN = new google.maps.Marker({
					position: uluruEN,
					map: map,
					icon: 'src/icon_marker.png',
					title: 'Eagles Nest',
					// url: 'clip/clip.php'

				});
				/*
				markerMGF.addListener('click', function() {
           //map.setZoom(20);
           //map.setCenter(marker.getPosition());
           window.location.href = this.url;


		});*/
			var markerEAT = new google.maps.Marker({
					position: uluruEAT,
					map: map,
					icon: 'src/icon_marker.png',
					title: 'East Aurora Tower',
					// url: 'clip/clip.php'

				});
				/*
				markerMGF.addListener('click', function() {
           //map.setZoom(20);
           //map.setCenter(marker.getPosition());
           window.location.href = this.url;


		});*/
				var markerI3 = new google.maps.Marker({
					position: uluruI3,
					map: map,
					icon: 'src/icon_marker.png',
					title: 'I3',
					// url: 'clip/clip.php'

				});
				/*
				markerMGF.addListener('click', function() {
           //map.setZoom(20);
           //map.setCenter(marker.getPosition());
           window.location.href = this.url;


		});*/
				var markerI2 = new google.maps.Marker({
					position: uluruI2,
					map: map,
					icon: 'src/icon_marker.png',
					title: 'I2',
					// url: 'clip/clip.php'

				});
				/*
				markerMGF.addListener('click', function() {
           //map.setZoom(20);
           //map.setCenter(marker.getPosition());
           window.location.href = this.url;


		});*/
				var markerI1 = new google.maps.Marker({
					position: uluruI1,
					map: map,
					icon: 'src/icon_marker.png',
					title: 'I1',
					// url: 'clip/clip.php'

				});
				/*
				markerMGF.addListener('click', function() {
           //map.setZoom(20);
           //map.setCenter(marker.getPosition());
           window.location.href = this.url;


		});*/

				//calculates distance between two points in km's
			function calcDistance(p1, p2) {
			  return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000).toFixed(2) + " km";
			}

			// calculate distance from 2quad to other buildings
				var origin = new google.maps.LatLng(ulurua['lat'], ulurua['lng']);

				//to clip
				var destClip = new google.maps.LatLng(ulurue['lat'], ulurue['lng']);
				
				//to La Guardia Flats 1
				var destFlat2 = new google.maps.LatLng(uluruc['lat'], uluruc['lng']);

				//to La Guardia Flats 2
				var destFlat1 = new google.maps.LatLng(ulurub['lat'], ulurub['lng']);
				
				//to Avalon
				var destAvalon = new google.maps.LatLng(ulurud['lat'], ulurud['lng']);

				//to St. John Dormitory
				var destStJohn = new google.maps.LatLng(uluruSJD['lat'], uluruSJD['lng']);

				//to Mabolo Garden Flats
				var destMGF = new google.maps.LatLng(uluruMGF['lat'], uluruMGF['lng']);

				//Maayo Medical
				var destMM = new google.maps.LatLng(uluruMM['lat'], uluruMM['lng']);

				//Maayo Hotel
				var destMH = new google.maps.LatLng(uluruMH['lat'], uluruMH['lng']);

				//Spark Minglanilla
				var destSM = new google.maps.LatLng(uluruSM['lat'], uluruSM['lng']);

				//Eagles' Nest
				var destEN = new google.maps.LatLng(uluruEN['lat'], uluruEN['lng']);

				//East Aurora Tower
				var destEAT = new google.maps.LatLng(uluruEAT['lat'], uluruEAT['lng']);

				function getMarkerContent(name, image) {
					
					var markerContent0 = "<h4 style='background-color: #85C1E9 ; text-align: center;'>" +name+"</h4>";
						markerContent0 += "<img src='assets/images/"+image+"' alt="+name+" class='infoWindowImages'></td>";
					
					return markerContent0;
				}

				//2Quad
				var infowindow0 = new google.maps.InfoWindow({
					content: getMarkerContent('2Quad Building', '2quad/2quad_2.jpg'),
					maxWidth: 500
				});
				marker1.addListener('mouseover', function() {
            		infowindow0.open(map, marker1);
            	});
            	marker1.addListener('mouseout', function (){
				infowindow0.close(map, marker1);
				});


				//Avalon
				var infowindow3 = new google.maps.InfoWindow({
					content: getMarkerContent('Avalon', 'avalon/avalon.jpg'),
					maxWidth: 500
				});
				marker4.addListener('mouseover', function() {
            		infowindow3.open(map, marker4);
            	});
            	marker4.addListener('mouseout', function (){
				infowindow3.close(map, marker4);
				});


				//La Guardia Flats 2
				var infowindow1 = new google.maps.InfoWindow({
					content: getMarkerContent('La Guardia Flats 2', 'la_guardia_flats_2/la_guardia_2.jpg'),
					maxWidth: 500
				});
				marker2.addListener('mouseover', function() {

            		infowindow1.open(map, marker2);
            	});
            	marker2.addListener('mouseout', function (){
				infowindow1.close(map, marker2);
				});

            	//La Guardia Flats 1
				var infowindow2 = new google.maps.InfoWindow({
					content: getMarkerContent('La Guardia Flats 1', 'la_guardia_flats_1/la_guardia_1.jpg'),
					maxWidth: 350
				});
				marker3.addListener('mouseover', function() {
            		infowindow2.open(map, marker3);
            	});
            	marker3.addListener('mouseout', function (){
				infowindow2.close(map, marker3);
				});

				//Clip
				var infowindow4 = new google.maps.InfoWindow({
					content: getMarkerContent('Clip', ''),
					maxWidth: 350
				});
				marker5.addListener('mouseover', function() {
            		infowindow4.open(map, marker5);
            	});
            	marker5.addListener('mouseout', function (){
				infowindow4.close(map, marker5);
				});

				//St. John Dormitory
				var infowindowSJD = new google.maps.InfoWindow({
					content: getMarkerContent('St. John Dormitory', ''),
					maxWidth: 350
				});
				markerSJD.addListener('mouseover', function() {
            		infowindowSJD.open(map, markerSJD);
            	});
            	markerSJD.addListener('mouseout', function (){
				infowindowSJD.close(map, markerSJD);
				});

				//Mabolo Garden Flats
				var infowindowMGF = new google.maps.InfoWindow({
					content: getMarkerContent('Mabolo Garden Flats', ''),
					maxWidth: 350
				});
				markerMGF.addListener('mouseover', function() {
            		infowindowMGF.open(map, markerMGF);
            	});
            	markerMGF.addListener('mouseout', function (){
				infowindowMGF.close(map, markerMGF);
				});

				//Maayo Medical
				var infowindowMM = new google.maps.InfoWindow({
					content: getMarkerContent('Maayo Medical', ''),
					maxWidth: 350
				});
				markerMM.addListener('mouseover', function() {
            		infowindowMM.open(map, markerMM);
            	});
            	markerMM.addListener('mouseout', function (){
				infowindowMM.close(map, markerMM);
				});

				//Maayo Hotel
				var infowindowMH = new google.maps.InfoWindow({
					content: getMarkerContent('Maayo Hotel', ''),
					maxWidth: 350
				});
				markerMH.addListener('mouseover', function() {
            		infowindowMH.open(map, markerMH);
            	});
            	markerMH.addListener('mouseout', function (){
				infowindowMH.close(map, markerMH);
				});

				//Spark Minglanilla
				var infowindowSM = new google.maps.InfoWindow({
					content: getMarkerContent('Spark Minglanilla', ''),
					maxWidth: 350
				});
				markerSM.addListener('mouseover', function() {
            		infowindowSM.open(map, markerSM);
            	});
            	markerSM.addListener('mouseout', function (){
				infowindowSM.close(map, markerSM);
				});

				//Eagles' Nest
				var infowindowEN = new google.maps.InfoWindow({
					content: getMarkerContent('Eagles\' Nest', ''),
					maxWidth: 350
				});
				markerEN.addListener('mouseover', function() {
            		infowindowEN.open(map, markerEN);
            	});
            	markerEN.addListener('mouseout', function (){
				infowindowEN.close(map, markerEN);
				});

				//East Aurora Tower
				var infowindowEAT = new google.maps.InfoWindow({
					content: getMarkerContent('East Aurora Tower', ''),
					maxWidth: 350
				});
				markerEAT.addListener('mouseover', function() {
            		infowindowEAT.open(map, markerEAT);
            	});
            	markerEAT.addListener('mouseout', function (){
				infowindowEAT.close(map, markerEAT);
				});



				//I3
				var infowindowI3 = new google.maps.InfoWindow({
					content: getMarkerContent('i3', ''),
					maxWidth: 350
				});
				markerI3.addListener('mouseover', function() {
            		infowindowI3.open(map, markerI3);
            	});
            	markerI3.addListener('mouseout', function (){
				infowindowI3.close(map, markerI3);
				});

				//I2
				var infowindowI2 = new google.maps.InfoWindow({
					content: getMarkerContent('i2', ''),
					maxWidth: 350
				});
				markerI2.addListener('mouseover', function() {
            		infowindowI2.open(map, markerI2);
            	});
            	markerI2.addListener('mouseout', function (){
				infowindowI2.close(map, markerI2);
				});

				//I2
				var infowindowI1 = new google.maps.InfoWindow({
					content: getMarkerContent('i1', ''),
					maxWidth: 350
				});
				markerI1.addListener('mouseover', function() {
            		infowindowI1.open(map, markerI1);
            	});
            	markerI1.addListener('mouseout', function (){
				infowindowI1.close(map, markerI1);
				});

				

			

			}
		</script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZvVMstskP1EecnVeMt7mDDWVWHuEwIKc&libraries=geometry&callback=initMap"></script>
		</html>