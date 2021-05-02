<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "LOAD DATA INFILE 'C:\xampp\htdocs\template\dist\admin\data.csv'  INTO TABLE customers FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'  LINES TERMINATED BY '\n' IGNORE 1 ROWS";



if ($conn->query($sql) === TRUE) {
  echo "Records Loaded successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>