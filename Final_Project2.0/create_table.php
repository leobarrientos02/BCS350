<?php
//Include config file
require_once "config.php";

$sql = "CREATE TABLE customers ( 
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  password VARCHAR(255) NOT NULL, 
  firstName VARCHAR(50) NOT NULL,
  lastName VARCHAR(50) NOT NULL,
  address1 VARCHAR(50) NOT NULL,
  address2 VARCHAR(50),
  cityTown VARCHAR(20) NOT NULL,
  state VARCHAR(15) NOT NULL,
  zip VARCHAR(10) NOT NULL,
  phoneNumber VARCHAR(20) NOT NULL,
  mobilePhone VARCHAR(20),  
  emailAddress VARCHAR(255) NOT NULL,
  over18 VARCHAR(10) NOT NULL,
  pictureName VARCHAR(50) NOT NULL
  );";

if ($link->query($sql) === TRUE) {
  echo "Table customers created successfully";
} else {
  echo "Error creating table: " . $link->error;
}
$link->close();
?>