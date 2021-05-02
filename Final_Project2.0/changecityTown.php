<?php

// Include config file
require_once "config.php";

// Initialize the session
if ( ! session_id() ) {

    session_start();
    
   }

// Check if the user is already logged in, if yes then redirect him to home page
if(!$_SESSION["loggedin"] === true){
    header("location: auth-signin.html");
    exit;
 }
// GEt data in session variables
$loggedin=false;
$pictureURL="assets/images/user/profile.jpg";

if(isset($_SESSION["loggedin"]))
 {
    $loggedin =$_SESSION["loggedin"];
    $id= $_SESSION["id"];
    $pictureURL =  "uploads/" . $_SESSION["pictureName"];   
    $emailAddress =$_SESSION["emailAddress"]; 
    
    
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="Leonel" content="" />
        <title>Gym Equipment</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

            <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    </head>
    <body>
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
                <div class="container">
                    <a href="index.html" class="b-brand">
                        <!-- ========   change your logo hear   ============ -->
                        <img src="assets/images/logo-new.png" alt="" class="logo logo-lg h-80  text-center" width="120px" height = "100px">
                    </a>
                    <a class="navbar-brand js-scroll-trigger" href="index.html">Gym Equipment</a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="auth-signin.html">Sign In</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="register.php">Register</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container d-flex h-80 align-items-center">
                <div class="mx-auto text-center">
                    <h1 style="font-size:50px" class="mx-auto my-0 text-uppercase">My Account</h1>
                    <center><h2>Edit Address</h2></center>
                    <form action="editCity.php" name="contactForm" method="post" onsubmit="return validateForm()" >
                        <div class="card-body">
                            <img src="assets/images/logo-dark.svg" alt="" class="img-fluid mb-4">
                            <label for="cityTown" class="form-label text-white-50">City/Town</label>
                        <div class="input-group mb-4">
                               
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-city"></i></span>
                                <input type="text" class="form-control" id="cityTown" name="cityTown" aria-describedby="inputGroupPrepend" placeholder="City/Town" onkeyup="validateCity()">
                                <span class="input-group-text iconParent"><i  class="fa fa-star" id="cityIcon" ></i></span>
                            </div>
                            <div class="error" id="cityTownErr"></div>
                        </div>  
                                             
                   <div class="row mt-10">
                                <label class="text-white-50">Certify the Change &nbsp;&nbsp;</label>
                                <div class="form-inline">
                                    <label class="text-white-50"><input type="checkbox" value="false" id="verChange" name="verChange"> &nbsp;&nbsp;I certify the change</label>
                                    <div class="error" id="verChangeErr"></div>
                                </div>
                            </div>
                            <button class="btn btn-block btn-primary mb-4" onclick="validateForm();">Reset</button>
                            <p class="mb-0 text-muted"><a href="MyAccount.php" class="f-w-400">CANCEL</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </header>            
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">

                    </div>
                </div>
                
            </div>
        </section>

        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container">Copyright © Leonel Barrientos 2021</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>   
    </body>
    <script>
        (function documentReady() {
    
    
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });
    
        
    
    
    
        })();
    </script>
    <script>
        // Defining a function to display error message
        function printError(elemId, hintMsg) {
            document.getElementById(elemId).innerHTML = hintMsg;
        }
    
        // Retrieving the values of form elements 
        var cityTown = document.contactForm.cityTown;
        var verChange = document.contactForm.verChange;
    
        // Defining error variables with a default value
        var cityTownErr = verChangeErr = true;
    
        function valid(el, iconID) {
            el.style.border = "1px solid green";
            var elIcon = document.getElementById(iconID);
            elIcon.parentNode.style.border = "1px solid green";
            elIcon.style.color = "green";
            elIcon.classList.remove("fa-star");
            elIcon.classList.remove("fa-exclamation-triangle");
            elIcon.classList.add("fa-check");
        }
    
        function inValid(el, iconID) {
            el.style.border = "1px solid red";
            var elIcon = document.getElementById(iconID);
            elIcon.parentNode.style.border = "1px solid red";
            elIcon.style.color = "red";
            elIcon.classList.remove("fa-star");
            elIcon.classList.remove("fa-check");
            elIcon.classList.add("fa-exclamation-triangle");
        }     
  
    function validateCity() {
        // Validate city/town
        if (cityTown.value == "") {
            printError("cityTownErr", "Please enter your city/town");
            inValid(cityTown, "cityIcon");
        } else {
            // Regular expression for basic address validation
            var regex = /^[A-Z][a-z]*/; // ex: Farmingdale
            var regex2 = /^[A-Z][a-z]*\s[A-Z][a-z]*/; // ex: New York

            if ((regex.test(cityTown.value) || regex2.test(cityTown.value)) === false) {
                printError("cityTownErr", "Please enter a valid city/town");
                inValid(cityTown, "cityIcon");
            } else {
                printError("cityTownErr", "");
                cityTownErr = false;
                valid(cityTown, "cityIcon");
            }
        }
    }
        // Defining a function to validate form 
        function validateForm() {

            validateCity();

            if (!verChange.checked) {
            printError("verChangeErr", "You must certify the edit.");
            return false;
        } else {
            verChange.value ="true";
            printError("verChangeErr", "");
            verChangeErr = false;
        }

    
            // Prevent the form from being submitted if there are any errors
            if ((cityTownErr || verChange) == true) {
                return false;
            } else {
                return true;
            }
    
        };
    </script>
<style>
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px;
    }
    
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
    
    .error {
        color: red;
        font-size: 90%;
    }
    
    input[type="submit"]:hover {
        background: #0165b6;
    }
    
    input[type=text],
    input[type=password],
    select {
        border-right: 0 !important;
    }
    
    .iconParent {
        background-color: white;
        border-left: 0 !important;
    }
</style>
<style>
    .emp-profile {
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }
    
    .profile-img {
        text-align: center;
    }
    
    .profile-img img {
        width: 70%;
        height: 100%;
    }
    
    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }
    
    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }
    
    .profile-head h5 {
        color: #333;
    }
    
    .profile-head h6 {
        color: #0062cc;
    }
    
    .profile-edit-btn {
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }
</style>        
</html>