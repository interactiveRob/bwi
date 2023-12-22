<?php
// create curl resource for parking-availability
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://bwiairport.wpengine.com/wp-content/themes/bwitheme/cron/parking-availability.php");
	//return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// $output contains the output string
	$output = curl_exec($ch);
	echo $output ;
	// close curl resource to free up system resources
	curl_close($ch);

	// create curl resource for wait-times
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://bwiairport.wpengine.com/wp-content/themes/bwitheme/cron/wait-times.php");
	//return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// $output contains the output string
	$output = curl_exec($ch);
	echo $output;
	// close curl resource to free up system resources
	curl_close($ch);

	// create curl resource for flight-data
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://bwiairport.wpengine.com/wp-content/themes/bwitheme/cron/flight-data.php");
	//return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	// $output contains the output string
	$output = curl_exec($ch);
	echo $output;
	// close curl resource to free up system resources
	curl_close($ch);

    // create curl resource for map-data
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://bwiairport.wpengine.com/wp-content/themes/bwitheme/cron/map-data.php");
	//return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// $output contains the output string
	$output = curl_exec($ch);
	echo $output;
		// close curl resource to free up system resources
	curl_close($ch);

	// create curl resource for gate-data
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://bwiairport.wpengine.com/wp-content/themes/bwitheme/cron/gate-data.php");
	//return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// $output contains the output string
	$output = curl_exec($ch);
	echo $output;
	// close curl resource to free up system resources
	curl_close($ch);

	// create curl resource for google-maps-times
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://bwiairport.wpengine.com/wp-content/themes/bwitheme/cron/google-maps-times.php");
	//return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// $output contains the output string
	$output = curl_exec($ch);
	echo $output;
	// close curl resource to free up system resources
	curl_close($ch);


  //  //temporary commit plugin dir cron files

		// // create curl resource for parking-availability
		// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, "https://bwiairport.wpengine.com/wp-content/plugins/plugin_wayfinder/templates/cron/parking-availability.php");
		// //return the transfer as a string
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// // $output contains the output string
		// $output = curl_exec($ch);
		// echo "parking-availability result: " . $output . "<br>";
		// // close curl resource to free up system resources
		// curl_close($ch);

		// // create curl resource for wait-times
		// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, "https://bwiairport.wpengine.com/wp-content/plugins/plugin_wayfinder/templates/cron/wait-times.php");
		// //return the transfer as a string
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// echo "parking-availability result: " . $output . "<br>";
		// // $output contains the output string
		// $output = curl_exec($ch);
		// // close curl resource to free up system resources
		// curl_close($ch);

		// // create curl resource for flight-data
		// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, "https://bwiairport.wpengine.com/wp-content/plugins/plugin_wayfinder/templates/cron/flight-data.php");
		// //return the transfer as a string
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// // $output contains the output string
		// $output = curl_exec($ch);
		// echo "parking-availability result: " . $output . "<br>";
		// // close curl resource to free up system resources
		// curl_close($ch);

  //       // create curl resource for gate-data
		// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, "https://bwiairport.wpengine.com/wp-content/plugins/plugin_wayfinder/templates/cron/map-data.php");
		// //return the transfer as a string
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// // $output contains the output string
		// $output = curl_exec($ch);
		// echo "parking-availability result: " . $output . "<br>";
		// // close curl resource to free up system resources
		// curl_close($ch);

		// // create curl resource for gate-data
		// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, "https://bwiairport.wpengine.com/wp-content/plugins/plugin_wayfinder/templates/cron/gate-data.php");
		// //return the transfer as a string
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// // $output contains the output string
		// $output = curl_exec($ch);
		// echo "parking-availability result: " . $output . "<br>";
		// // close curl resource to free up system resources
		// curl_close($ch);

		// // create curl resource for google-maps-times
		// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, "https://bwiairport.wpengine.com/wp-content/plugins/plugin_wayfinder/templates/cron/google-maps-times.php");
		// //return the transfer as a string
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// // $output contains the output string
		// $output = curl_exec($ch);
		// echo "parking-availability result: " . $output . "<br>";
		// // close curl resource to free up system resources
		// curl_close($ch);

		echo "<br> <br> cron run successfully";
?>