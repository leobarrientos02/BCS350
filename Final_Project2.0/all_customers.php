<?php  
// Include config file
require_once "config.php";

 $query ="SELECT * FROM customers ORDER BY ID DESC";  
 $result = mysqli_query($link, $query);  
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="DashboardKit is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords" content="DashboardKit, Dashboard Kit, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Free Bootstrap Admin Template">
    <meta name="author" content="DashboardKit ">


    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">

    <!-- font css -->
    <link rel="stylesheet" href="assets/fonts/feather.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome.css">
    <link rel="stylesheet" href="assets/fonts/material.css">



  <title>All Members</title>  

</head>

<body>
<div class="navbar">
<a href="home.php">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="assets/images/logo-new.png" alt=""width="100px" height = "80px">
</a>
<a style="font-size:25px; position:relative; right:40px; top:40px;" href="home.php">Gym Equipment</a>
  <a style="font-size:25px; position:relative; right:40px; top:40px;" href="MyAccount.php">My Account</a>
  <a style="font-size:25px; position:relative; right:40px; top:40px;" href="logout.php">Sign Out</a>
</div>
    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-lg-11">
                    <div class="card">
                        <div class="card-body">

 
                <h3 align="center">All Members</h3>  
 
                <div align="center" class="table-responsive  container-fluid ">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>First Name</td>  
                                    <td>Last Name</td>  
                                    <td>City</td>
                                    <td>State</td>  
                                    <td>Email</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["firstName"].'</td>  
                                    <td>'.$row["lastName"].'</td>
                                    <td>'.$row["state"].'</td>  
                                    <td>'.$row["cityTown"].'</td>  
                                    <td>'.$row["emailAddress"].'</td>  
                               </tr>  
                               ';  
                          }
                          
                               // Close connection
                              mysqli_close($link);
                          ?>  
                     </table>  
                
           </div>  
                              

                        </div>

                    </div>
                    <footer>
                    <div class="footer">
                        <p style="position:relative;top:40px;">Copyright © Leonel Barrientos 2021</p>
                    </div>  
                    </footer>                  

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/plugins/feather.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>


             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
             <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
             <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>              
             <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  
</body>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: lightgrey;
  width: 100%;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: lightgrey;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
  .footer {
   position: flex;
   left: 0;
   bottom: 0;
   width: 110%;
   height:100px;
   background-color: lightgrey;
   margin-top:50px;
   color: black;
   font-size:20px;
   text-align: center;
   
}  
</style>
</html>