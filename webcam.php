<!doctype html>
 
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>faceOath | A Face Authentication System for Online Proctored Examination.</title>
	<style type="text/css">
		body { 
			font-family: Helvetica, sans-serif;
			padding:20px; border:1px solid; background:#ccc; 
		}
		h2, h3 { margin-top:0; }
	</style>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
	<h1 align="center">A Face Authentication System for Online Proctored Examination.</h1>
	<div id="web_cam"></div>
	
	<!-- Webcam.js JavaScript Library -->
	<script type="text/javascript" src="webcam.js"></script>
	
	<!-- Configuring and attaching the camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 600,
			height: 460,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#web_cam' );
	</script>
	
	<!-- Script for taking takinhg snaps and saving it on the server/ database

My concens here is the choice of storage.
Should the images be saved locally on a directory or on a database. ....Here comes the question of staorage.

-->

<script>
	(function($) {

	   function take_snapshot() {
				// take snapshot and get image data
				Webcam.snap( function(data_uri) {
					// display results in page


					Webcam.upload( data_uri, 'upload_image.php');	
				} );
			}

		$(document).ready(function(){
			window.setInterval(take_snapshot, 60000); // call our function every 60 seconds = 1 min
		});

	})(jQuery);
	</script>
	
</body>
</html>