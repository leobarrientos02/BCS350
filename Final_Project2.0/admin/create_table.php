<?php
//Include config file
require_once "config.php";

//sql to create table
$sql = "CREATE TABLE Customers ( 
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
 `first_name` varchar(15) NOT NULL,
 `last_name` varchar(15) NOT NULL,
 `gender` varchar(10) NOT NULL,
 `address1` varchar(50) NOT NULL,
 `address2` varchar(50) NULL,
 `city_town` varchar(50) NOT NULL,
 `state` varchar(50) NOT NULL,
 `zip` varchar(15) NOT NULL,  
 `phone_number` varchar(20) NOT NULL,
 `mobile_phone` varchar(20) NULL,
 `email_address` varchar(100) NOT NULL,
 `password` varchar(20) NOT NULL,
 `over18` varchar(10) NOT NULL,
 `picture_name` varchar(50) NOT NULL, 
 `ip_address` varchar(60) NULL,   
 `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP 
 );";
if ($link->query($sql) === TRUE) {
  echo "Table Customers created successfully";
} else {
  echo "Error creating table: " . $link->error;
}
$link->close();
?>