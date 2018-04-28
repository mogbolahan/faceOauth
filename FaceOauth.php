<?php
// Mogbolahan Ojeyinka. All rights reserved

//FaceOauth
session_start();
include_once 'dbconnect.php';


					
					
					$query = $DBcon->query("SELECT * FROM users WHERE user_id='$user_id'");
					$userRow=$query->fetch_array();
		  			

class FaceOauth 
{

      public function User_Login($username,$password) 
     {
     }

     public function User_Registration($username,$password,$email) 
     {

     }
	
	
	
	
		// Module for verifying face during login 
      public function VerifyFace($Average_trained_hash,$user_id)  {

						include('phash.php');
						$phasher = new Phash;
		  		  // GETTING THE SUM OF FACE SIGNATURE OF THE UNTRAINED IMAGES. NEEDED LATER TO COMPUTE THE AVERAGE
								//The name of the directory that we need to create.
							$unique_untrained_folder = './user_images/'.$userRow['student_id']. '/untrained/';

							$temp_filename = $userRow['student_id'];
							//check if filename already exists. If fileneme exists add an integer i for uniqueness
							$j = 0; 
							$sum_untrained = 0;

							while(file_exists($unique_untrained_folder.$temp_filename. '.jpg') != 0) {
								$phash4 = $phasher->getHash('user_images/'.$userRow['student_id'].'/untrained/'.$temp_filename.'.jpg', false);
								$image_hash = $phasher->hashAsString($phash4, false).PHP_EOL; // Image Hash in binary
								$image_hash = bindec($image_hash); // Image Hash in decimal
								$sum_untrained = $sum_untrained + $image_hash; // Sum of Image Hashes in decimal
								$j++; //Add 1 to i
								$temp_filename = strstr( $temp_filename, "_", true );
								$temp_filename = $userRow['student_id']. "_" . $j;
								file_exists($unique_untrained_folder.$temp_filename. '.jpg');

							}

					  //Check if the directory already exists.
				if(!is_dir($unique_untrained_folder))
					{
						//Directory does not exist, so let us create it.
						mkdir($unique_untrained_folder, 0755);
					}	
				$n_untrained = count(scandir($unique_untrained_folder)) - 2; // Counts the number of files (in this case, images) in a folder or directory. Note: I subtracted “3” from the gross-count to get the final net-count because PHP include (.) and (..) among the file and directory returned by scandir().

				$Average_untrained_hash = $sum_untrained/$n_untrained; // Average hash in decimal
				$Average_untrained_hash = dechex($Average_untrained_hash); // Average hash in binary
	
		  
		  

			$BIT_COUNT_METHOD = $phasher->getSimilarity($Average_trained_hash, $Average_untrained_hash, 'BITS');
			$HAMMING_METHOD = $phasher->getSimilarity($Average_trained_hash, $Average_untrained_hash);
										
			$_SESSION['Average_untrained_hash'] = $Average_untrained_hash;
			$_SESSION['BIT_COUNT_METHOD'] = $BIT_COUNT_METHOD;
			$_SESSION['HAMMING_METHOD'] = $HAMMING_METHOD;
		  
		 if($BIT_COUNT_METHOD >=90)
		 {
			
			$user_id = $_SESSION['userSession_intermediate'];
			
			return $user_id;						
		 }
		 else
		 {
			$_SESSION['output_modal']  = '#noMatchingRecordModal';
			 
		 	return false;
		 }
     }
    

	
     
    

}



?>


