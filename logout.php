<?php
session_start();
	session_destroy();
	unset($_SESSION['userSession']);
	unset($_SESSION['admin']);
	unset($_SESSION['userSession_intermediate']);
	header("Location: index.php");
?>