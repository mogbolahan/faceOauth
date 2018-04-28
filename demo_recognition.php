<?php
// Turn off all error reporting
error_reporting(0);

session_start();
include_once 'dbconnect.php';

include('phash.php');
$phasher = new Phash;
$phash2 = $phasher->getHash('913190617_3.jpg', false);
$phash3 = $phasher->getHash('913190617_21.jpg', false);

?>

<div>
	Image 1 Hash in binary &nbsp;<?php echo $phasher->hashAsString($phash2, false).PHP_EOL;?>
	<br>
	Image 2 Hash in binary &nbsp;<?php echo $phasher->hashAsString($phash3, false).PHP_EOL;?>
	
</div>

<br>

<div>
	Image 1 Hash hex &nbsp;<?php echo $phasher->hashAsString($phash2).PHP_EOL; ?>
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
				$image_hash = $phasher->hashAsString($phash4, false).PHP_EOL; // Image Hash in bin
				$image_hash = bindec($image_hash); // Image Hash in dec
				$sum = $sum + $image_hash; // Sum of Image Hashes in dec
				$i++; //Add 1 to i
				$temp_filename = strstr( $temp_filename, "_", true );
				$temp_filename = $userRow['student_id']. "_" . $i;
				file_exists($unique_folder.$temp_filename. '.jpg');
			}


				$n = count(scandir($unique_folder)) - 2; // Counts the number of files (in this case, images) in a folder or directory. Note: I subtracted “3” from the gross-count to get the final net-count because PHP include (.) and (..) among the file and directory returned by scandir().

				$Average_hash_decimal = $sum/$n; // Average hash in decimal
			//	$Average_hash_hex = decbin((float)$Average_hash_decimal); 
				$Average_hash_bin = decbin((float)$Average_hash_decimal); // Average hash in bin
				$Average_hash_hex = dechex((float)$Average_hash_decimal); // Average hash in hex
				

				$BIT_COUNT_METHOD = $phasher->getSimilarity($Average_hash_hex, $phash3, 'BITS');
				$HAMMING_METHOD = $phasher->getSimilarity($Average_hash_hex, $phash3);
				

	?>


<div>
	Average untrained Hash in binary &nbsp;<?php echo $phasher->hashAsString($phash3, false).PHP_EOL;?>
	<br>
	Average untrained Hash in hex &nbsp;<?php echo $phasher->hashAsString($phash3).PHP_EOL; ?>
	
</div>

<br>

<div>
	Average trained Hash in bin &nbsp;<?php echo $Average_hash_bin;?> <br>
	Average trained Hash in hex &nbsp;<?php echo $Average_hash_hex;?>
</div>

			<br><br>
					SIMILARITY / Comparison with Average Hash  i.e. Recognition <br>
		<div>
			Using BIT COUNT METHOD &nbsp;<?php echo $BIT_COUNT_METHOD;?>
			<br>
			Using HAMMING METHOD &nbsp;<?php echo $HAMMING_METHOD; ?>
		</div>
