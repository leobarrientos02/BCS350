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
        <meta Name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta Name="description" content="" />
        <meta Name="Leonel" content="" />
        <title>Gym Equipment</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a href="home.php" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="assets/images/logo-new.png" alt="" class="logo logo-lg h-80  text-center" width="100px" height = "80px">
                </a>
                <a class="navbar-brand js-scroll-trigger" style="font-size:20px" href="home.php">Gym Equipment</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="all_customers.php">All Members</a></li> 
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="product.php">Products</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="MyAccount.php">My Account</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="logout.php">Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container d-flex h-80 align-items-center">
                <div class="mx-auto text-center">
                    <h1 class="mx-auto my-0 text-uppercase">My Account</h1>
                    <img class="rounded-circle" height="200px" width="200px" src="<?php echo htmlspecialchars($pictureURL); ?>" alt='' class='user-avtar' />
                    <h2  style="position:relative; right:480px;" class="mx-auto mt-2 mb-5"><?php require_once "getInfo.php"; ?> 
                    </h2>
                    <p class="mb-0 text-muted">Change Password?<a href="auth-resetPassword.html" class="f-w-400">Update Password</a></p>
                   
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2 class="text-white mb-4">Gym Equipment</h2>
                        <p class="text-white-50">
                            We have developed a website where our registered members can view all kinds
                            of gym equipments around the world. In addition, meet other gym enthusiasts
                            around the world. Don't get to excited!!!
                        </p>
                    </div>
                </div>
                <img class="img-fluid" src="assets/img/tenor.gif" alt="" />
            </div>
        </section>
        <!-- Signup-->
        <section class="signup-section" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                        <h2 class="text-white mb-5">Subscribe to receive updates!</h2>
                        <form class="form-inline d-flex">
                            <input class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" type="email" placeholder="Enter email address..." />
                            <button class="btn btn-primary mx-auto" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="contact-section bg-black">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">USA, 11561, Long Beach, New York</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50"><a href="https://www.w3schools.com/default.asp">www.w3Schools.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">+1 (516) 960-8086</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="https://twitter.com"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
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
</html>