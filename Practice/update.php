<?php

/* Practicing updating the database */

// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// Include config file
require_once "config.php";
$sql = "UPDATE customers SET first_name= 'leo', last_name='barrientos', email='gmail.com' WHERE id=".($_SESSION["id"]);

if (mysqli_query($link, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($link);
}

mysqli_close($link);
?>