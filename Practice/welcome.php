<?php
// Include config file
require_once "config.php";

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">

    <style type="text/css">
        body{font: 20px sans-serif;  text-align:center;}
        .row{margin-top:25px; margin-bottom:10px;}
        footer {background-color: #f2f2f2;padding: 40px;}
        h3{text-decoration: underline; margin-top:25px; margin-bottom:25px; font-weight:bold}
        .jumbotron{background-color: #f2f2f2;padding: 25px;}
        h4{font: 20px; text-decoration: underline; margin-top:25px;}
    </style>
</head>
<body>
    <div class="jumbotron">
        <div class="container text-center">
            <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to your account.</h1>
            <p>We work to provide the best service to our customers</p>
        </div>
    </div>
    <div class="container-fluid bg-3 text-center">
        <h3>Customer Information</h3>
        <div class="row">
                <div class="d-flex flex-column align-items-center text-center">
                    <img class="rounded-circle" height="200px" width="180px" src="<?php require "getImage.php"; ?>">
                    <span class="font-weight-bold"><?php echo ($_SESSION["username"]) ?></span>
                </div>        
            <div class="col-sm-3">
                <h4>UserName</h4>
                <?php require_once "getUserName.php"; ?>
            </div>
            <div class="col-sm-3">
                <h4>First Name</h4>
                <?php require_once "getName.php"; ?>
            </div>
            <div class="col-sm-3">
                <h4>Last Name</h4>
                <?php require_once "getName2.php"; ?>
            </div>
            <div class="col-sm-3">
                <h4>Email</h4>
                <?php require_once "getEmail.php"; ?>
            </div>
            <div class="col-sm-3">
                <h4>Gender</h4>
                <?php require_once "getGender.php"; ?>
            </div>
            <div class="col-sm-3">
                <h4>IpAddress</h4>
                <label>Your <?php require_once "ipAddress.php"; ?></label>
            </div>
            <div class="col-sm-3">
                <h4>Profile Picture</h4>
                <a href="<?php require "getImage.php"; ?>">Press here to view</a>
            </div>
        </div>
    </div><br><br>
    <p>
        <a href="updateInfo.php" class="btn btn-primary">Update Information</a>
        <a href="reset_password.php" class="btn btn-info">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    
    <footer class="container-fluid text-center">
        <p>Powered by Leonel Barrientos</p>
    </footer>
</body>
</html>