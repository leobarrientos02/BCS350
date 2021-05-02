<?php
// Include config file
require_once "config.php";

// Initialize the session
session_start();

?>

<?php
$cityTown = mysqli_real_escape_string($link, $_POST['cityTown']);
$query4 = "UPDATE customers SET cityTown = ? WHERE id=".($_SESSION["id"]);

if($stmt = mysqli_prepare($link, $query4)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_cityTown);

$param_cityTown = $cityTown;
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