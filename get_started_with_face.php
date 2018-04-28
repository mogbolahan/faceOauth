<?php
session_start();
require_once 'dbconnect.php';



if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
	exit;
}

if (isset($_SESSION['admin'])!="") {
	header("Location: adminpage.php");
	exit;
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>faceOauth | A Face Authentication System for Online Proctored Examinations.</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="css/style.css" type="text/css" />
	
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
	
	<style>
		.flex-container {
		  	display: flex;
		  	justify-content: center;
			overflow: auto;
			height: 100vh;
			height: calc(100vh - 100px);
			position: relative;
			backface-visibility: hidden;
			will-change: overflow;
			-webkit-overflow-scrolling: touch;
			-ms-overflow-style: none;
		}

		
		
		.footer {
			left: 0;
			bottom: 0;
			width: 100%;
			padding: 10px;
			background-color: #3B3A45;
			color: white;
			text-align: center;
		}
	
		#results { margin:20px; padding:20px; border:1px solid; background:#fff; }
	
	</style>
</head>

<body style="background:#e8e8e8">

<div align="center" class="container" style="text-align:center; background: #f9f9f9">

		<div class="navbar" style="background: #120D3B;">
			
		<a href="get_started_with_username_and_pword.php" style="font-size: 30px; color: white; text-decoration: none; float: left; margin-left: 10px">face<span style="color: #5023B0">Oauth</span></a>
          <ul class="nav navbar-nav">
				<li><a style="color: white; text-decoration: none" href="about.php">About</a></li>
				<li><a style="color: white; text-decoration: none" href="how_it_works.php">How it works</a></li>
				<li><a style="color: white; text-decoration: none" href="admin_login.php">Admin</a></li>
			 <a style="float: right"  href="https://github.com/mogbolahan/faceOauth"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/a6677b08c955af8400f44c6298f40e7d19cc5b2d/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png"></a>
          </ul>
        </div>

<div  style=" padding: 20px; background: #f9f9f9; background: transparent url(../images/1.jpg) center no-repeat;background-size: cover;" align="center">
	
	<div style="padding-top:20px;"  class="flex-container">
     
		 
			<div id="results"></div>
	
	
		<div id="login_form" style="width: 70%">
			<div align="center" id="my_camera"></div>
		</div> 
	
	</div>
	
	
	
	
	
	
		

		<!-- First, include the Webcam.js JavaScript Library -->
		<script type="text/javascript" src="js/webcam.js"></script>

		<!-- Configure a few settings and attach camera -->
		<script language="JavaScript">
			Webcam.set({
				width: 320,
				height: 240,
				image_format: 'jpeg',
				jpeg_quality: 90
			});
			Webcam.attach( '#my_camera' );
		</script>
		<br>

		<form>
			<button class="btn-danger btn-lg" type="button" onClick="take_snapshot()"><i class="glyphicon glyphicon-camera" ></i>&nbsp;Take Snapshot</button>
		</form>

		<!-- Code to handle taking the snapshot and displaying it locally -->
		<script language="JavaScript">
			function take_snapshot() {
				// take snapshot and get image data
				Webcam.snap( function(data_uri) {
					// display results in page
					document.getElementById('results').innerHTML = 
						'<h2>Wait while we authenticate you.</h2>' + 
						'<img src="'+data_uri+'"/>';
				} );
			}
		</script>
</div>	
	
	<!--Footer -->
	<div class="footer">
	  <p>Mogbolahan Ojeyinka &nbsp;&nbsp;&nbsp;&nbsp;  | &nbsp;&nbsp;&nbsp;&nbsp;Supervised by:    Dr. Linqiang Ge</p>
	  <p>Department of Computer Science &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp; Georgia Southwestern State University</p>
	
            <p>&copy; 2018 All rights reserved.</p>
	</div>
</div>
	
	<!-- capture frame popup style -->
<style>
	.samll_cam_frame {
  background: #fff;
  width: 200px;
  height: 300px;
  position: fixed;
  bottom: -120px;
  right: 10px;
  transition: all .3s;
  border: 1px solid transparent;
  border-radius: 3px 3px 0 0;
  -webkit-box-shadow: rgba(0, 0, 0, 0.0980392) 0 0 1px 2px;
  -moz-box-shadow: rgba(0, 0, 0, 0.0980392) 0 0 1px 2px;
  box-shadow: rgba(0, 0, 0, 0.0980392) 0 0 1px 2px;
  overflow: hidden;
  z-index:1000000;
}

.samll_cam_frame_header {
  margin: 0 auto;
  padding: 0 10px;
  height: 20px;
  line-height: 20px;
  font-size: 15px;
  font-weight: 500;
  text-align: center;
  display: block;
  cursor: pointer;
  background: #051436;
  border: 1px solid #051436;
  color:#FFF;
}


</style>
	<!-- Small cam frame at th bottom right script-->
<div class="samll_cam_frame" id="samll_cam_frame">
  <div class="samll_cam_frame_header">Webcam</div>
	
	   <div id="samll_web_cam"></div>
			
			<!--div id="web_cam"></div-->

			<!-- Webcam.js JavaScript Library -->
			<script type="text/javascript" src="js/webcam.js"></script>

			<!-- Configuring and attaching the camera -->
			<script language="JavaScript">
				Webcam.set({
					width: 200,
					height: 154,
					image_format: 'jpeg',
					jpeg_quality: 90
				});
				Webcam.attach( '#samll_web_cam' );
			</script>


		<script>
			(function($) {

			   function take_snapshot() {
						// take snapshot and get image data
						Webcam.snap( function(data_uri) {
							// display results in page
						} );
					}

			})(jQuery);
		</script>
</div>
</body>
</html>