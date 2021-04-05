<?php

$query = "SELECT first_name FROM customers WHERE id=".($_SESSION["id"]);
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while($row = mysqli_fetch_array($result)){  
    if($row['first_name'] == ""){
        echo "NULL";
    }
    else{
        echo $row['first_name'];
    }
}   
?>