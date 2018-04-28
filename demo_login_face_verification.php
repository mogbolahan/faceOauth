<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession_intermediate'])) {
	header("Location: index.php");
}


$query = $DBcon->query("SELECT * FROM users WHERE user_id=".$_SESSION['userSession_intermediate']);
$userRow=$query->fetch_array();

$userRow['user_id'];

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
	
		#results { margin:20px; padding:20px; border:1px solid; background:#ccc; }
		
		
		
	</style>
	
	
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script> <!--Required for the automatic snapping to work -->
	
	
</head>
<body style="background:#e8e8e8" onLoad="<?php if (isset($_SESSION['userSession_intermediate'])) { echo
	  			"$('#myModal').modal('show');";}?>">

<div class="container" style="text-align:center; background: #f9f9f9">

		<div class="navbar" style="background: #120D3B;">
			
		<a href="get_started_with_username_and_pword.php" style="font-size: 30px; color: white; text-decoration: none; float: left; margin-left: 10px">face<span style="color: #5023B0">Oauth</span></a>
          <ul class="nav navbar-nav">
				<li><a style="color: white; text-decoration: none" href="about.php">About</a></li>
				<li><a style="color: white; text-decoration: none" href="how_it_works.php">How it works</a></li>
				<li><a style="color: white; text-decoration: none" href="admin_login.php">Admin</a></li>
			 <a style="float: right"  href="https://github.com/mogbolahan/faceOauth"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/a6677b08c955af8400f44c6298f40e7d19cc5b2d/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png"></a>
          </ul>
        </div>
	
	<h2>Final Step</h2>

	
<div style="padding-top:20px;"  class="flex-container">
     
	<!-- Big picture frame -->
	<div align="center" id="login_form" style="margin: 20px; width: 50%;">  
       
			<div id="web_cam"></div>
			
			<!--div id="web_cam"></div-->

			<!-- Webcam.js JavaScript Library -->
			<script type="text/javascript" src="js/webcam.js"></script>

			<!-- Configuring and attaching the camera -->
			<script language="JavaScript">
				Webcam.set({
					// live preview size
					width: 320,
					height: 240,

					// device capture size
					dest_width: 320,
					dest_height: 240,

					// final cropped size
					crop_width: 300,
					crop_height: 300,

					// format and quality
					image_format: 'jpeg',
					jpeg_quality: 90
				});
				Webcam.attach( '#web_cam' );
			</script>

	<!-- Script for taking snaps and saving it on the server/ database

		My concens here is the choice of storage.
		Should the images be saved locally on a directory or on a database. ....Here comes the question of staorage.

		-->

		<script>
			function repeatXI(callback, interval, repetitions, immediate) {
				function repeater(repetitions) {
					if (repetitions >= 0) {
						callback.call(this);
						setTimeout(function () {
							repeater(--repetitions)
						}, interval)
					}
				}
				repetitions = repetitions || 0;
				interval = interval || 5000;
				if (immediate) {
					repeater(--repetitions)
				} else {
					setTimeout(function () {
						repeater(--repetitions)
					}, interval)
				}
			}
			
			
			function take_snapshot() {
				// take snapshot and get image data
				Webcam.snap( function(data_uri) {
							// Upload the captured image
				
				Webcam.upload( data_uri, 'login_face_verification.php');	
				} );
			}
			
			// Repeats forever, 1 second apart
				//repeatXI(someFunc, 1000);
			// Repeats 10 times, 1 second apart, beginning now
				//repeatXI(someFunc, 1000, 10, true);
			// Same as above, but beginning after 1 second
			repeatXI(take_snapshot, 2000, 10);
			
		</script>
		
		
		
		<?php
			
				// Module for Capturing immages during login 
			/* 
			Now we are creating a unique directory to store the new student's pictures at run time'
			The 'mode' is 0777 by default, which means the widest possible access. For more information on modes, read the details on http://php.net/manual/en/function.chmod.php.
			Note:	mode is ignored on Windows. For reasons I am yet to figure out, 0755 is what works  for me here
	*/

			//The name of the directory that we need to create.
			$unique_untrained_folder = './user_images/'.$userRow['student_id']. '/untrained/';

			$_SESSION['untrained_folder'] = $unique_untrained_folder;
			//Check if the directory already exists.
			if(!is_dir($unique_untrained_folder)){
				//Directory does not exist, so let us create it.
				mkdir($unique_untrained_folder, 0755);
			}

			//Save user's unique directory to database.
			$user_id = $userRow['student_id'];
			$query = $DBcon->query("UPDATE users SET unique_directory = '$unique_untrained_folder' WHERE student_id='$user_id'");
			$DBcon->close();			

			$filepath = 'user_images/';
			$temp_filename = $userRow['student_id'];
					//check if filename already exists. If fileneme exists add an integer i for uniqueness
					$i = 0;
					while(file_exists($unique_untrained_folder.$temp_filename. '.jpg') != 0) {
						$i++; //Add 1 to i
						$temp_filename = strstr( $temp_filename, "_", true );
						$temp_filename = $userRow['student_id']. "_" . $i;
						file_exists($unique_untrained_folder.$temp_filename. '.jpg');
					}
			$filename = $temp_filename. '.jpg';
			move_uploaded_file($_FILES['webcam']['tmp_name'], $unique_untrained_folder.$filename);

		//	echo $unique_folder.$filename;
		
		
		
		
				
		
		
		?>
		

    </div>
					<!-- MODULE FOR GETTING THE AVERAGE FACE SIGNATURE OF THE TRAINED AND UNTRAINED IMAGES STARTS HERE -->
	<div id="login_form"  style="margin: 20px;">
				
			<?php
						// MODULE FOR GETTING THE AVERAGE FACE SIGNATURE OF THE UNTRAINED IMAGES
				include('phash.php');
				$phasher = new Phash;
			
					$temp_filename = $userRow['student_id'];
					//check if filename already exists. If fileneme exists add an integer i for uniqueness
					$j = 0; 
					$sum = 0;
		
					while(file_exists($unique_untrained_folder.$temp_filename. '.jpg') != 0) {
						$phash4 = $phasher->getHash('user_images/'.$userRow['student_id'].'/untrained/'.$temp_filename.'.jpg', false);
						$image_hash = $phasher->hashAsString($phash4, false).PHP_EOL; // Image Hash in binary
						$image_hash = bindec($image_hash); // Image Hash in decimal
						$sum = $sum + $image_hash; // Sum of Image Hashes in decimal
						$j++; //Add 1 to i
						$temp_filename = strstr( $temp_filename, "_", true );
						$temp_filename = $userRow['student_id']. "_" . $j;
						file_exists($unique_untrained_folder.$temp_filename. '.jpg');
					}


						$n = count(scandir($unique_untrained_folder)) - 2; // Counts the number of files (in this case, images) in a folder or directory. Note: I subtracted “3” from the gross-count to get the final net-count because PHP include (.) and (..) among the file and directory returned by scandir().

						$Average_untrained_hash = $sum/$n; // Average hash in decimal
						$Average_untrained_hash = dechex($Average_untrained_hash); // Average hash in binary


					//	$BIT_COUNT_Signature_average_untrained =  $phasher->hashAsString($phash2, false).PHP_EOL;
					//	$HAMMING_signature_average_untrained  = $phasher->hashAsString($phash2).PHP_EOL;
		
			
			?>
					<!-- MODULE FOR GETTING THE AVERAGE FACE SIGNATURE OF THE TRAINED IMAGES ENDS HERE -->
				<!-- MODULE FOR GETTING THE AVERAGE FACE SIGNATURE OF THE TRAINED IMAGES STARTS HERE -->
			<?php
						// MODULE FOR GETTING THE AVERAGE FACE SIGNATURE OF THE UNTRAINED IMAGES
					//The name of the directory that we need to create.
					$unique_folder = 'user_images/'.$userRow['student_id']. '/';
					$temp_filename = $userRow['student_id'];
					//check if filename already exists. If fileneme exists add an integer i for uniqueness
					$j = 0; 
					$sum = 0;
					while(file_exists($unique_folder.$temp_filename. '.jpg') != 0) {
						$phash4 = $phasher->getHash('user_images/'.$userRow['student_id'].'/'.$temp_filename.'.jpg', false);
						$image_hash = $phasher->hashAsString($phash4, false).PHP_EOL; // Image Hash in binary
						$image_hash = bindec($image_hash); // Image Hash in decimal
						$sum = $sum + $image_hash; // Sum of Image Hashes in decimal
						$j++; //Add 1 to i
						$temp_filename = strstr( $temp_filename, "_", true );
						$temp_filename = $userRow['student_id']. "_" . $j;
						file_exists($unique_folder.$temp_filename. '.jpg');
					}


						$n = count(scandir($unique_folder)) - 2; // Counts the number of files (in this case, images) in a folder or directory. Note: I subtracted “3” from the gross-count to get the final net-count because PHP include (.) and (..) among the file and directory returned by scandir().

						$Average_hash = $sum/$n; // Average hash in decimal
						$Average_hash = dechex($Average_hash); // Average hash in binary


					//	$BIT_COUNT_Signature_average_untrained =  $phasher->hashAsString($phash2, false).PHP_EOL;
					//	$HAMMING_signature_average_untrained  = $phasher->hashAsString($phash2).PHP_EOL;
					
			?>
				
								 <!-- Average hash in Hexadecimal -->
				Average_untrained_hash =  &nbsp;<?php echo $Average_untrained_hash;?>
				<br>
				Average_hash =  &nbsp;<?php echo $Average_hash;?>
							<br><br>
					Comparison with Average Trained Hash
		<div>
			<?php
				
				$BIT_COUNT_METHOD = $phasher->getSimilarity($Average_hash, $Average_untrained_hash, 'BITS');
				$HAMMING_METHOD = $phasher->getSimilarity($Average_hash, $Average_untrained_hash);
			?>
			Using BIT COUNT METHOD &nbsp;<?php echo $BIT_COUNT_METHOD;?>
			<br>
			Using HAMMING METHOD &nbsp;<?php echo $HAMMING_METHOD; ?>
		</div>
    </div> 
	
	
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