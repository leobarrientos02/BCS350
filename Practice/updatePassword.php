<?php
// This file was made to fix an issue with pre-existing customer's password, 
// not passing the password validation because password only customers registered 
// through the site, had hashed_passwords in which were used in the validation.

// Include config file
require_once "config.php";

$username = $new_password = $confirm_password = "";
$username_err = $new_password_err = $confirm_password_err="";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = mysqli_real_escape_string($link, $_POST['username']);
    $new_password = mysqli_real_escape_string($link, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($link, $_POST['confirm_password']);

    //validate
    if(empty($username)){
        $username_err = "Username is required";
    }
    
    if(empty($new_password)){
        $new_password_err = "Please enter a new password";
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }    
    
    if(empty($confirm_password)){
        $confirm_password_err = " Please confirm password"; 
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }    

    $query = "SELECT username FROM customers WHERE username='$username'";
    $results = mysqli_query($link, $query);
    
    if(empty($username_err)){
        if(mysqli_num_rows($results) <= 0){
            $username_err = "No user exists on our system";
        }
        else{
            if( empty($new_password_err) && empty($confirm_password_err)){
                // Prepare an update statement
                $sql = "UPDATE customers SET password = ? WHERE username='$username'";
        
                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_password);
                
                    // Set parameters
                    $param_password = password_hash($new_password, PASSWORD_DEFAULT);
                
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        // Password updated successfully. Destroy the session, and redirect to login page
                        session_destroy();
                        header("location: login.php");
                        exit();
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
    
                    // Close statement
                    mysqli_stmt_close($stmt);
            }                
            }
        }
    
    }

    // Check input errors before updating the database
    if(empty($username_err) && empty($new_password_err) && empty($confirm_password_err)){

    }
    // Close connection
    mysqli_close($link);      

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <style type="text/css">
        body{font: 20px sans-serif;  text-align:center;}
        .form-group{ margin-top:25px; margin-bottom:10px;}
        h2{ text-decoration: underline; margin-top:10px; margin-bottom:10px;}
        footer {background-color: #f2f2f2;padding: 40px;}
        .jumbotron{background-color: #f2f2f2;padding: 25px;}
    </style>
</head>
<body>
    <div class="jumbotron">
        <div class="container text-center">
            <h2>Reset Password</h2>
        </div>
    </div> 
    <div class="container mt-3">
        <center> 
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="col-md-4 mt-2 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="col-md-4 mt-2  <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="col-md-4 mt-2  <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link" href="welcome.php">Cancel</a>
            </div>
        </form> 
        </center>                 
    </div>
    <footer class="container-fluid text-center">
        <p>Powered by Leonel Barrientos</p>
    </footer>     
</body>
</html>