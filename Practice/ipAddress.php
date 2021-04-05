<?php 

    // function to get the user's ip address. Found help through a website
    // Credit: https://www.javatpoint.com/how-to-get-the-ip-address-in-php#:~:text=The%20simplest%20way%20to%20collect,is%20currently%20viewing%20the%20webpage.
    
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
    //whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
$ip = getIPAddress();  
echo 'IP Address is '.$ip; 

// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// Include config file
require_once "config.php";

// Update the customers database with the user's ip address
$sql = "UPDATE customers SET ip_address='". $ip . "' WHERE id=".($_SESSION["id"]);

if (mysqli_query($link, $sql)) {
  echo "";
} else {
  echo "Error updating record: " . mysqli_error($link);
}

?> 