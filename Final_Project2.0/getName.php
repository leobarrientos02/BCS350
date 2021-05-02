<?php

$query = "SELECT firstName FROM customers WHERE id=".($_SESSION["id"]);
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while($row = mysqli_fetch_array($result)){  
    if($row['firstName'] == ""){
        echo "NULL";
    }
    else{
        echo $row['firstName'];
    }
}   
?>

<?php
$query = "SELECT lastName FROM customers WHERE id=".($_SESSION["id"]);
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while($row = mysqli_fetch_array($result)){  
    if($row['lastName'] == ""){
        echo "NULL";
    }
    else{
        echo $row['lastName'];
    }
}   
?>