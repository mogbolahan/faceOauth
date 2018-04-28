<?php
session_start();
require_once '../dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
	exit;
}

if (isset($_SESSION['admin'])!="") {
	header("Location: adminpage.php");
	exit;
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



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>faceOauth | A Face Authentication System for Online Proctored Examinations.</title>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="../css/style.css" type="text/css" />
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
	
</head>
<body style="background:#e8e8e8">

<div class="container" style="text-align:center; background: #f9f9f9">

		<div class="navbar" style="background: #120D3B;">
			
		<a href="../get_started_with_username_and_pword.php" style="font-size: 30px; color: white; text-decoration: none; float: left; margin-left: 10px">face<span style="color: #5023B0">Oauth</span></a>
          <ul class="nav navbar-nav">
				<li><a style="color: white; text-decoration: none" href="../about.php">About</a></li>
				<li><a style="color: white; text-decoration: none" href="../how_it_works.php">How it works</a></li>
			 <a style="float: right"  href="https://github.com/mogbolahan/faceOauth"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/a6677b08c955af8400f44c6298f40e7d19cc5b2d/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png"></a>
          </ul>
        </div>
     <br>

	<h2>A Face Authentication System for Online Proctored Examination.</h2>
<div style="padding-top:10px;"  class="flex-container">
     
			<!-- Admin Login form -->
	<div id="admin_form"  style="margin: 20px;">
		<form class="form-signin" method="post" id="register-form">
      
        <h3 align="center" class="form-signin-heading">Admin</h3>
       
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Username: admin" name="admin_name" required  autocomplete="off" />
        </div>
        
                
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password: admin" name="admin_password" required autocomplete="off"  />
        </div>
        
			<?php
			if (isset($msg_admin)) {
				echo $msg_admin;
			}
			?>
     	<hr />
            <button type="submit" class="btn btn-default" name="btn-admin">Log in</button> 
      
      </form>
    </div> 
	
	
</div>	
<div class="footer">
  <p>Dr. Linqiang Ge &nbsp;&nbsp;&nbsp;&nbsp;  | &nbsp;&nbsp;&nbsp;&nbsp;  Mogbolahan Ojeyinka </p>
  <p>Department of Computer Science &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp; Georgia Southwestern State University</p>
</div>
	
</div>

	
	
	
	
	
	<!-- capture frame popup style -->
<style>
	.chat_box {
  background: #fff;
  width: 200px;
  height: 300px;
  position: fixed;
  bottom: -270px;
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

.pesan_chat {
  text-align: center;
  text-decoration: none;
  display: block;
  height: 100%;
  padding: 5px 5px 15px;
}

.chat_button {
  background: #4d90fe;
  border: 0;
  margin: 0 auto;
  padding: 5px 18px;
  font-size: 18px;
  font-weight: 700;
  color: #fff;
  text-align: center;
  display: inline-block;
  border-radius: 3px;
  transition: all .3s;
  text-decoration: none;
}

.chat_button:hover {
  background: #365899;
}

.chatheader {
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

.pesan_chat p {
  color: #616161;
  font-size: 16px;
  margin: 10px;
}
	

.chat_content {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
}

.darker {
    border-color: #ccc;
    background-color: #ddd;
}

.chat_content::after {
    content: "";
    clear: both;
    display: table;
}

.chat_content img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
}

.chat_content img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
}

.time-right {
    float: right;
    color: #aaa;
}

.time-left {
    float: left;
    color: #999;
}


</style>
	<!-- Chat popup script-->
<script>
	function showhidechat(){var o=document.getElementById("chat");"0px"!==o.style.bottom?o.style.bottom="0px":o.style.bottom="-270px"}function popup(o){var t=650,n=400,e=(screen.width-t)/2,i=(screen.height-n)/2,s="width="+t+", height="+n;return s+=", top="+i+", left="+e,s+=", directories=no",s+=", location=no",s+=", menubar=no",s+=", resizable=no",s+=", scrollbars=no",s+=", status=no",s+=", toolbar=no",newwin=window.open(o,"windowname5",s),window.focus&&newwin.focus(),!1};

</script>
		<!-- Chat popup div -->
<div class="chat_box" id="chat">
  <div class="chatheader" onclick='showhidechat()'>Chats</div>
  
   <div class="pesan_chat">
	   
  </div>
</div>

</body>
</html>

