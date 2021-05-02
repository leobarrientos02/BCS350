<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="Leonel" content="" />
        <title>Gym Equipment</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

            <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a href="home.php" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="assets/images/logo-new.png" alt="" class="logo logo-lg h-80  text-center" width="100px" height = "80px">
                </a>
                <a class="navbar-brand js-scroll-trigger" style="font-size:20px" href="home.php">Gym Equipment</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="all_customers.php">All Members</a></li> 
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="Product.php">Products</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="MyAccount.php">My Account</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="logout.php">Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="container text-center">
                    
                    <center><h1 style="font-size:40px" class="mx-auto text-uppercase">New Product</h1></center>

                    <form class="row g-3 " action="processProduct.php" name="productForm" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data">



<div class="col-md-3 text-center">
    <div class="profile-img">
        <img src="assets/images/user/empty-img.png" class="picture-src" id="uploadPreview" width="200px">

        <div class="file btn btn-primary" style="width: 80%;">
            Change Photo
            <input id="fileToUpload" name="fileToUpload"  type="file" class="upload  col-md-12" onchange="uploadPicture();" />

        </div>
    </div>
    <p style="font-size:5px" id="pictureParagraph"></p>
    <input  type="hidden" id="picture_name" name="picture_name"  />
</div>


<div class="col-md-9 border-right">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-lg-6">
            <label for="product_name" class="form-label text-white-50">Product Name</label>
            <div class="input-group">
                <span class="input-group-text"><i  class="fas fa-barcode" ></i></span>
                <input type="text" class="form-control" id="product_name" name="product_name" aria-describedby="inputGroupPrepend" placeholder="None" onkeyup="validateproduct_name()">
                <span class="input-group-text iconParent"><i class="fa fa-star" id="product_nameIcon"></i></span>
            </div>
            <div class="error" id="product_nameErr"></div>
        </div>

        <div class="col-md-4 col-sm-12 col-lg-5">
            <label for="productType" class="form-label text-white-50">Product Type</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-mobile-phone"></i></span>
                <select name="productType" id="productType" class="form-control" onchange="validateproductType()">
<option value=""></option>
<option>Quads Machine</option>
<option>Hamstring Machine</option>
<option>Biceps Machine</option>
<option>Triceps Machine</option>
<option>Lats Machine</option>
<option>Traps Machine</option>
<option>Shoulder Machine</option>
<option>Chest Fly Machine</option>
<option>Chest press Machine</option>
<option>Calves Machine</option>
<option>Barbell</option>
<option>Dumbell</option>
<option>Clips</option>
<option>Bench</option>
<option>Power Rack</option>
<option>Squat Rack</option>
<option>Bands</option>
<option>Cables</option>
<option>Cardio</option>
<option>Accessory</option>
<option>Other</option>
</select>
                <span class="input-group-text iconParent"><i  class="fa fa-star" id="productTypeIcon" ></i></span>
            </div>
            <div class="error" id="productTypeErr"></div>
        </div>

        <div class="col-md-4 col-sm-12 col-lg-6">
            <label for="price" class="form-label text-white-50">Price</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                <input type="text" class="form-control" id="price" name="price" aria-describedby="inputGroupPrepend" placeholder="0.00 ($ sign not neeeded)" onkeyup="validateprice()">
                <span class="input-group-text iconParent"><i  class="fa fa-star" id="priceIcon" ></i></span>
            </div>
            <div class="error" id="priceErr"></div>
        </div>

        <div class="col-md-4 col-sm-12 col-lg-5">
        <label for="quantity" class="form-label text-white-50">Quantity</label>
    <div class="input-group">
        <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
        <input type="text" class="form-control" id="quantity" name="quantity" aria-describedby="inputGroupPrepend" placeholder="Amount" onkeyup="validatequantity()">
        <span class="input-group-text iconParent"><i  class="fa fa-star" id="quantityIcon"  ></i></span>
    </div>
    <div class="error" id="quantityErr"></div>
        </div>


    </div>
</div>   
<hr>

<div style="position:relative; left:300px; bottom:30px;"class="col-md-6 col-lg-8">
<label for="description" class="form-label text-white-50">Description</label>
    <div class="input-group">
        <span class="input-group-text"><i class="far fa-comments"></i></span>
        <textarea class="form-control" id="description" rows="4" name="description" aria-describedby="inputGroupPrepend" placeholder="Description" onkeyup="validate_description()"></textarea>
        <span class="input-group-text iconParent"><i  class="fa fa-star" id="descriptionIcon" ></i></span>
    </div>
<div class="error" id="descriptionErr"></div>
</div>

<div style="position:relative; left:450px;"class="col-lg-12 mt-3">
    <label class="input-group text-white-50">Certify the new product &nbsp;&nbsp;</label>
    <div class="input-group">
        <label class="input group text-white-50"><input type="checkbox" value="false" id="confirm" name="confirm"> &nbsp;&nbsp;Yes.</label>
        <div class="error" id="confirmErr"></div>
    </div>
</div>
<div style="position:relative; right:10px;"class="col-lg-8 mx-auto">
                    <button type="submit" class="btn btn-block btn-primary mt-5" onclick="validateForm();">
Submit&nbsp;&nbsp; 
<i class="fa fa-paper-plane" aria-hidden="true"></i>
</button>
</form>
     
    </div>
        </header>
        <!-- About-->
        <section class="about-section text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <p></p>

                    </div>
                </div>
            </div>
        </section>                  
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2 class="text-white mb-4">Gym Equipment</h2>
                        <p class="text-white-50">
                            We have developed a website where our registered members can view all kinds
                            of gym equipments around the world. In addition, meet other gym enthusiasts
                            around the world. Don't get to excited!!!
                        </p>
                    </div>
                </div>
                <img class="img-fluid" src="assets/img/tenor.gif" alt="" />
            </div>
        </section>
        <!-- Signup-->
        <section class="signup-section" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                        <h2 class="text-white mb-5">Subscribe to receive updates!</h2>
                        <form class="form-inline d-flex">
                            <input class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" type="email" placeholder="Enter email address..." />
                            <button class="btn btn-primary mx-auto" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="contact-section bg-black">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">USA, 11561, Long Beach, New York</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50"><a href="https://www.w3schools.com/default.asp">www.w3Schools.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">+1 (516) 960-8086</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="https://twitter.com"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container">Copyright © Leonel Barrientos 2021</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
    <script>
    (function documentReady() {


        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("fa-eye-slash");
                $('#show_hide_password i').removeClass("fa-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("fa-eye-slash");
                $('#show_hide_password i').addClass("fa-eye");
            }
        });




        $("#show_hide_confirm_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_confirm_password input').attr("type") == "text") {
                $('#show_hide_confirm_password input').attr('type', 'password');
                $('#show_hide_confirm_password i').addClass("fa-eye-slash");
                $('#show_hide_confirm_password i').removeClass("fa-eye");
            } else if ($('#show_hide_confirm_password input').attr("type") == "password") {
                $('#show_hide_confirm_password input').attr('type', 'text');
                $('#show_hide_confirm_password i').removeClass("fa-eye-slash");
                $('#show_hide_confirm_password i').addClass("fa-eye");
            }
        });





    })();
</script>
<script>
    // Defining a function to display error message
    function printError(elemId, hintMsg) {
        document.getElementById(elemId).innerHTML = hintMsg;
    }

    // Retrieving the values of form elements 
    var product_name = document.productForm.product_name;
    var productType = document.productForm.productType;
    var price = document.productForm.price;
    var quantity = document.productForm.quantity;
    var description = document.productForm.description;
    var confirm = document.productForm.confirm;
    var picture_name = document.getElementById("picture_name");

    // Defining error variables with a default value
    var  product_nameErr = productTypeErr = priceErr = quantityErr = descriptionErr = confirmErr = true;

    function valid(el, iconID) {
        el.style.border = "1px solid green";
        var elIcon = document.getElementById(iconID);
        elIcon.parentNode.style.border = "1px solid green";
        elIcon.style.color = "green";
        elIcon.classList.remove("fa-star");
        elIcon.classList.remove("fa-exclamation-triangle");
        elIcon.classList.add("fa-check");
    }

    function inValid(el, iconID) {
        el.style.border = "1px solid red";
        var elIcon = document.getElementById(iconID);
        elIcon.parentNode.style.border = "1px solid red";
        elIcon.style.color = "red";
        elIcon.classList.remove("fa-star");
        elIcon.classList.remove("fa-check");
        elIcon.classList.add("fa-exclamation-triangle");
    }

    // Validate product name
    function validateproduct_name() {

        if (product_name.value == "") {
            printError("product_nameErr", "Please enter the product name");
            inValid(product_name, "product_nameIcon");

        } else {
            printError("product_nameErr", "");
            product_nameErr = false;
            valid(product_name, "product_nameIcon");
       }
    }

    function validateproductType() {

        if (productType.value == "") {
            printError("productTypeErr", "Please choose product type");
            inValid(productType, "productTypeIcon");

        } else {
            printError("productTypeErr", "");
            productTypeErr = false;
            valid(productType, "productTypeIcon");
       }
    }

    function validateprice() {
        if (price.value == "") {
            printError("priceErr", "Please enter a price");
            inValid(price, "priceIcon");
        } else {
            var regex = /^[0-9]*(\.[0-9][0-9])?$/;               
            if (regex.test(price.value) === false) {
                printError("priceErr", "Please enter a valid price");
                inValid(zip, "priceIcon");
            } else {
                printError("priceErr", "");
                priceErr = false;
                valid(price, "priceIcon");
            }
        }
    }
    
    function validatequantity(){
        if (quantity.value == "") {
            printError("quantityErr", "Please enter a quantity.");
            inValid(quantity, "quantityIcon");

        } else {
            printError("quantityErr", "");
            quantityErr = false;
            valid(quantity, "quantityIcon");
       }
    
    }

    function validate_description(){

        if (description.value == "") {
            printError("descriptionErr", "Please enter a description");
            inValid(description, "descriptionIcon");

        } else {
            printError("descriptionErr", "");
            descriptionErr = false;
            valid(description, "descriptionIcon");
        }

}
       


    // Defining a function to validate form 
    function validateForm() {
        validateproduct_name();
        validateproductType();
        validateprice();
        validatequantity();
        validate_description();

        if (!confirm.checked) {
            printError("confirmErr", "You must certify the new product.");
            return false;
        } else {
            confirm.value ="true";
            printError("confirmErr", "");
            confirmErr = false;
        }


        // Prevent the form from being submitted if there are any errors
        if (( descriptionErr || productTypeErr || priceErr || quantityErr || descriptionErr || confirmErr) == true) {
            return false;
        } else {
            return true;
        }

    };
</script>




<style>
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px;
    }
    
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
    
    .error {
        color: red;
        font-size: 90%;
    }
    
    input[type="submit"]:hover {
        background: #0165b6;
    }
    
    input[type=text],
    input[type=password],
    select {
        border-right: 0 !important;
    }
    
    .iconParent {
        background-color: white;
        border-left: 0 !important;
    }
</style>
<style>
    .emp-profile {
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }
    
    .profile-img {
        text-align: center;
    }
    
    .profile-img img {
        width: 70%;
        height: 100%;
    }
    
    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }
    
    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }
    
    .profile-head h5 {
        color: #333;
    }
    
    .profile-head h6 {
        color: #0062cc;
    }
    
    .profile-edit-btn {
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }
</style>
<script type="text/javascript">
    function uploadPicture() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("fileToUpload").files[0]);

        oFReader.onload = function(oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;

            document.getElementById("picture_name").value = document.getElementById("fileToUpload").files[0].name;
            document.getElementById("pictureParagraph").innerHTML = document.getElementById("fileToUpload").files[0].name;
        };
    };
</script>
</html>