<?php

$query = "SELECT username FROM customers WHERE id=".($_SESSION["id"]);
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while($row = mysqli_fetch_array($result)){  
    if($row['username'] == ""){
        echo "NULL";
    }
    else{
        echo $row['username'];
    }
}   
?>