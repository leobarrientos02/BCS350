<?php
// Include config file
require_once "config.php";
$emailAddress = $password  = "";
$emailAddress = mysqli_real_escape_string($link, $_POST['emailAddress']);
$password = mysqli_real_escape_string($link, $_POST['password']);

$query = "SELECT emailAddress FROM customers WHERE emailAddress='$emailAddress'";
$results = mysqli_query($link, $query);

if(mysqli_num_rows($results) <= 0){
    echo "No account found";
}
else{

    $query2 = "UPDATE customers SET password = ? WHERE emailAddress='$emailAddress'";

    if($stmt = mysqli_prepare($link, $query2)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $param_password);

    $param_password = $password;
    if(mysqli_stmt_execute($stmt)){
        // Password updated successfully. Destroy the session, and redirect to login page
        session_destroy();
        header("location: auth-signin.html");
        exit();
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close statement
    mysqli_stmt_close($stmt);
    }
}
?>