<?php
set_time_limit(0);
for($x = 1; $x < 200; $x++){
	
	echo "Number " . $x . "<br>";
	sleep (1);
	ob_flush();
        flush();
}


?>