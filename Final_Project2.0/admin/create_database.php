<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', '');

// Create connection
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);


// Check connection
if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error);
}

// Create database
$sql = "CREATE DATABASE " . DB_NAME;
if ($link->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $link->error;
}
$link->close();
?>


