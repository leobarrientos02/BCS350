<?php
//Include config file
require_once "config.php";

//sql to create table
$sql = "CREATE TABLE products ( 
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  product_name VARCHAR(50) NOT NULL,
  productType VARCHAR(20) NOT NULL,
  quantity int NOT NULL,
  price float NOT NULL,
  description VARCHAR(255) NOT NULL,  
  picture_name VARCHAR(50) NOT NULL
  );";

if ($link->query($sql) === TRUE) {
  echo "Table products created successfully";
} else {
  echo "Error creating table: " . $link->error;
}
$link->close();
?>