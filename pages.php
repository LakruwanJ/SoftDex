<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
// Establish a connection to the MySQL server
$conn = new mysqli('localhost', 'root', '', 'softdex');
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (empty($_GET['page'])) {
    $page = "Search.php";
} else {
    $page = $_GET['page'];
}

    if (isset($_GET['lineCount'])) {
        $lineCount = $_GET['lineCount'];
        echo "<p>Total Lines: $lineCount</p>";
    } else {
        echo "<p>No line count received.</p>";
    }
    
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>SD</title>

        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/caro.css">
        <link rel="stylesheet" href="css/Footer.css">
        <link rel="stylesheet" href="css/CardImage.css">
        <link rel="stylesheet" href="css/img-h.css">
        <link rel="stylesheet" href="css/pages.css">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
       
        
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-color fixed-top">
            <div class="container">
                <a class="navbar-brand logog" href="#"><img src="img/logo.png" alt="logo" style="height:50px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    
                    
                    <form class="d-flex align-items-center ms-auto">
                        <input class="form-control form-control ps-4 pe-4 rounded-pill glowing-border" style="font-size: 17.5px; background-color: #dddddd;" type="search" placeholder="Search Software or category" name="searchbar" />
                        &nbsp;&nbsp;
                        <button class="btn btn-primary P-2 ps-4 pe-4 rounded-pill" type="submit"><i class="fa-solid fa-magnifying-glass fa-beat-fade fa-xl"></i></button>
                    </form>
                    
                    
                    
                    
                    
                                <!-- 
                                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                        <li class="nav-but">
                                            <a class="btn btn-outline-dark glow-button button-87 " href="../Pages/login.php"><i
                                                    class="fa-solid fa-user icoon"></i>Login</a>
                                        </li>
                                    </ul>-->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
<!--                        <li class="nav-item">
                            
                            <form class="d-flex align-items-center">
                                    <i class="fa-solid fa-magnifying-glass fa-beat-fade fa-2xl" style="color: #001f8d;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    
                                    <input class="form-control form-control ps-4 pe-4 rounded-pill" style="font-size: 17.5px" type="search" placeholder="Search Software or category" name="searchbar" />
                                    <button class="btn btn-primary ps-4 pe-4 rounded-pill" type="submit"><i class="fa fa-search"></i></button>
                                    
                                    
                                    
                                    <input class="form-control form-control-lg flex-shrink-1 form-control-borderless" style="font-size: 17.5px" type="search" placeholder="Search Software or category" name="searchbar" />&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button class="btn btn-lg" style="background-color: #001f8d; color: white" type="submit">Search</button>
                                </form>
                            
                        </li>-->
                        
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><i
                                    class="fa-solid fa-house  icoon"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#"><i class="fa-solid fa-book icoon"></i>Categories</a>
                        </li>
                        <!-- <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-rectangle-history-circle-plus"></i>
                      Categories
                    </a>
                            <ul class="dropdown-menu bg-color ">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li> -->
                        <li class="nav-item ">
                            <a class="nav-link active " href="#"><i class="fa-solid fa-right-to-bracket icoon"></i>Login</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " href="#"><button class="btn btn-primary" type="button">Sign UP</button></a>
                            
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ---------------------------------------------------------------------->
        
        <div style="margin-top: 70px">
            <iframe class="aaa" src="pages/<?php echo $page; ?>" width="100%" height="1761px"></iframe>
        </div>





        <footer id="myFooter">
            <div class="container-fluid">
                <div class="row text-center">
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="#"> <img src="img/logo2.png" alt="logo" style="height:150px;"> </a>
                        <h5>Software Solution</h5>
                    </div>
                    <div class="col-12 col-sm-6 col-md-2">
                        <h5>Get started</h5>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Downloads<br /></a></li>
                            <li><a href="#">Sign Up</a></li>
                            <li><a href="#">Other Links</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-6 col-md-2">
                        <h5>Our Company</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Company Information<br /></a></li>
                            <li><a href="#">Reviews</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <h5>Support</h5>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Help Desk<br /></a></li>
                            <li><a href="#">Forums</a></li>
                            <li><a href="#">External Links</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 social-networks">
                        <div></div><a class="facebook" href="#"><i class="fa-brands fa-facebook-f fa-sm"></i></a>
                        <a class="twitter" href="#"><i class="fa-brands fa-twitter fa-sm"></i></a>
                        <a class="google" href="#"><i class="fa-brands fa-google-plus-g fa-sm"></i></a>
                        <a class="linkedin" href="#"><i class="fa-brands fa-linkedin-in fa-sm"></i></a>
                        <button class="btn btn-primary" style="margin-top: 20px;" type="button">Contact us</button>
                    </div>
                </div>
                <div class="row footer-copyright" 
                    <div class="col" style="background-color: #090b13;">
                        <p>© 2023 Copyright Text ~ Designed By Team SoftDex</p>
                    </div>
                </div>
            </div>
        </footer>

  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>