<?php
$query = "SELECT ip_address FROM customers WHERE id=".($_SESSION["id"]);
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while($row = mysqli_fetch_array($result)){  
    if($row['ip_address'] == ""){
        echo "NULL";
    }
    else{
        echo $row['ip_address'];
    }
}   
?>