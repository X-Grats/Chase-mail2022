<?php
    ob_start();
    session_start();

    if(!isset($_SESSION['adminuser'])){
        header("location: ./auth-login.php");
        exit;
    }else{
        include './config.php';
    }

    $domain = preg_replace('/www\./i', '', $_SERVER['SERVER_NAME']);
    $ipserver = $_SERVER['SERVER_ADDR'];

?>


<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Info |  AP - Responsive Script 4 Admin Dashboard</title>
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

                            <a href="index.html" class="logo logo-light">
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
                                <a href="./index.php?status=wipe" class="dropdown-item notify-item">
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
                                <img class="rounded-circle header-profile-user" src="assets/images/unnamed.png"  alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1"><?php echo yourname; ?></span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="./setting.php"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i><?php echo reciever; ?></a>
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

                        

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Info</h4>
                                        <p class="card-title-desc">Basic Info regarding this particular setup.</p>
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Basic Info</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Domain</td>
                                                        <td><?php echo $domain; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email for Logs</td>
                                                        <td><?php echo reciever; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>URL</td>
                                                        <td><?php echo "https://".$domain."/" ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>IP Server</td>
                                                        <td><?php echo $ipserver; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td>CHASE OUTLAW</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="givenchy">
                                            <a href="https://www.spamhaus.org/query/ip/<?php echo $ipserver;?>" target="_blank" class="btn btn-sm btn-outline-danger btn-block">Verify Blocklist</a>
                                        </div>
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
