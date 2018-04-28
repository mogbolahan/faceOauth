
<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession_intermediate'])) {
	header("Location: index.php");
}

include('phash.php');
$phasher = new Phash;


$query = $DBcon->query("SELECT * FROM users WHERE user_id=".$_SESSION['userSession_intermediate']);
$userRow=$query->fetch_array();

$userRow['user_id'];

//***************** Now that the user has been authenticated, let's delete the untrained images in the untrained folder  ********
		$files = glob('./user_images/'.$userRow['student_id']. '/untrained/*'); // get all file names
		foreach($files as $file){ // iterate files
		  if(is_file($file))
			unlink($file); // delete file
		}
// ****************************************************************************************************************

	/* 
			Now we are creating a unique directory to store the new student's pictures at run time'
			The 'mode' is 0777 by default, which means the widest possible access. For more information on modes, read the details on http://php.net/manual/en/function.chmod.php.
			Note:	mode is ignored on Windows. For reasons I am yet to figure out, 0755 is what works  for me here
	*/

			//The name of the directory that we need to create for cropped trained faces.
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

//------------------------ Cropping and training the images -------------------
// Original image
$filename = $unique_folder.$filename;

// Get dimensions of the original image
list($current_width, $current_height) = getimagesize($filename);

// The x and y coordinates on the original image where we
// will begin cropping the image
$left = 80;
$top = 50;

// This will be the final size of the image (e.g. how many pixels
// left and down we will be going)
$crop_width = 80;
$crop_height = 85;

// Resample the image
$canvas = imagecreatetruecolor($crop_width, $crop_height);
$current_image = imagecreatefromjpeg($filename);
imagecopy($canvas, $current_image, 0, 0, $left, $top, $current_width, $current_height);
imagejpeg($canvas, $filename, 100);


//--------------------------------------------------------------------------------------------------------------




// MODULE FOR GETTING THE AVERAGE FACE SIGNATURE OF THE TRAINED IMAGES STARTS HERE 
					//check if filename already exists. If fileneme exists add an integer i for uniqueness
					$j = 0; 
					$sum_trianed = 0;
					while(file_exists($filename) != 0) {
						$phash4 = $phasher->getHash($filename, false);
						$image_hash = $phasher->hashAsString($phash4, false).PHP_EOL; // Image Hash in binary
						$image_hash = bindec($image_hash); // Image Hash in decimal
						$sum_trianed = $sum_trianed + $image_hash; // Sum of Image Hashes in decimal
						$j++; //Add 1 to i
						$temp_filename = strstr( $temp_filename, "_", true );
						$temp_filename = $userRow['student_id']. "_" . $j;
						file_exists($filename);
					}


						$n_trianed = count(scandir($unique_folder)) - 2; // Counts the number of files (in this case, images) in a folder or directory. Note: I subtracted “3” from the gross-count to get the final net-count because PHP include (.) and (..) among the file and directory returned by scandir().

						$Average_trianed_hash_decimal = $sum_trianed/$n_trianed; // Average hash in decimal
						$Average_trianed_hash_bin = decbin((float)$Average_trianed_hash_decimal); // Average hash in bin
						$Average_trianed_hash_hex = dechex((float)$Average_trianed_hash_decimal); // Average hash in hex




					//	$BIT_COUNT_Signature_average_untrained =  $phasher->hashAsString($phash2, false).PHP_EOL;
					//	$HAMMING_signature_average_untrained  = $phasher->hashAsString($phash2).PHP_EOL;
	
//Save user's Average_trianed_hash to database.
$query = $DBcon->query("UPDATE users SET Average_trianed_hash = '$Average_trianed_hash_hex' WHERE student_id='$user_id'");

$_SESSION['Average_trianed_hash'] = $Average_trianed_hash_hex;

$DBcon->close();			 

// MODULE FOR GETTING THE AVERAGE FACE SIGNATURE OF THE TRAINED IMAGES ENDS HERE 
?>
