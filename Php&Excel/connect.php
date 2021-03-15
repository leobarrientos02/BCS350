<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if(isset($conn->server_info)){
    echo "Connected successfully <br/>";
}

if(isset($conn->server_info)){
	$conn->close();
	    echo "Connection was closed successfully <br/>";
}

?>