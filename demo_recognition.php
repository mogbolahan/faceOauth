<?php
session_start();
include_once 'dbconnect.php';

include('phash.php');
$phasher = new Phash;
$phash2 = $phasher->getHash('913190617_20.jpg', false);
$phash3 = $phasher->getHash('913190617_9.jpg', false);
?>

<div>
	Image 1 Hash in binary &nbsp;<?php echo $phasher->hashAsString($phash2, false).PHP_EOL;?>
	<br>
	Image 1 Hash hex &nbsp;<?php echo $phasher->hashAsString($phash2).PHP_EOL; ?>
	
</div>

<br>

<div>
	Image 2 Hash in binary &nbsp;<?php echo $phasher->hashAsString($phash3, false).PHP_EOL;?>
	<br>
	Image 2 Hash hex &nbsp;<?php echo $phasher->hashAsString($phash3).PHP_EOL; ?>
</div>

<br>

		SIMILARITY i.e. Recognition <br>
<div>
	<?php $BIT_COUNT_METHOD = $phasher->getSimilarity($phash2, $phash3, 'BITS');?>
	<?php $HAMMING_METHOD = $phasher->getSimilarity($phash2, $phash3); ?>
	Using BIT COUNT METHOD &nbsp;<?php echo $BIT_COUNT_METHOD;?>
	<br>
	Using HAMMING METHOD &nbsp;<?php echo $HAMMING_METHOD; ?>
</div>

	<?php

			if (!isset($_SESSION['userSession_intermediate'])) {
				header("Location: index.php");
			}

			$query = $DBcon->query("SELECT * FROM users WHERE user_id=".$_SESSION['userSession_intermediate']);
			$userRow=$query->fetch_array();
	
			//The name of the directory that we need to create.
			$unique_folder = 'user_images/'.$userRow['student_id']. '/';

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
			$sum = 0;
			while(file_exists($unique_folder.$temp_filename. '.jpg') != 0) {
				$phash4 = $phasher->getHash('user_images/'.$userRow['student_id'].'/'.$temp_filename.'.jpg', false);
				$image_hash = $phasher->hashAsString($phash4, false).PHP_EOL; // Image Hash in binary
				$image_hash = bindec($image_hash); // Image Hash in decimal
				$sum = $sum + $image_hash; // Sum of Image Hashes in decimal
				$i++; //Add 1 to i
				$temp_filename = strstr( $temp_filename, "_", true );
				$temp_filename = $userRow['student_id']. "_" . $i;
				file_exists($unique_folder.$temp_filename. '.jpg');
			}


				$n = count(scandir($unique_folder)) - 2; // Counts the number of files (in this case, images) in a folder or directory. Note: I subtracted “3” from the gross-count to get the final net-count because PHP include (.) and (..) among the file and directory returned by scandir().

				$Average_hash = $sum/$n; // Average hash in decimal
				$Average_hash = dechex($Average_hash); // Average hash in binary

				$phash5 = $phasher->getHash('913190617_9.jpg', false);
				

				$BIT_COUNT_METHOD = $phasher->getSimilarity($Average_hash, $phash5, 'BITS');
				$HAMMING_METHOD = $phasher->getSimilarity($Average_hash, $phash5);
				

	?>

			<br><br>
					Comparison with Average Hash
		<div>
			Using BIT COUNT METHOD &nbsp;<?php echo $BIT_COUNT_METHOD;?>
			<br>
			Using HAMMING METHOD &nbsp;<?php echo $HAMMING_METHOD; ?>
		</div>
