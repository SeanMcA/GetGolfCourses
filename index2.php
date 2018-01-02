<?php
set_time_limit(0);

//place this before any script you want to calculate time
$time_start = microtime(true); 

for($x = 1; $x < 50; $x++){
	
	echo "Number " . $x . "<br>";
	sleep (1);
	ob_flush();
        flush();
}

$time_end = microtime(true);

//dividing with 60 will give the execution time in minutes other wise seconds
$execution_time = ($time_end - $time_start)/60;

//execution time of the script
echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';

?>