<?php

ob_start();
session_start();

if(isset($_POST['submit']))
{
    include './config.php';
    
    $username = $_POST['adminuser'];
    $password = $_POST['adminpass'];
    
    if(defined('username') && password == $password){
        $_SESSION['adminuser'] = username;
        header("Location:index.php");
        exit;
    }else{
        $msg = "<div class='alert alert-danger alert-dismissible fade-show mb-0' role='alert>
       <button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
       <strong>Fuck!</strong>
       Quit Playing! Go Again!
   </div>";
    }
}

?>

<!doctype html>
<html lang="en">
    <head> 
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Gurzil 1.0 Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Gurzil" name="author" />
        <meta name="robots" content="noindex,nofollow">
        
        <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon-16x16.png">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/stylo.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="bg-primary bg-pattern">
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <a href="index.html" class="logo"><img src="assets/images/ee3.png" height="88" alt="logo"></a>
                            <h5 class="font-size-16 text-white-50 mb-4">Gurzil Cloaker 1.0 </h5>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <h5 class="mb-5 text-center">Sign in to Continue</h5>
                                      <?php if(isset($msg)){ echo $msg;} ?>
                                       <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-4">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="adminuser">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="userpassword">Password</label>
                                                    <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="adminpass">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="text-md-right mt-3 mt-md-0">
                                                            <a href="https://crg.ng/RSA-reset" target="_blank"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <input class="btn btn-success btn-block waves-effect waves-light" type="submit" value="Log In" name="submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
