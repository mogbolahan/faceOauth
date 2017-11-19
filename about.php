
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>faceOauth | A Face Authentication System for Online Proctored Examinations.</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css" />
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
	
	</style>
	
	
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> <!--Required for the automatic snapping to work -->
</head>
<body style="background:#e8e8e8">

<div class="container" style="text-align:center; background: #f9f9f9">

		<div class="navbar" style="background: #120D3B;">
			
		<a href="index.php" style="font-size: 30px; color: white; text-decoration: none; float: left; margin-left: 10px">face<span style="color: #5023B0">Oauth</span></a>
          <ul class="nav navbar-nav">
				<li><a style="color: white; text-decoration: none" href="about.php">About</a></li>
				<li><a style="color: white; text-decoration: none" href="how_it_works.php">How it works</a></li>
			 <a style="float: right"  href="https://github.com/mogbolahan/faceOauth"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/a6677b08c955af8400f44c6298f40e7d19cc5b2d/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png"></a>
          </ul>
        </div>
	<h2>A Face Authentication System for Online Proctored Examination.</h2>
<div style="padding-top:10px;">
<p style="text-align: left">
faceOauth is a "work-a-progress" Authentication System for Online Proctored Examination. 
This system uses webcam to detect the face of the subject, but unlike what is currently done in ProctorU, the user(the subject) WILL NOT be prompted to position his/her face squarely in a circle displayed on the screen. This approach is prone to falsification and deception because since it is a one-time authentication process, it is possible for the subject to merely position a previously taken picture (of the person being impersonated) in front of the camera, press the "snap" button and Hurray! 
</p>
<p style="text-align: left">Rather, the task is to develop a system that:<br>
1. WILL NOT prompt the user to position his/her face in the circle/oval.<br>
2. Will take random pictures (not just the face) of the subject in front of the screen, at random intervals.<br>
3. Detect the 5 landmarks (2 eye centers, the nose tip, and 2 mouth corners) to detect the faces in those randomly taken pictures.<br>
5. Use pattern recognition algorithm to authenticate the user.<br>
6. Use deep learning approach to improve the recognition results.<br>
</p>
# SCOPE AND LIMITATIONS
....
<p style="text-align: left">
TECHNOLOGIES <br>
1. python<br>
2. javascript.<br>
3. PHP.<br>
4. MySQL.<br>
5. boostrap<br>
6. WebcamJS (https://pixlcore.com) - An opensource standalone JavaScript library for capturing still images from the computer's camera, and delivering them as JPEG or PNG Data URIs. 
</p>

<p style="text-align: left">
	
COMPATIBLE BROWSERS<br>
As noted by Joseph Huckaby-the author of WebcamJS javascript, WebcamJS works with Firefox and Internet explorer. The newer versions of Google Chrome require HTTPS to use the webcam. <br> 
1. Mac OS X	    Chrome 30+	    Works — Chrome 47+ requires HTTPS<br>
2. Mac OS X	    Firefox 20+   	Works<br>
3. Mac OS X	    Safari 6+	      Requires Adobe Flash Player<br>
4. Windows	      Chrome 30+	    Works — Chrome 47+ requires HTTPS<br>
5. Windows	      Firefox 20+	    Works<br>
6. Windows	      IE 9	          Requires Adobe Flash Player<br>
7. Windows	      IE 10	          Requires Adobe Flash Player<br>
9. Windows	      IE 11	          Requires Adobe Flash Player<br>

</p>
	
</div>
	
		
	<div class="footer">
	  <p>Dr. Linqiang Ge &nbsp;&nbsp;&nbsp;&nbsp;  | &nbsp;&nbsp;&nbsp;&nbsp;  Mogbolahan Ojeyinka</p>
	  <p>Department of Computer Science &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp; Georgia Southwestern State University</p>
	</div>
</div>

</body>
</html>

