<table>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email Address</th>
    <th>Address1</th>
    <th>Address2</th>
    <th>CityTown</th>
    <th>State</th>
    <th>Zip</th>
    <th>Phone Number</th>
  </tr>
    <tr>
        <td>
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
<p class="mb-0 text-muted"><a href="changeFname.php" class="f-w-400 text-white-50">Edit</a></p>
</td>

<td>
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
<p class="mb-0 text-muted"><a href="changeLname.php" class="f-w-400 text-white-50">Edit</a></p>
</td>

<td>
<?php
$query = "SELECT emailAddress FROM customers WHERE id=".($_SESSION["id"]);
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while($row = mysqli_fetch_array($result)){  
    if($row['emailAddress'] == ""){
        echo "NULL";
    }
    else{
        echo $row['emailAddress'];
    }
}   
?>
<p class="mb-0 text-muted"><a href="changeEmail.php" class="f-w-400 text-white-50">Edit</a></p>
</td>


<td>
<?php
$query = "SELECT address1 FROM customers WHERE id=".($_SESSION["id"]);
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while($row = mysqli_fetch_array($result)){  
    if($row['address1'] == ""){
        echo "NULL";
    }
    else{
        echo $row['address1'];
    }
}   
?>
<p class="mb-0 text-muted"><a href="changeAddress.php" class="f-w-400 text-white-50">Edit</a></p>
</td>

<td>
<?php
$query = "SELECT address2 FROM customers WHERE id=".($_SESSION["id"]);
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while($row = mysqli_fetch_array($result)){  
    if($row['address2'] == ""){
        echo "NULL";
    }
    else{
        echo $row['address2'];
    }
}   
?>
<p class="mb-0 text-muted"><a href="changeAddress2.php" class="f-w-400 text-white-50">Edit</a></p>
</td>

<td>
<?php
$query = "SELECT cityTown FROM customers WHERE id=".($_SESSION["id"]);
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while($row = mysqli_fetch_array($result)){  
    if($row['cityTown'] == ""){
        echo "NULL";
    }
    else{
        echo $row['cityTown'];
    }
}   
?>
<p class="mb-0 text-muted"><a href="changecityTown.php" class="f-w-400 text-white-50">Edit</a></p>
</td>


<td>   
<?php
$query = "SELECT state FROM customers WHERE id=".($_SESSION["id"]);
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while($row = mysqli_fetch_array($result)){  
    if($row['state'] == ""){
        echo "NULL";
    }
    else{
        echo $row['state'];
    }
}   
?>
<p class="mb-0 text-muted"><a href="changeState.php" class="f-w-400 text-white-50">Edit</a></p>
</td>


<td>
<?php
$query = "SELECT zip FROM customers WHERE id=".($_SESSION["id"]);
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while($row = mysqli_fetch_array($result)){  
    if($row['zip'] == ""){
        echo "NULL";
    }
    else{
        echo $row['zip'];
    }
}   
?>
<p class="mb-0 text-muted"><a href="changeZip.php" class="f-w-400 text-white-50">Edit</a></p>
</td>

<td>
<?php
$query = "SELECT phoneNumber FROM customers WHERE id=".($_SESSION["id"]);
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while($row = mysqli_fetch_array($result)){  
    if($row['phoneNumber'] == ""){
        echo "NULL";
    }
    else{
        echo $row['phoneNumber'];
    }
}   
?>
<p class="mb-0 text-muted"><a href="changePhone.php" class="f-w-400 text-white-50">Edit</a></p>
</td>

</tr>
</table>
<style>
table {
  border-collapse: collapse;
  border-spacing: 1;
  width: 95%;
  border: 3px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}
tr:nth-child(even) {
  background-color: grey;
}

tr:nth-child(odd) {
  background-color: lightgrey;
}
</style>