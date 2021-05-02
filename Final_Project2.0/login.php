<?php
// Include config file
require_once "config.php";

// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to home page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: home.php");
  exit;

}
 

?>


<?php
    $emailAddress = $_POST['emailAddress'];
    $password = $_POST['password'];
    echo $emailAddress ."<br>";
    echo $password ."<br>";

   $sql= "SELECT * FROM `customers` WHERE `emailAddress` = '$emailAddress'  and `password` = '$password' LIMIT 1";

    $result = $link->query($sql);
    
    if ($result->num_rows == 1) {
      
      // output data of each row
      if($row = $result->fetch_assoc()) {

        $id =$row["id"];
        $pictureName= $row["pictureName"];

        echo $pictureName;
        echo $emailAddress;
     
        // Store data in session variables
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $id;
        $_SESSION["pictureName"] = $pictureName;   
        $_SESSION["emailAddress"] = $emailAddress;                            
        
        // Redirect user to home page
        header("location: home.php");
        
      }
    } else {
      header("location: auth-signin_error.html");
      echo "0 results in our system" ."<br>";
      echo "Error Logging in" ."<br>";
          
    }
    $link->close();
    
?>