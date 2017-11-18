<?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
	exit;
}

if (isset($_POST['btn-login'])) {
	
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	
	$email = $DBcon->real_escape_string($email);
	$password = $DBcon->real_escape_string($password);
	
	$query = $DBcon->query("SELECT user_id, email, password FROM users WHERE email='$email'");
	$row=$query->fetch_array();
	
	$count = $query->num_rows; // if email/password are correct returns must be 1 row
	
	if (password_verify($password, $row['password']) && $count==1) {
		$_SESSION['userSession'] = $row['user_id'];
		header("Location: home.php");
	} else {
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
				</div>";
	}
	$DBcon->close();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>faceOauth | A Face Authentication System for Online Proctored Examination.</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body style="background:#F0E5E5">

<div class="container" style="text-align:center; background: #f9f9f9">

		<div class="navbar" style="background: #120D3B;">
			
		<a href="index.php" style="font-size: 30px; color: white; text-decoration: none; float: left; margin-left: 10px">face<span style="color: #5023B0">Oauth</span></a>
          <ul class="nav navbar-nav">
				<li><a style="color: white; text-decoration: none" href="#">About</a></li>
				<li><a style="color: white; text-decoration: none" href="#">How it works</a></li>
			 <a style="float: right"  href="https://github.com/mogbolahan/faceOauth"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/a6677b08c955af8400f44c6298f40e7d19cc5b2d/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png"></a>
          </ul>
        </div>
     <br>

	<h2>A Face Authentication System for Online Proctored Examination.</h2>
<div align="center" style="display:flex; padding-top:20px;">
     
	<div id="login_form" style="margin: 20px">  
       <form class="form-signin" method="post" id="login-form">
      
        <h2 align="center" class="form-signin-heading">Log in</h2>
        
        <?php
		if(isset($msg)){
			echo $msg;
		}
		?>
        
        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email address" name="email" required autocomplete="off" />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="off" />
        </div>
		   
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">Log in</button>
			
     	<hr />
          New student? <a onclick = "login_Form_Function()" class="btn btn-default" style="float:right;">Register</a>
        
      
      </form>

    </div>
		<!-- Script that toggles login_form div -->	
											<script>
											function login_Form_Function() {
												var login_form = document.getElementById("login_form");
												var register_form = document.getElementById("register_form");
												if (login_form.style.display === "none") {
													login_form.style.display = "block";
													register_form.style.display = "none";
												} else {
													login_form.style.display = "none";
													register_form.style.display = "block";
												}
											}											
											</script>
		
	<div id="register_form" style="display: none; margin: 20px">
		<form class="form-signin" method="post" id="register-form">
      
			<h2 align="center" class="form-signin-heading">Register</h2>

			<?php
			if (isset($msg)) {
				echo $msg;
			}
			?>

			<div class="form-group">
			<input type="text" class="form-control" placeholder="Username" name="username" required  autocomplete="off" />
			</div>

			<div class="form-group">
			<input type="email" class="form-control" placeholder="Email address" name="email" required  autocomplete="off" />
			<span id="check-e"></span>
			</div>

			<div class="form-group">
			<input type="password" class="form-control" placeholder="Password" name="password" required  autocomplete="off" />
			</div>


				<button type="submit" class="btn btn-default" name="btn-signup">Register</button>

			<hr />
				Already registered? <a onclick = "login_Form_Function()"  class="btn btn-default" style="float:right;">Log in</a>
      </form>
	
	
	</div>
		
		
	<div id="admin_form"  style="margin: 20px">
		<form class="form-signin" method="post" id="register-form">
      
        <h2 align="center" class="form-signin-heading">Admin</h2>
        <?php
		if (isset($msg)) {
			echo $msg;
		}
		?>
          
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Username: admin" name="username" required  autocomplete="off" />
        </div>
        
                
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password: admin" name="password" required autocomplete="off"  />
        </div>
        
     	<hr />
            <button type="submit" class="btn btn-default" name="btn-signup">Log in</button> 
      
      </form>
    </div> 
	
	
	</div>
</div>

</body>
</html>

