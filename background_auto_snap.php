<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		function take_snapshot() {
			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
				// display results in page
				
					
				Webcam.upload( data_uri, 'saveimage.php', function(code, text) {
					document.getElementById('results').innerHTML = 
					'<h2>Here is your image:</h2>' + 
					'<img src="'+text+'"/>';
				} );	
			} );
		}
	</script>