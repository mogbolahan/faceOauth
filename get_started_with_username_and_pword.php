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

/*

if (isset($_POST['btn-login'])) {
	
	$last_logged_in = date('y/m/d h:i:s a', time());
	
	$student_id = strip_tags($_POST['student_id']);
	$password = strip_tags($_POST['password']);
	+
	$student_id  = $DBcon->real_escape_string($student_id );
	$password = $DBcon->real_escape_string($password);
	
	$query = $DBcon->query("SELECT user_id, student_id, email, password FROM users WHERE student_id ='$student_id '");
	$row=$query->fetch_array();
	
	$count = $query->num_rows; // if student_id /password is correct returns must be 1 row i.e. unique user
	
	if (password_verify($password, $row['password']) && $count==1) {
		$_SESSION['userSession'] = $row['user_id'];
		
		//Update last_logged_in value.
		$query = $DBcon->query("UPDATE users SET last_logged_in = '$last_logged_in' WHERE student_id='$student_id'");

		
		header("Location: home.php");
	} else {
		$msg = "<h5 class='alert alert-danger'>Invalid Student I.D. / Password combination !</h5>";
	}
	$DBcon->close();
}

*/


if(isset($_POST['btn-signup'])) {
	
	$last_logged_in = date('y/m/d h:i:s a', time());
	
	$first_name = strip_tags($_POST['first_name']);
	$last_name = strip_tags($_POST['last_name']);
	$email = strip_tags($_POST['email']);
	$upass = strip_tags($_POST['password']);
	$student_id = strip_tags($_POST['student_id']);
	
	$first_name = $DBcon->real_escape_string($first_name);
	$last_name = $DBcon->real_escape_string($last_name);
	$email = $DBcon->real_escape_string($email);
	$upass = $DBcon->real_escape_string($upass);
	$student_id = $DBcon->real_escape_string($student_id);
	
	$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // Works only in PHP 5.5 and latest version
	
	$check_student_id = $DBcon->query("SELECT student_id FROM users WHERE student_id='$student_id'");
	$count=$check_student_id->num_rows;
	
	if ($count==0) {
		
			//The name of the directory that we need to create.
					$unique_folder = './user_images/'.$student_id. '/';

					//Check if the directory already exists.
					if(!is_dir($unique_folder)){
						//Directory does not exist, so let us create it.
						mkdir($unique_folder, 0755);
					}
			
		
		$query = "INSERT INTO users(first_name,last_name,student_id,email,password,last_logged_in,unique_directory) VALUES('$first_name','$last_name','$student_id','$email','$hashed_password','$last_logged_in','$unique_folder')";

		if ($DBcon->query($query)) {
			$msg = "Registered Successfully !";
			
								
					$query = $DBcon->query("SELECT user_id, student_id, email, password FROM users WHERE student_id ='$student_id '");
					$row=$query->fetch_array();

					$count = $query->num_rows; 
					if ($count==1) {
							$_SESSION['userSession'] = $row['user_id'];	
							$_SESSION['userSession_intermediate'] = $row['user_id'];
							$_SESSION['user_id'] = $row['user_id'];
							$_SESSION['student_id'] = $row['student_id'];
							$_SESSION['email'] = $row['email'];
							header("Location: home.php");

						}
			
		}else {
			$msg = "<h5 class='alert alert-danger'>Unable to register at this time. Please try again!
					</h5>";
		}
		
	} else {
		
		
		$msg = "<h5 class='alert alert-danger'>That Student I.D. is already in registeredthe system!
				</h5>";
			
	}
	
	$DBcon->close();
}




if (isset($_POST['btn-admin'])) {
	
	$admin_name = strip_tags($_POST['admin_name']);
	$admin_password  = strip_tags($_POST['admin_password']);
	
	$admin_name  = $DBcon->real_escape_string($admin_name );
	$admin_password  = $DBcon->real_escape_string($admin_password);
	
	
	$query = $DBcon->query("SELECT * FROM admin WHERE username='$admin_name' and password='$admin_password'");
	$row=$query->fetch_array();
	
	$count = $query->num_rows; 
	
	if ($count==1) {
		
		$_SESSION['admin']=$admin_name;
		header("Location: adminpage.php");
		
	} else {
		$msg_admin = "<h5 class='alert alert-danger'>Invalid Username / Password combination !</h5>";
	}
	$DBcon->close();
}


?>

<?php 
	if(isset($_POST['btn-login']))
		{
			$last_logged_in = date('y/m/d h:i:s a', time());

			$student_id = strip_tags($_POST['student_id']);
			$password = strip_tags($_POST['password']);
			
			$student_id  = $DBcon->real_escape_string($student_id );
			$password = $DBcon->real_escape_string($password);

			$query = $DBcon->query("SELECT user_id, student_id, email, password FROM users WHERE student_id ='$student_id '");
			$row=$query->fetch_array();

			$count = $query->num_rows; // if student_id /password is correct returns must be 1 row i.e. unique user

			
			if(password_verify($password, $row['password']) && $count==1)
				{	
					$_SESSION['userSession_intermediate'] = $row['user_id'];
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['student_id'] = $row['student_id'];
					$_SESSION['email'] = $row['email'];
				
			
					
//***************** Delete prior untrained images in the untrained folder  ********
		$files = glob('./user_images/'.$row['student_id']. '/untrained/*'); // get all file names
		foreach($files as $file){ // iterate files
		  if(is_file($file))
			unlink($file); // delete file
		}
// ****************************************************************************************************************
			
				
					header ("Location: login_face_verification.php");
				
					//Update last_logged_in value.
					$query = $DBcon->query("UPDATE users SET last_logged_in = '$last_logged_in' WHERE student_id='$student_id'");
					
				} else {
				$msg = "<h5 class='alert alert-danger'>Invalid Student I.D. / Password combination !</h5>";
			}
	}
	
	$DBcon->close();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>faceOauth | A Face Authentication System for Online Proctored Examinations.</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="css/style.css" type="text/css" />
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
		#results { float:right; margin:20px; padding:20px; border:1px solid; background:#ccc; }
		
		
		
		
		
	
	</style>
	
</head>
<body style="background:#e8e8e8">

<div class="container" style="text-align:center; background: transparent url(images/1.jpg) center no-repeat; background-size: cover;">

		<div class="navbar" style="background: #120D3B;">
			
		<a href="index.php" style="font-size: 30px; color: white; text-decoration: none; float: left; margin-left: 10px">face<span style="color: #5023B0">Oauth</span></a>
          <ul class="nav navbar-nav">
				<li><a style="color: white; text-decoration: none" href="about.php">About</a></li>
				<li><a style="color: white; text-decoration: none" href="how_it_works.php">How it works</a></li>
				<li><a style="color: white; text-decoration: none" href="admin/admin_login.php">Admin</a></li>
			 <a style="float: right"  href="https://github.com/mogbolahan/faceOauth"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/a6677b08c955af8400f44c6298f40e7d19cc5b2d/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png"></a>
          </ul>
        </div>
     <br>

	<h2 style="color: white">A Face Authentication System for Online Proctored Examination.</h2>
<div style="padding-top:10px;"  class="flex-container">
      <!-- Login form -->
	<div id="login_form" style="margin: 20px">  
       <form class="form-signin" method="post" id="login-form">
      
        <h3 align="center" class="form-signin-heading">Log in</h3>
        
        
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Student I.D." name="student_id" required autocomplete="off" />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="off" />
        </div>
		 
        <?php
		if(isset($msg)){
			echo $msg;
		}
		?>  
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login"  onclick="myFunction()">Log in</button>
			
     	<hr />
          New student? <a onclick = "toggle_register_Form_Function(); take_snapshot()" class="btn btn-default" style="float:right;">Register</a>
        
      
      </form>

    </div>
	
	
		<!-- Script that toggles login_form div -->	
											<script>
											function toggle_register_Form_Function() {
												var login_form = document.getElementById("login_form");
												var register_form = document.getElementById("register_form");
												var face_capture = document.getElementById("face_capture");
												if (login_form.style.display == "none") {
													login_form.style.display = "block";
													register_form.style.display = "none";
												} else {
													login_form.style.display = "none";
													register_form.style.display = "block";
												}
											}											
											</script>
	
	
		<!--Registration form -->
	<div id="register_form" style="display: none; margin: 20px">
		<form class="form-signin" method="post" id="register-form">
      
			<h3 align="center" class="form-signin-heading">Register</h3>

			<div class="form-group">
				<input type="text" class="form-control" placeholder="Student I.D." name="student_id" required  autocomplete="off" />
				<span id="check-e"></span>
			</div>
			
			<div class="form-group">
				<input type="text" class="form-control" placeholder="First name" name="first_name" required  autocomplete="off" />
			</div>
			
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Last name" name="last_name" required  autocomplete="off" />
			</div>

			<div class="form-group">
				<input type="email" class="form-control" placeholder="Email address" name="email" required  autocomplete="off" />
			</div>

			<div class="form-group">
			<input type="password" class="form-control" placeholder="Password" name="password" required  autocomplete="off" />
			</div>
			
			
			<?php
			if (isset($msg)) {
				echo $msg;
			} 
			?>

				<button type="submit" class="btn btn-default" name="btn-signup">Register</button>

			<hr />
				Already registered? <a onclick = "toggle_register_Form_Function()"  class="btn btn-default" style="float:right;">Log in</a>
      </form>
	
	
	</div>
	
		
	
</div>	
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
	
	   <div id="web_cam"></div>
			
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
				Webcam.attach( '#web_cam' );
			</script>


		<script>
			(function($) {

			   function take_snapshot() {
						// take snapshot and get image data
						Webcam.snap( function(data_uri) {
							// upload image to database
							Webcam.upload( data_uri, 'upload_image.php');	
						} );
					}

				$(document).ready(function(){
					window.setInterval(take_snapshot, 15000); // call our function every 15 seconds
				});

			})(jQuery);
		</script>
</div>

	
	
	
	
	

</body>
</html>

