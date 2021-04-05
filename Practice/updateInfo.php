<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $firstname = $lastname = $email = $gender = $ip_address = $picture = "";
$username_err = $firstname_err = $lastname_err = $email_err = $gender_err = $ip_address_err = $picture_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        // file upload
        $filepath = "images/" . $_FILES["picture"]["name"];
        if(move_uploaded_file($_FILES["picture"]["tmp_name"], $filepath)) {
            $picture = $filepath;
        } 
        else {
            $picture_err="Please upload an image";
        } 

        // Validate first name
        if(empty(trim($_POST['firstname']))){
            $firstname_err = "Please enter your first name.";
        }
        else {
            $firstname = trim($_POST['firstname']);
    
        }
    
        // Validate last name
        if(empty(trim($_POST['lastname']))){
            $lastname_err = "Please enter your last name.";
        }
        else {
            $lastname = trim($_POST['lastname']);
        
        }
    
        //validate email
        if(empty(trim($_POST['email']))){
            $email_err = "Please enter a valid email.";
        }
        else {
            $email = trim($_POST['email']);
        
        }
    
        //validate gender
        if(empty(trim($_POST['gender']))){
            $gender_err = "Please choose a gender.";
        }
        else {
            $gender = trim($_POST['gender']);    
        }
      
    // Check input errors before inserting in database
    if(empty($firstname_err) && empty($lastname_err) && empty($email_err) && empty($gender_err) 
    && empty($picture_err)){
        
        $sql = "UPDATE customers SET first_name= ?, last_name= ?, email= ?,gender= ?, picture=? WHERE id=".($_SESSION["id"]);

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sssss", $param1, $param2, $param3, $param4, $param6);

            $param1 = $firstname;
            $param2 = $lastname;
            $param3 = $email;
            $param4 = $gender;
            $param6 = $picture;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: welcome.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Close connection
    mysqli_close($link);

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
            <h1><b>Customers</b></h1>
            <p>We work to provide the best service to our customers</p>
        </div>
    </div>
    <div class="container-fluid bg-3 text-center">
    <form class="row g-3 " enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
        <h3>Update Personal Information</h3>
        <div class="row">
            <div class="col-md-4 col-sm-2 <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                <label>First Name</label>
                <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>">
                <span class="help-block"><?php echo $firstname_err; ?></span>
            </div>
            <div class="col-md-4 col-sm-2 <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                <label>Last Name</label>
                <input type="text" name="lastname" class="form-control">
                <span class="help-block"><?php echo $lastname_err; ?></span>
            </div>
            <div class="col-md-4 col-sm-2 <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="col-md-4 col-sm-2 <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
                <label>Gender</label>
                <select type="text" name="gender" id="gender" class="form-control">
                    <option value=""></option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Non-binary</option>
                    <option>Genderqueer</option>
                    <option>Genderfluid</option>
                    <option>Bigender</option>
                    <option>Polygender</option>
                    <option>Agender</option>
                    <option>Other</option>
                </select>
                <span class="help-block"><?php echo $gender_err; ?></span>
            </div>
            <div class="col-md-4 col-sm-2 <?php echo (!empty($picture_err)) ? 'has-error' : ''; ?>">
               <label>Select Profile Picture:</label>
               <input type="file" name="picture" class="form-control" value="<?php echo $picture; ?>">
            <span class="help-block"><?php echo $picture_err; ?></span>
            </div>
            
        </div>
        <div class="row">
            <input type="submit" class="btn btn-primary" value="Submit">
            <a class="btn btn-link" href="welcome.php">Cancel</a>
        </div>
        </form>
    </div>
    <footer>
        <p>Powered by Leonel Barrientos</p>
    </footer>
</body>
</html>