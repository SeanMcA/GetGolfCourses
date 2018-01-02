<html>
<head>
<title>Getting General course info!</title>
</head>
<body>
<?php
$file = "test.csv";
$row = 1;
if (($handle = fopen("test.csv", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //fgetcsv(file,length,separator,enclosure) 
    for ($c=0; $c < 1; $c++) {
		$coursesUrl = "https://api.swingbyswing.com/v1/courses?access_token=gAAAAFaJFRgbsYAARqSxWZZ6Nzcnku6H6Tsa06bbwIoF09_ojtLdk7XV4kCG_UQoIR-j6g_Ct6ajx_IVvLQpOqHkw5srSmAcSduBvyY6cILpLJrygDDdgs9gUNooH_cmoeS7TUeFm5n9s1N6yVGdnqxd1KZ_PFk-qS5Yp4hWWMg7bVYSFAEAAIAAAACNFsL04O4t9Tf-6KAXjBBaheLSkldNUhHUI34KqX_SA9GG_6fFJCcH7RzgnjIPvbi2KFyP0xJ_B_YFs60L9eFDugQNzh21PQUXVYo_IuG56xKyfngw2b6yA8iQQ5RyPUqWWDcwwmDDrgztIpIkV5A2XoLy-3sU0QujwWngUnkkuRrnzCwQnsjKDps1-ZDjZjolb7ZmH7sW0SW890Mp7OAD9rocZ4Fny9xrORE6dIEZGCWk-6pXk-ysZt_-BUuONe5DylEzVRhg8_Tlcl0ekfWQAHEtYiLFOy8l2Z0tBhYCy8Jrpnrekj1jAdOZ7czSUIk5m4zl3HBTJ1_C1koclolOVSmXc5LcdY3nmN-DeeIezw&lat=" . $data[0] . "&lng=" . $data[1] . "&to=3&activeOnly=yes";
		//echo $data[0] . "<br>";
		$properUrl =  html_entity_decode($coursesUrl);
		$json = file_get_contents($properUrl);
		$obj = json_decode($json);
		//echo $json;
		//echo "Returned number of courses: " . sizeof($obj->courses) . "<br>";
		for($x = 0; $x < sizeof($obj->courses); $x++){
			echo "Course name is: " . $obj->courses[$x]->name . "<br>";
		}
		//echo "Course name is: " . $obj->courses[0]->name . "<br>";
		//echo "Course name is: " . $obj->courses[1]->name . "<br>";
		//echo "Latitude is: " . $obj->courses[0]->lat . "<br>";
		//echo "Longitude is: " . $obj->courses[0]->lng . "<br>";
		//echo "Course id is: " . $obj->courses[0]->courseId . "<br>";
		//echo    "<br><br>";
		
        //echo "Latitude is: " . $data[0] . "\tLongitude is: " . $data[1] . "<br />\n";
		
    }
  }
  fclose($handle);
}
?>
</body>
</html>