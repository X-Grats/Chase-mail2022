<?php
    ob_start();
    session_start();

    if(!isset($_SESSION['adminuser'])){
        header("location: ./auth-login.php");
        exit;
    }else{
        include './config.php';
    }


?>


<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Config |  AP - Responsive Script 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="AP" name="author" />
        <meta name="robots" content="noindex,nofollow">
        <meta http-equiv="refresh" content="600;url=./auth-logout.php">
        
         <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon-16x16.png">
        
        <link href="assets/libs/slick-slider/slick/slick.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/slick-slider/slick/slick-theme.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/stylo.css" rel="stylesheet" type="text/css" />
        
        <script language="javascript" type="text/javascript" src="./assets/edit_area/edit_area_full.js"></script>
        <script language="javascript" type="text/javascript">
            editAreaLoader.init({
                id : "textarea_1"		// textarea id
                ,syntax: "php"			// syntax to be uses for highgliting
                ,start_highlight: true		// to display with highlight mode on start-up
            });
        </script>

    </head>

    <body data-sidebar="dark">

        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="./index.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/unnamed.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/ee3.png" alt="" height="20">
                                </span>
                            </a>

                            <a href="./index.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/unnamed.png" alt="" height="45">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/ee3.png" alt="" height="70">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-backburger"></i>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex">

                        

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-flag-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-info"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item notify-item">
                                    <img src="assets/images/flags/russia.jpg" alt="user-image" class="mr-2" height="12"><span class="align-middle">Clear/Wipe Current DATA</span>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ml-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen"></i> 
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/unnamed.png"
                                    alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1"><?php echo yourname; ?></span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="./setting.php"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> <?php echo reciever; ?></a>
                                <a class="dropdown-item" href="./index.php?status=wipe"><i class="mdi mdi-credit-card-outline font-size-16 align-middle mr-1"></i> Delete Data</a>
                                <a class="dropdown-item" href="./setting.php"><i class="mdi mdi-account-settings font-size-16 align-middle mr-1"></i> Config</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="./auth-logout.php"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                            </div>
                        </div>
            
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>
                            <li>
                                <a href="./index.php" class="waves-effect">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="./setting.php" class=" waves-effect">
                                    <i class="fas fa-cogs"></i>
                                    <span>Config</span>
                                </a>
                            </li>
                            <li>
                                <a href="./info.php" class=" waves-effect">
                                    <i class="fas fa-info-circle"></i>
                                    <span>Info</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18 smack">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item smack"><a href="javascript: void(0);" class="smack">RSA 4</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->
<?php
                        
    $click = "config.php";
    $fps = fopen($click, "r");
    $contents = fread($fps, filesize($click));
    fclose($fps);
                        
    
           
    if(isset($_POST['sub'])){
        $nu_content = $_POST['updateconfig'];
        file_put_contents('./config.php', $nu_content);
        $mas = "<div class='row'>
                           <div class='col-sm-12 text-center'>    
                               <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    <strong>Config Updated Successfully!</strong>
                                </div>
                           </div>
                       </div>";
        header("Refresh:2;url="."./setting.php");
        
    }
    
                        
                        
?>
                        <?php if(isset($mas)){echo $mas; } ?>

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Config</h4>
                                        <p class="card-title-desc show-face"><code>Toggle Editor OFF , whilst using MOBILE</code> nb</p>
                                        <form action="" method="post" class="">
                                            <textarea name="updateconfig" id="textarea_1" cols="65%" rows="15" class="form-control rsa-textfield" maxlength="4096"><?php echo $contents; ?></textarea>
                                            <input type="submit" class="btn btn-block btn-primary" value="Save Config" name="sub">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">How to configure telegram for your bots</h4>
                                        <p class="card-title-desc">Using the telegram bot [RSA 4] is quite easy. All you need to do is detect chat id for recieving alert and logs and save it in your config. <br><br>NOTE: This is your API Key <code>778934038:AAFi5kDLLg9AfD2KDpC3vW2MW9mDULlL-TM</code><br> </p>
                                        
                                        
                                        <ul>
                                            <li>First step is finding the bot in telegram. Search for <code>@my_testitino_bot</code></li>
                                            <li>Send the bot a text message. Eg. Hello</li>
                                            <li>Type this url into your browser <a href="https://api.telegram.org/bot778934038:AAFi5kDLLg9AfD2KDpC3vW2MW9mDULlL-TM/getupdates"><code>https://api.telegram.org/bot778934038:AAFi5kDLLg9AfD2KDpC3vW2MW9mDULlL-TM/getupdates</code></a></li>
                                            <li>Click <code>Ctrl F</code> in browser window and search for <code>"chat":{"id"</code>. The number just after the highlighted text is your personal_id.</li>
                                            <li>Since it is a personal chat. Set that number as your <code>personal_id</code> within your config</li>
                                            <li>Now to get your logs within Telegram, Create a channel and add the bot as Admin and broadcast a message to your newly created channel. Eg. Welcome</li>
                                            <li>Afterwards. reload url and Click <code>Ctrl F</code> in browser window again and search for <code>"chat":{"id"</code>. The <code>chat_id</code> with a negative integer(-) at the start is your Channel_id, save in config. <br> </li>
                                            <b><i><br>Note: Sharing the API Key makes the whole process UNSECURE, you could be putting your results and your telegram account @ high risk.</i></b>
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                2020 © AP 4000.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>


        <!-- Jq vector map -->
        <script src="assets/libs/jqvmap/jquery.vmap.min.js"></script>
        <script src="assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>
        <script src="assets/js/pages/dashboard.init.js"></script>
        <script src="assets/js/app.js"></script>

    </body>
</html>
