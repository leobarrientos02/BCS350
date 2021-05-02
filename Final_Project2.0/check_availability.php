<?php
// Include config file
require_once "config.php";



if(!empty($_POST["emailAddress"])) {

  $sql = "SELECT * FROM customers WHERE emailAddress='" . $_POST["emailAddress"] . "'";


if ($result=mysqli_query($link,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  
  if($rowcount>0) {
      echo "<span class='status-not-available'> Eamil Address Not Available.</span>";
  }else{
      echo "<span class='status-available'> Email Address Available.</span>";
  }
	
	
	
   // Free result set
  mysqli_free_result($result);
  }


// Close connection
mysqli_close($link);

}


?>