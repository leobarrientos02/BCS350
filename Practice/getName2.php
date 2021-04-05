<?php
$query = "SELECT last_name FROM customers WHERE id=".($_SESSION["id"]);
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while($row = mysqli_fetch_array($result)){  
    if($row['last_name'] == ""){
        echo "NULL";
    }
    else{
        echo $row['last_name'];
    }
}   
?>