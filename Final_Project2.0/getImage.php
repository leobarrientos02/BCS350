<?php
// Include config file
require_once "config.php";

// Initialize the session
session_start();

?>
<?php
$query = "SELECT pictureName FROM customers WHERE id=".($_SESSION["id"]);
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while($row = mysqli_fetch_array($result)){  
    if($row['pictureName'] == ""){
        echo "NULL";
    }
    else{
        echo $row['pictureName'];
    }
}   
?>