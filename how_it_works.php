
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
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
			height: 100%;
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
	
	</style>
	
	
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> <!--Required for the automatic snapping to work -->
</head>
<body style="background:#e8e8e8">

<div class="container" style="text-align:center; background: #f9f9f9">

		<div class="navbar" style="background: #120D3B;">
			
		<a href="get_started_with_username_and_pword.php" style="font-size: 30px; color: white; text-decoration: none; float: left; margin-left: 10px">face<span style="color: #5023B0">Oauth</span></a>
          <ul class="nav navbar-nav">
				<li><a style="color: white; text-decoration: none" href="about.php">About</a></li>
				<li><a style="color: white; text-decoration: none" href="how_it_works.php">How it works</a></li>
			 <a style="float: right"  href="https://github.com/mogbolahan/faceOauth"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/a6677b08c955af8400f44c6298f40e7d19cc5b2d/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png"></a>
          </ul>
        </div>
	<h2>How it works</h2>
<div style="padding-top:10px;">
<p style="text-align: left">
<b>First-Time User</b><br>
1. A first time user registers with his/her student id, first and last names, email and a password.<br>
2. The system creates a unique folder or subdirectory in the "user_images" folder. For example, a new student with I.D. 123456  will have a unique folder with path user_images/123456. This folder will be used for storing capture images of the user at 1 minute intervals.<br>

3. Being a first time user with NO PHOTO ID on file, the system prompts the user to take a selfie by pressing a button on the screen. This is a ONE_TIME process to get the standard PHOTO ID of the user. To authenticate the user at later times, captured images will be matched with this one-time PHOTO ID.<br>

4.Once logged in, the system starts capturing the user picture every 1 minute. So, for instance, for examination that spans 1hour, 60 images of the user will be captured and stored in a directory unique to the user.<br>

5. The Python script will be in the form of an API that the PHP script can consume. Note that the captured images which were dumped into a unique directory will be the input which the Python script watches for data. After woking on the images, the Python script will then write the result to the file system readable by the PHP script and displayed as a feedback to the user.<br>

</p>


<p style="text-align: left">
<b>Returning User</b><br>
1. The authentication prosess fro a returning user is in two stages:<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. First, the user provides his/her Student ID and password<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. The system then performs a second stage authentication by capturing the user's image, detecting the face in the image and then comparing it with the saved PHOT ID. If the face authentication fails, the user is not allowed to preceed any further<br>
2.Once logged in, the system starts capturing the user picture every 1 minute. So, for instance, for examination that spans 1hour, 60 images of the user will be captured and stored in a directory unique to the user.<br>

3. These captured images will be processed by the python script to improve the accuracy of subsequent authentication attempts<br>

</p>
	

<p style="text-align: left">
<b>Admin</b><br>
1. The admin has the following credentials<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Username: </b>admin<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Password: </b>admin<br>
2. Once logged in, the admin could see:<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. List of all user<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Last login attempt of each user<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. All captured images for a chosen user for examination period<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d. A feedback from the python script stating if there was an impersonation attempt or not<br>
</p>
</div>
	
		
	<div class="footer">
	  <p>Dr. Linqiang Ge &nbsp;&nbsp;&nbsp;&nbsp;  | &nbsp;&nbsp;&nbsp;&nbsp;  Mogbolahan Ojeyinka</p>
	  <p>Department of Computer Science &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp; Georgia Southwestern State University</p>
	</div>
</div>

</body>
</html>

