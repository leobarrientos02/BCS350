<?php
// Include config file
require_once "config.php";

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$fileName ="";
$ipAddress = $_SERVER['REMOTE_ADDR'];

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "<p>File is an image - " . $check["mime"] . ".</p>";
    $uploadOk = 1;
  } else {
    echo "<p>File is not an image.</p>";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "<p>Sorry, file already exists.</p>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "<p>Sorry, your file is too large.</p>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "<p>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "<p>Sorry, your file was not uploaded.</p>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
	
	
	$fileName  = $_FILES["fileToUpload"]["name"];
	
	
	
  } else {
    echo "<p>Sorry, there was an error uploading your file.</p>";
  }
}

?>


<?php
// Prepare an insert statement
$sql = "INSERT INTO products (`product_name`, `productType`, `quantity`, `price`, `description`, `picture_name` ) VALUES (?, ?, ?, ?, ?, ?)";
 
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssssss", $product_name, $productType, $quantity, $price, $description, $pictureName);
    
    // Set parameters
    $product_name = $_POST['product_name'];
    $productType = $_POST['productType'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $pictureName = $_POST['picture_name'];


    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        echo "Records inserted successfully.";
        header("location: product.php");
        
    } else{
        echo "<p>ERROR: Could not execute query: $sql. " . mysqli_error($link) . "</p>";
    }
} else{
    echo "<p>ERROR: Could not prepare query: $sql. " . mysqli_error($link) ."</p>";
}
 
// Close statement
//mysqli_stmt_close($stmt);
 
// Close connection
mysqli_close($link);


?>