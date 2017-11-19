<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}

$query = $DBcon->query("SELECT * FROM users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();

$userRow['user_id'];



	/* 
			Now we are creating a unique directory to store the new student's pictures at run time'
			The 'mode' is 0777 by default, which means the widest possible access. For more information on modes, read the details on http://php.net/manual/en/function.chmod.php.
			Note:	mode is ignored on Windows. For reasons I am yet to figure out, 0755 is what works  for me here
	*/

			//The name of the directory that we need to create.
			$unique_folder = './user_images/'.$userRow['student_id']. '/';

			$_SESSION['folder'] = $unique_folder;
			//Check if the directory already exists.
			if(!is_dir($unique_folder)){
				//Directory does not exist, so let us create it.
				mkdir($unique_folder, 0755);
			}

//Save user's unique directory to database.
$user_id = $userRow['student_id'];
$query = $DBcon->query("UPDATE users SET unique_directory = '$unique_folder' WHERE student_id='$user_id'");
$DBcon->close();			

$filepath = 'user_images/';
$temp_filename = $userRow['student_id'];
		//check if filename already exists. If fileneme exists add an integer i for uniqueness
		$i = 0; 
		while(file_exists($unique_folder.$temp_filename. '.jpg') != 0) {
			$i++; //Add 1 to i
			$temp_filename = strstr( $temp_filename, "_", true );
			$temp_filename = $userRow['student_id']. "_" . $i;
			file_exists($unique_folder.$temp_filename. '.jpg');
		}
$filename = $temp_filename. '.jpg';
move_uploaded_file($_FILES['webcam']['tmp_name'], $unique_folder.$filename);

echo $unique_folder.$filename;
?>
