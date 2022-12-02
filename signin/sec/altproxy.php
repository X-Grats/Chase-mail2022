<?php

function altProxy($ip,$switch){
    
    if($switch == 1){
        $url1 = "https://blackbox.ipinfo.app/lookup/".$ip;
        $ch3 = curl_init();
        curl_setopt($ch3,CURLOPT_URL,$url1);
        curl_setopt($ch3,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
        $resp1 = curl_exec($ch3);
        curl_close($ch3);
        $result = $resp1;
        if($result == "Y") {
            markBot("ALT PROXY","../logz/botlist.txt");
            return true;
        }elseif($result == "N"){
            return false;
        }
    }elseif($switch == 0){
            return false;
    }
    
}



$don = getUserIP();
if (altProxy($don,alt_proxy)) {
	/* A proxy has been detected based on your criteria
	 * and recorded
	 */
    header('location: '.  redirect_to);
	exit();
    
}








?>