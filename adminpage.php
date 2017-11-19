<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['admin'])) {
	header("Location: index.php");
}

?>


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
	
table, th, td {
    border: 1px solid black;
    padding: 10px;
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
			  <li><a style="color: white; text-decoration: none; float: right" href="logout.php">Logout</a></a>
          </ul>
        </div>
	<h2>Users</h2>
<div align="left" style="padding-top:10px;"  class="flex-container">
  	<?php
	
$query = $DBcon->query("SELECT * FROM users");	
if ($query->num_rows > 0) {
    echo "<table>
			<tr>
				<th>Student ID</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Last login attempt</th>
				<th>Feedback</th>
			</tr>";
    // output data of each row
    while($row = $query->fetch_array()) {
        echo "
			<tr>
				<td>" . $row["student_id"]. "</td>
				<td>" . $row["first_name"]. "</td>
				<td>" . $row["last_name"]. "</td>
				<td>" . $row["last_logged_in"]. "</td>
				<td> </td>
				<td> <a href = 'gallery.php?student_id=". $row["student_id"]."'>View<a/></td>
			</tr>
			
			";
    }
    echo "</table>";
} else {
    echo "0 results";
}


$DBcon->close();	
	?>

</div>
	
		
	<div class="footer">
	  <p>Dr. Linqiang Ge &nbsp;&nbsp;&nbsp;&nbsp;  | &nbsp;&nbsp;&nbsp;&nbsp;  Mogbolahan Ojeyinka</p>
	  <p>Department of Computer Science &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp; Georgia Southwestern State University</p>
	</div>
</div>

</body>
</html>

