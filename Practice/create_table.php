<?php
//Include config file
require_once "config.php";

//sql to create table
$sql = "CREATE TABLE customers ( 
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  username VARCHAR(50) NOT NULL UNIQUE, 
  password VARCHAR(255) NOT NULL, 
  firstname VARCHAR(50) NOT NULL,
  lastname VARCHAR(50) NOT NULL,
  email VARCHAR(255) NOT NULL,
  gender VARCHAR(50),
  ipAddress VARCHAR(50),
  picture VARCHAR(50)
  );";

if ($link->query($sql) === TRUE) {
  echo "Table customers created successfully";
} else {
  echo "Error creating table: " . $link->error;
}
$link->close();
?>