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
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a href="index.html" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="assets/images/logo-new.png" alt="" class="logo logo-lg h-80  text-center" width="100px" height = "100px">
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
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="about-section text-center" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        
                        <p class="text-white">
                        <?php
// Include config file
require_once "config.php";

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$fileName ="";
$ipAddress = $_SERVER['REMOTE_ADDR'];

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "<p>File is an image - " . $check["mime"] . ".</p>";
    $uploadOk = 1;
  } else {
    echo "<p>File is not an image.</p>";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "<p>Sorry, file already exists.</p>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "<p>Sorry, your file is too large.</p>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "<p>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "<p>Sorry, your file was not uploaded.</p>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
	
	
	$fileName  = $_FILES["fileToUpload"]["name"];
	
	
	
  } else {
    echo "<p>Sorry, there was an error uploading your file.</p>";
  }
}

?>


<?php
// Prepare an insert statement
$sql = "INSERT INTO customers (`firstName`, `lastName`, `address1`,`address2`, `cityTown`, `state`, `zip`, `phoneNumber`, `mobilePhone`, `emailAddress`, `password`, `over18`, `pictureName`) VALUES (?, ?, ?,?, ?, ?,?, ?, ?, ?,?, ?, ?)";
 
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sssssssssssss", $firstname, $lastname, $address1, $address2, $cityTown, $state, $zip, $phoneNumber,$mobilePhone, $emailAddress,$password, $over18, $pictureName);
    
    // Set parameters
    $firstname =$_POST['firstName'];
    $lastname = $_POST['lastName'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $cityTown = $_POST['cityTown'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phoneNumber = $_POST['phoneNumber'];
    $mobilePhone = $_POST['mobilePhone'];
    $emailAddress = $_POST['emailAddress'];
    $password = $_POST['password'];
    $over18 = $_POST['over18'];
    $pictureName = $_POST['pictureName'];


    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        echo "Records inserted successfully.";
    } else{
        echo "<p>ERROR: Could not execute query: $sql. " . mysqli_error($link) . "</p>";
    }
} else{
    echo "<p>ERROR: Could not prepare query: $sql. " . mysqli_error($link) ."</p>";
}
 
// Close statement
mysqli_stmt_close($stmt);
 
// Close connection
mysqli_close($link);


?>
                        </p>
                        <li style="font-size:50px" class="nav-item"><a class="nav-link js-scroll-trigger" href="auth-signin.html">Sign In</a></li>
                    </div>
                </div>
              
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
                    <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
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
  
        })();
    </script>    
</html>