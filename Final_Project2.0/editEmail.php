<?php
// Include config file
require_once "config.php";

// Initialize the session
session_start();

?>

<?php
$emailAddress = mysqli_real_escape_string($link, $_POST['emailAddress']);
$query2 = "UPDATE customers SET emailAddress = ? WHERE id=".($_SESSION["id"]);

if($stmt = mysqli_prepare($link, $query2)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_emailAddress);

$param_emailAddress = $emailAddress;
if(mysqli_stmt_execute($stmt)){
    // Password updated successfully. Destroy the session, and redirect to login page
    header("location: MyAccount.php");
    exit();
} else{
    echo "Oops! Something went wrong. Please try again later.";
}

// Close statement
mysqli_stmt_close($stmt);
}
?>