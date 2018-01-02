<?php
$url = 'https://api.swingbyswing.com/v1/courses?access_token=gAAAAFaJFRgbsYAARqSxWZZ6Nzcnku6H6Tsa06bbwIoF09_ojtLdk7XV4kCG_UQoIR-j6g_Ct6ajx_IVvLQpOqHkw5srSmAcSduBvyY6cILpLJrygDDdgs9gUNooH_cmoeS7TUeFm5n9s1N6yVGdnqxd1KZ_PFk-qS5Yp4hWWMg7bVYSFAEAAIAAAACNFsL04O4t9Tf-6KAXjBBaheLSkldNUhHUI34KqX_SA9GG_6fFJCcH7RzgnjIPvbi2KFyP0xJ_B_YFs60L9eFDugQNzh21PQUXVYo_IuG56xKyfngw2b6yA8iQQ5RyPUqWWDcwwmDDrgztIpIkV5A2XoLy-3sU0QujwWngUnkkuRrnzCwQnsjKDps1-ZDjZjolb7ZmH7sW0SW890Mp7OAD9rocZ4Fny9xrORE6dIEZGCWk-6pXk-ysZt_-BUuONe5DylEzVRhg8_Tlcl0ekfWQAHEtYiLFOy8l2Z0tBhYCy8Jrpnrekj1jAdOZ7czSUIk5m4zl3HBTJ1_C1koclolOVSmXc5LcdY3nmN-DeeIezw&lat=40.07080078&lng=-74.93360138&to=600&activeOnly=yes';

	//$url1 = str_replace('&amp;','&','https://api.swingbyswing.com/v1/courses?access_token=gAAAAFaJFRgbsYAARqSxWZZ6Nzcnku6H6Tsa06bbwIoF09_ojtLdk7XV4kCG_UQoIR-j6g_Ct6ajx_IVvLQpOqHkw5srSmAcSduBvyY6cILpLJrygDDdgs9gUNooH_cmoeS7TUeFm5n9s1N6yVGdnqxd1KZ_PFk-qS5Yp4hWWMg7bVYSFAEAAIAAAACNFsL04O4t9Tf-6KAXjBBaheLSkldNUhHUI34KqX_SA9GG_6fFJCcH7RzgnjIPvbi2KFyP0xJ_B_YFs60L9eFDugQNzh21PQUXVYo_IuG56xKyfngw2b6yA8iQQ5RyPUqWWDcwwmDDrgztIpIkV5A2XoLy-3sU0QujwWngUnkkuRrnzCwQnsjKDps1-ZDjZjolb7ZmH7sW0SW890Mp7OAD9rocZ4Fny9xrORE6dIEZGCWk-6pXk-ysZt_-BUuONe5DylEzVRhg8_Tlcl0ekfWQAHEtYiLFOy8l2Z0tBhYCy8Jrpnrekj1jAdOZ7czSUIk5m4zl3HBTJ1_C1koclolOVSmXc5LcdY3nmN-DeeIezw&lat=40.07080078&lng=-74.93360138&to=600&activeOnly=yes');

		//echo $url;
	//$sParamString = '&lat=40.07080078&lng=-74.93360138&to=600&activeOnly=yes';

	//$myURL = 'https://api.swingbyswing.com/v1/courses?';  

	//$access_tok = "gAAAAFaJFRgbsYAARqSxWZZ6Nzcnku6H6Tsa06bbwIoF09_ojtLdk7XV4kCG_UQoIR-j6g_Ct6ajx_IVvLQpOqHkw5srSmAcSduBvyY6cILpLJrygDDdgs9gUNooH_cmoeS7TUeFm5n9s1N6yVGdnqxd1KZ_PFk-qS5Yp4hWWMg7bVYSFAEAAIAAAACNFsL04O4t9Tf-6KAXjBBaheLSkldNUhHUI34KqX_SA9GG_6fFJCcH7RzgnjIPvbi2KFyP0xJ_B_YFs60L9eFDugQNzh21PQUXVYo_IuG56xKyfngw2b6yA8iQQ5RyPUqWWDcwwmDDrgztIpIkV5A2XoLy-3sU0QujwWngUnkkuRrnzCwQnsjKDps1-ZDjZjolb7ZmH7sW0SW890Mp7OAD9rocZ4Fny9xrORE6dIEZGCWk-6pXk-ysZt_-BUuONe5DylEzVRhg8_Tlcl0ekfWQAHEtYiLFOy8l2Z0tBhYCy8Jrpnrekj1jAdOZ7czSUIk5m4zl3HBTJ1_C1koclolOVSmXc5LcdY3nmN-DeeIezw"; 
    //$options = array("access_token"=>$access_tok,"lat"=>40.07080078,"lng"=>-74.93360138,"to"=>600,"activeOnly"=>yes);
    //$myURL .= http_build_query($options,'','&');

    //$myData = file_get_contents($url1) or die(print_r(error_get_last()));
	
		
		
	// create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

	$xml = simplexml_load_string($output);
	echo $xml;
	

?>