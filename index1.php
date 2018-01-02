<html>
<head>
<title>Getting General course info!</title>
</head>
<body>
<?php
set_time_limit(0);
//database connection parameters
$databaseAddress = "localhost";
$username = "root";
$password = "";
$database = "zelusitc_GolfCourses";
$table = "course";

$file = "10500-11999.csv";

//place this before any script you want to calculate time
$time_start = microtime(true); 

$counter = 0;
if (($handle = fopen($file, "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 0, ",")) !== FALSE) { //fgetcsv(file,line length,separator,enclosure) 
	 
	if($counter % 100 == 0){
		echo "Lines number " . $counter . "<br>";
		ob_flush();
        flush();
	}
	
  //Connect to MySql database
		$mysqli = new mysqli($databaseAddress, $username, $password, $database);

		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
  
    for ($c=0; $c < 1; $c++) {
		$coursesUrl = "https://api.swingbyswing.com/v1/courses?access_token=gAAAAFaJFRgbsYAARqSxWZZ6Nzcnku6H6Tsa06bbwIoF09_ojtLdk7XV4kCG_UQoIR-j6g_Ct6ajx_IVvLQpOqHkw5srSmAcSduBvyY6cILpLJrygDDdgs9gUNooH_cmoeS7TUeFm5n9s1N6yVGdnqxd1KZ_PFk-qS5Yp4hWWMg7bVYSFAEAAIAAAACNFsL04O4t9Tf-6KAXjBBaheLSkldNUhHUI34KqX_SA9GG_6fFJCcH7RzgnjIPvbi2KFyP0xJ_B_YFs60L9eFDugQNzh21PQUXVYo_IuG56xKyfngw2b6yA8iQQ5RyPUqWWDcwwmDDrgztIpIkV5A2XoLy-3sU0QujwWngUnkkuRrnzCwQnsjKDps1-ZDjZjolb7ZmH7sW0SW890Mp7OAD9rocZ4Fny9xrORE6dIEZGCWk-6pXk-ysZt_-BUuONe5DylEzVRhg8_Tlcl0ekfWQAHEtYiLFOy8l2Z0tBhYCy8Jrpnrekj1jAdOZ7czSUIk5m4zl3HBTJ1_C1koclolOVSmXc5LcdY3nmN-DeeIezw&lat=" . $data[0] . "&lng=" . $data[1] . "&to=600&activeOnly=yes";
		 
		$properUrl =  html_entity_decode($coursesUrl);
		$json = file_get_contents($properUrl);
		$obj = json_decode($json);
		
		for($x = 0; $x < sizeof($obj->courses); $x++){
			$courseName = $obj->courses[$x]->name;
			//echo "Course name is: " . $courseName . "<br>";
			
			$courseId = $obj->courses[$x]->courseId;
			//echo "CourseId is: " . $courseId . "<br>";
			
			$courseLatitude = $obj->courses[$x]->lat;
			//echo "courseLatitude is: " . $courseLatitude . "<br>";
			
			$courseLongitude = $obj->courses[$x]->lng;
			//echo "courseLongitude is: " . $courseLongitude . "<br>";
			
			$distanceFromMeKilometers = $obj->courses[$x]->distanceFromMeKilometers;
			//echo "distanceFromMeKilometers is: " . $distanceFromMeKilometers . "<br>";
			
			$distanceFromMeMiles = $obj->courses[$x]->distanceFromMeMiles;
			//echo "distanceFromMeMiles is: " . $distanceFromMeMiles . "<br>";
			
			$website = $obj->courses[$x]->website;
			//echo "website is: " . $website . "<br>";
			
			$measurementType = $obj->courses[$x]->measurementType;
			//echo "measurementType is: " . $measurementType . "<br>";
			
			$measurementTypeId = $obj->courses[$x]->measurementTypeId;
			//echo "measurementTypeId is: " . $measurementTypeId . "<br>";
			
			$holeCount = $obj->courses[$x]->holeCount;
			//echo "holeCount is: " . $holeCount . "<br>";
			
			$addr1 = $obj->courses[$x]->addr1;
			//echo "addr1 is: " . $addr1 . "<br>";
			
			$addr2 = $obj->courses[$x]->addr2;
			//echo "addr2 is: " . $addr2 . "<br>";
			
			$city = $obj->courses[$x]->city;
			//echo "city is: " . $city . "<br>";
			
			$country = $obj->courses[$x]->country;
			//echo "country is: " . $country . "<br>";
			
			
			
			
			$query = "INSERT IGNORE INTO course(
			CourseName,
			courseId,
			courseLatitude,
			courseLongitude,
			distanceFromMeKilometers,
			distanceFromMeMiles,
			website,
			measurementType,
			measurementTypeId,
			holeCount,
			addr1,
			addr2,
			city,
			country
			) VALUES (
			'". $courseName ."', 
			'". $courseId ."',
			'". $courseLatitude ."',
			'". $courseLongitude ."',
			'". $distanceFromMeKilometers ."',
			'". $distanceFromMeMiles ."',
			'". $website ."',
			'". $measurementType ."',
			'". $measurementTypeId ."',
			'". $holeCount ."',
			'". $addr1 ."',
			'". $addr2 ."',	
			'". $city ."',
			'". $country ."'
			)";
			//echo $query . "<br>";
			$mysqli->query($query);	
		}
		$counter++;		
    }// for loop
	
	/* close connection */
	$mysqli->close();
  }
  fclose($handle);
  echo "Final Lines number " . $counter . "<br>";
}

$time_end = microtime(true);

//dividing with 60 will give the execution time in minutes other wise seconds
$execution_time = ($time_end - $time_start)/60;

//execution time of the script
echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
?>
</body>
</html>