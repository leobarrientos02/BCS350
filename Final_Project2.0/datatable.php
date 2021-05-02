<?php  
// Include config file
require_once "config.php";

 $query ="SELECT * FROM customers ORDER BY ID DESC";  
 $result = mysqli_query($link, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>All Customers</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">All Customers</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>First Name</td>  
                                    <td>Last Name</td>  
                                    <td>City</td>  
                                    <td>Email</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["firsName"].'</td>  
                                    <td>'.$row["lastName"].'</td>  
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
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  