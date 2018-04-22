
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
<title>faceOauth | A Face Authentication System for Online Proctored Examinations.</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet"> 
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/lightbox.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">

  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
  
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
<link rel="manifest" href="images/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
	
	
	<style>
		.grow:hover
		{		
        -webkit-transform: scale(1.3);
        -ms-transform: scale(1.3);
        transform: scale(1.3);
		}
	
	</style>
	
</head><!--/head-->

<body>

  <!--.preloader-->
  <!--div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div-->
  <!--/.preloader-->

  <header id="home">
    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url(../images/1.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">face<span>Oauth</span></h1>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#about-us">Learn more</a>
          </div>
        </div>
        <div class="item" style="background-image: url(../images/features-bg.jpg)">
          <div class="caption">
            <h2 class="animated fadeInLeftBig" style="color: white">A Face Authentication System for Online Proctored Examinations.</h2>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#about-us">Learn more</a>
          </div>
        </div>
        <div class="item" style="background-image: url(../images/about-bg.jpeg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Two Factor Authentication</h1>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#about-us">Learn more</a>
          </div>
        </div>
      </div>
      <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
      <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>

      <a id="tohash" href="#about-us"><i class="fa fa-angle-down"></i></a>

    </div>
	  
	  
    <div class="main-nav" style="background: #120D3B;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">
            <h1 style="border: solid thin white; padding:5px; color: white">face<span style="color:#29477E">Oauth</span></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll active"><a href="#home">Home</a></li>
            <li class="scroll"><a href="#about-us">About</a></li>
            <li class="scroll"><a href="#latest">How it works</a></li>                      
            <li class="scroll"><a href="#portfolio">DEMOS</a></li>      
          </ul>
        </div>
      </div>
    </div>
</header>
	
  <section id="about-us" style="background: white">
    <div class="container">
          <h1 align="center" data-wow-duration="1000ms" data-wow-delay="300ms">About faceOauth</h1> 
      <div class="text-center our-services">
        <div class="row">
          <div class="col-sm-4 wow fadeInDown">
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
          </div>
			
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="450ms">
            
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
          
			<div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="550ms">

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
				TECHNOLOGIES <br>
				1. python<br>
				2. javascript.<br>
				3. PHP.<br>
				4. MySQL.<br>
				5. boostrap<br>
				6. WebcamJS (https://pixlcore.com) - An opensource standalone JavaScript library for capturing still images from the computer's camera, and delivering them as JPEG or PNG Data URIs. 
				</p>

          </div>
			
        </div>
      </div>
    </div>
  </section>

	
  <section id="features" class="parallax">
    <div class="container">
      <div class="row count">
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
          <i class="fa fa-user"></i>
          <h3 class="timer">10</h3>
          <p>User</p>
        </div>
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
          <i class="fa fa-globe"></i>
          <h3 class="timer">2</h3>                    
          <p>Websites</p>
        </div> 
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="700ms">
          <i class="fa fa-mobile-phone"></i>
          <h3 class="timer">2</h3>                    
          <p>Apps</p>
        </div> 
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="900ms">
          <i class="fa fa-comment-o"></i>                    
          <h3>24/7</h3>
          <p>Fast Support</p>
        </div>                 
      </div>
    </div>
  </section>

	
  <section id="latest">
    <div class="container">
       <h1 align="center">How it works</h1>
        <div class="row">
          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
            <div class="entry-header">
              <h2>First-Time User</h2>
            </div>
            <div class="entry-content">
              
						<p style="text-align: left">
					1. A first time user registers with his/her student id, first and last names, email and a password.<br>
					2. The system creates a unique folder or subdirectory in the "user_images" folder. For example, a new student with I.D. 123456  will have a unique folder with path user_images/123456. This folder will be used for storing capture images of the user at 1 minute intervals.<br>

					3. Being a first time user with NO PHOTO ID on file, the system prompts the user to take a selfie by pressing a button on the screen. This is a ONE_TIME process to get the standard PHOTO ID of the user. To authenticate the user at later times, captured images will be matched with this one-time PHOTO ID.<br>

					4.Once logged in, the system starts capturing the user picture every 1 minute. So, for instance, for examination that spans 1hour, 60 images of the user will be captured and stored in a directory unique to the user.<br>

					5. The Python script will be in the form of an API that the PHP script can consume. Note that the captured images which were dumped into a unique directory will be the input which the Python script watches for data. After woking on the images, the Python script will then write the result to the file system readable by the PHP script and displayed as a feedback to the user.<br>

					</p>

            </div>
          </div>
          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
			  <div class="entry-header">
              	<h2>Returning User</h2>
              </div>
			<div class="entry-content">
				<p style="text-align: left">
					1. The authentication prosess fro a returning user is in two stages:<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. First, the user provides his/her Student ID and password<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. The system then performs a second stage authentication by capturing the user's image, detecting the face in the image and then comparing it with the saved PHOT ID. If the face authentication fails, the user is not allowed to preceed any further<br>
					2.Once logged in, the system starts capturing the user picture every 1 minute. So, for instance, for examination that spans 1hour, 60 images of the user will be captured and stored in a directory unique to the user.<br>

					3. These captured images will be processed by the python script to improve the accuracy of subsequent authentication attempts<br>

				</p>
			</div>
          </div>
			
          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="800ms">
            <div class="entry-header">
              	<h2>Admin</h2>
              </div>
				<div class="entry-content">

				<p style="text-align: left">
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
          </div>
			
        </div>  
    </div>
  </section>

  <section id="twitter" class="parallax">
    <div>
      <a class="twitter-left-control" href="#twitter-carousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
      <a class="twitter-right-control" href="#twitter-carousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <div id="twitter-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="item active wow fadeIn" data-wow-duration="500ms" data-wow-delay="150ms">
					<h1>Introducing</h1>
                </div>
				
				 <div class="item">
                  <h1>A light weight Face Authentication System for Online Proctored Examinations.</h1>
                </div>
				
				<div class="item">
                  <h2>No OpenCV libray. Everything is in pure PHP and Javascript</h2>
                </div>  
				 
                <div class="item">
                  <h2>We used opensource standalone JavaScript library for capturing still images from the computer's camera</h2>
					<a href="https://github.com/jhuckaby/webcamjs"><span style="color: white"> Learn more</span></a>
                </div> 
				  
				<div class="item">
                  <h1 style="color: white">face<span style="color:#29477E">Oauth</span></h1>
                </div>
				  
				<div class="item">
                  <h2>It uses pattern recognition algorithm to authenticate the user.</h2>
                </div>
				
				 
				<div class="item">
                  <h2> Use deep learning approach to improve the recognition results.</h2>
                </div> 
				 
				
				
               
              </div>                        
            </div>                    
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="portfolio">
    <div class="container">
      <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h1 align="center">DEMOS</h1>
        </div>
      <div class="pricing-table">
        <div class="row">
          <div class="col-sm-6 grow">
			 <h1>Option 1</h1>
             <a href="get_started.php" style="font-size: 40px">
				 <div class="single-table wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms" style="background: #BFE2EF">
				 <h2 class="fa fa-user">&nbsp;Username</h2>
					 <br>
					+ 
					 <br>
				<h2 class="fa fa-lock">&nbsp;Password</h2>
					 <br>
				<h2>then verify with </h2>
					 
				<h1 style="color: indianred; font-size: 40px">Face signature</h1>
				</div>
			  </a>
          </div>
		
          <div class="col-sm-6 grow">
			 <h1>Option 2</h1>
             <a href="get_started.php" style="font-size: 40px">
				 <div class="single-table wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms" style="background:#E5AAB7">
				 	<h1 style="color: indianred; font-size: 40px">Face signature</h1>
				<h2>then verify with </h2>
				<h2 class="fa fa-user">&nbsp;Username</h2>
					 <br>
					+ 
					 <br>
				<h2 class="fa fa-lock">&nbsp;Password</h2>
				
				</div>
			  </a>
          </div>
          
          
        </div>
      </div>
    </div>
  </section>

  <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms" style="background: black">
      <div class="container text-center">
        <div class="footer-logo">
          <a class="navbar-brand" href="index.html">
            <h1 style="border: solid thin white; padding:5px; color: white">face<span style="color:#29477E">Oauth</span></h1>
          </a>              
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          		<div class="col-sm-12" align="center">
					  <p>Mogbolahan Ojeyinka &nbsp;&nbsp;&nbsp;&nbsp;  | &nbsp;&nbsp;&nbsp;&nbsp;Supervised by:    Dr. Linqiang Ge</p>
					  <p>Department of Computer Science &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp; Georgia Southwestern State University</p>
							<p>&copy; 2018 All rights reserved.</p>
				</div>
          </div>
        </div>
      </div>
  </footer>

  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="js/wow.min.js"></script>
  <script type="text/javascript" src="js/mousescroll.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script>
  <script type="text/javascript" src="js/jquery.countTo.js"></script>
  <script type="text/javascript" src="js/lightbox.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>

</body>
</html>