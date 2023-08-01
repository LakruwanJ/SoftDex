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

                    <!--                <form class="d-flex ms-auto" role="search">
                                        <input class="form-control me-2 bg-dark text-light glowing-border w-200 siz" type="search" placeholder="Search..." required aria-label="Search">
                                        <button class="btn btn-block btn-lg glow-button btn-dark" type="submit"><i
                                                class="fa-solid fa-magnifying-glass fa-beat fa-lg"></i></button>
                                    </form>
                                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                        <li class="nav-but">
                                            <a class="btn btn-outline-dark glow-button button-87 " href="../Pages/login.php"><i
                                                    class="fa-solid fa-user icoon"></i>Login</a>
                                        </li>
                                    </ul>-->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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

        <div style="margin-top: 70px;margin-right: 0px;margin-left: 0px;"></div>
        <!--c-->
        <section id="carousel">
            <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="bg-light border rounded border-light pulse animated hero-technology carousel-hero jumbotron py-5 px-4">


                            <div class="container">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="px-5 py-4 col-md-10 rounded" style="background-color: rgba(0, 0, 0, .4);">
                                        <h1 class="hero-title">SoftDex</h1><br>
                                        <div class="row hero-subtitle ">
                                            <div class="col-sm-6 ">
                                                <table width=100%>
                                                    <tr align = "center" class="p-0">
                                                        <td width=50% class="p-1">
                                                            <i class="fa-solid fa-user fa-2xl mb-4"></i>
                                                            <h5><a href="#" class="link-underline-light">Users</a></h5>
                                                            <hr style="width: 25%; height: 5px">
                                                            <p class="text-dark purecounter" style="font-size: 22px;" data-purecounter-start="0" data-purecounter-end="526" data-purecounter-duration="1.5">526</p>                                            
                                                        </td>
                                                        <td width=50% class="p-1">
                                                            <i class="fa-solid fa-laptop-code fa-2xl mb-4"></i>
                                                            <h5><a href="#" class="link-underline-light">Developers</a></h5>
                                                            <hr style="width: 25%; height: 5px">
                                                            <p class="text-dark purecounter" style="font-size: 22px;" data-purecounter-start="0" data-purecounter-end="238" data-purecounter-duration="1">238</p>    
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-sm-6">
                                                <table width=100%>
                                                    <tr align = "center" class="p-0">
                                                        <td width=50% class="p-1">
                                                            <i class="fa-solid fa-file-code fa-2xl mb-4"></i>
                                                            <h5><a href="#" class="link-underline-light">Softwares</a></h5>
                                                            <hr style="width: 25%; height: 5px">
                                                            <p class="text-dark purecounter" style="font-size: 22px;" data-purecounter-start="0" data-purecounter-end="1158" data-purecounter-duration="1.5">1158</p>                                            
                                                        </td>
                                                        <td width=50% class="p-1">
                                                            <i class="fa-solid fa-download fa-2xl mb-4"></i>
                                                            <h5><a href="#" class="link-underline-light">Downloads</a></h5>
                                                            <hr style="width: 25%; height: 5px">
                                                            <p class="text-dark purecounter" style="font-size: 22px;" data-purecounter-start="0" data-purecounter-end="14657" data-purecounter-duration="1.5">14657</p>   
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <script src="Incrementing-Animation-Counter.js"></script>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>




                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="bg-light border rounded border-light pulse animated hero-nature carousel-hero jumbotron py-5 px-4">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="px-5 py-4 col-md-10 rounded" style="background-color: rgba(0, 0, 0, .4);">

                                        <h1 class="hero-title">Unleash the Ultimate Downloading Experience</h1>
                                        <p class="hero-subtitle">Find, Download, and Enjoy Top Software with SoftDex.</p>
                                        <p><a class="btn btn-primary hero-button plat" role="button" href="#">Search Now</a></p>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="bg-light border rounded border-light pulse animated hero-nature carousel-hero jumbotron py-5 px-4">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="px-5 py-4 col-md-10 rounded" style="background-color: rgba(0, 0, 0, .4);">

                                        <h1 class="hero-title">Elevate Your Development Journey</h1>
                                        <p class="hero-subtitle">Upload and Share Software Projects with SoftDex!</p>
                                        <p><a class="btn btn-primary hero-button plat" role="button" href="#">Upload Now</a></p>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="bg-light border rounded border-light pulse animated hero-photography carousel-hero jumbotron py-5 px-4">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="px-5 py-4 col-md-10 rounded" style="background-color: rgba(0, 0, 0, .4)">

                                        <h1 class="hero-title">Your Vision, Customized</h1>
                                        <p class="hero-subtitle">Empower Your Software Dreams with SoftDex's Developer Services!</p>
                                        <p><a class="btn btn-primary hero-button plat" role="button" href="#">Comming soon</a></p>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></button> 
                    <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="1"></button> 
                    <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="2"></button> 
                    <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="3"></button>
                </div>
            </div>
        </section>
        <br><br>

        <main>


            <div class="container">

                <!----------------------------------------------------------- search area start ---------------------------------------------------------->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card" style="border: 0px;">
                            <div class="card-body">
                                <form class="d-flex align-items-center" action="Process_search.php" method="POST">
                                    <i class="fa-solid fa-magnifying-glass fa-beat-fade fa-2xl" style="color: #001f8d;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-control form-control-lg flex-shrink-1 form-control-borderless" style="font-size: 17.5px" type="search" placeholder="Search Software or category" name="searchbar" />&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button class="btn btn-lg" style="background-color: #001f8d; color: white" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div><br>
                <!----------------------------------------------------------- search area end ----------------------------------------------------------->



                <section id="title area">
                    <p class="small text-muted font-italic"></p>

                    <!-------------------------------------------------------- title & contenct area start ------------------------------------------------------->
                    <?php
                    $title = ["pop" => "Most Popular Softwares", "topdown" => "Top Downloads"];
                    foreach ($title as $key => $value) {
                        echo '<h4>&nbsp;' . $value . '</h4><p class="small text-muted font-italic"></p>';
                        ?>
                        <div class="card">

                            <!--------------------------------------------------------- platform tabs area start --------------------------------------------------------->
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                                    <?php
                                    $result1 = $conn->query("SELECT name FROM platforms ORDER BY priority");
                                    if ($result1->num_rows > 0) {
                                        $x = 1;
                                        while ($row = $result1->fetch_assoc()) {
                                            $val[] = $row["name"];
                                            if ($x == 1) {
                                                echo '<li class="nav-item"><a class="nav-link active" href="#' . $key . $row["name"] . '" data-bs-toggle="tab">' . $row["name"] . '</a></li>';
                                            } else {
                                                echo '<li class="nav-item"><a class="nav-link" href="#' . $key . $row["name"] . '" data-bs-toggle="tab">' . $row["name"] . '</a></li>';
                                            }
                                            $x++;
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <!---------------------------------------------------------- platform tabs area end ---------------------------------------------------------->


                            <!------------------------------------------------------------ software area start ------------------------------------------------------------>
                            <div class="card-body">
                                <div id="nav-tabContent" class="tab-content">

                                    <?php
                                    $y = 1;
                                    foreach ($val as $value2) {
                                        if ($y == 1) {
                                            echo '<div id="' . $key . $value2 . '" class="tab-pane fade show active">';
                                            $y++;
                                        } else {
                                            echo '<div id="' . $key . $value2 . '" class="tab-pane fade show">';
                                        }
                                        echo '<div class="row justify-content-center" style="margin-top: 10px;margin-right: 0px;margin-left: 0px;">';

                                        for ($i = 0; $i < 6; $i++) {
                                            echo '<div class="col-sm-6 col-md-4 col-lg-2 col-6 p-2">
                                                <div class="card rounded shadow-sm">
                                                    <div class="card-body p-2 mt-1">
                                                        <img class="img-fluid d-block mx-auto mb-3" src="img/tempicon.png" alt />
                                                        <hr>
                                                        <p class="extra-small"></p>
                                                        <table style="width: 100%">
                                                            <tr>
                                                                <td>Free</td>
                                                                <td style="text-align: right"><i class="fa fa-star text-success"></i>&nbsp;5.0</td>
                                                            </tr>
                                                        </table><p></p>
                                                        <h5><a class="text-dark" href="pages.php?page=Software.php">SW Name</a></h5>
                                                        <p class="small text-muted font-italic">by developer</p>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>';
                                        }
                                        echo '</div></div>';
                                    }
                                    ?>
                                </div>
                                <br><div class="text-center mb-2"><button class="btn btn-outline-secondary round px-5 py-1" type="button" align="right"><b>More</b></button></div>
                            </div>


                            <!------------------------------------------------------------- software area end ------------------------------------------------------------->

                        </div><br><?php } ?>
                    <!--------------------------------------------------------- title & contenct area end -------------------------------------------------------->   

                </section><br>
                <!-------------------------------------------------------- title & contenct area end -------------------------------------------------------->                  


                <!----------------------------------------------------------- software Tables start ----------------------------------------------------------->
                <section>
                    <div class="row">
                        <?php
                        $title = ["ts" => "Trending Softwares", "tg" => "Trending Games"];
                        $m = 1;
                        foreach ($title as $key => $value) {
                            if ($m == 1) {
                                echo '<div class="col-md-6 ps-5 pe-5">';
                                $m++;
                            } else {
                                echo '<div class="col-md-6 ps-5 pe-5">';
                                $m++;
                            }
                            echo '<h4>&nbsp;' . $value . '</h4><p class="small text-muted font-italic"></p><table class="table table-hover">';
                            for ($i = 0; $i < 5; $i++) {
                                echo '<tr valign="middle">
                                        <td><button class="btn" style="margin-left: 5px;" type="submit">
                                        <img class="p-0" src="img/tempicon.png" height="75px" alt /></button></td>
                                        <td>name of the software<br><i class="small text-muted font-italic">by developer</i></td>
                                        <td>free</td>
                                        <td><i class="fa fa-star text-success"></i>&nbsp;5.0</td>
                                        <td align="right"><button class="btn" style="margin-left: 5px;" type="submit"><i class="fa-solid fa-download fa-2xl"></i></button></td>
                                    </tr>';
                            }
                            echo '</table><div class="text-center mt-4 mb-2"><button class="btn btn-outline-secondary round px-5 py-1" type="button" align="right"><b>More</b></button></div></div>';
                        }
                        ?>

                    </div><br>
                </section>
                <!----------------------------------------------------------- software Tables end ----------------------------------------------------------->
            </div>


            <section>

                <div class="container">
                    <h2 class="text-center">What is SoftDex?</h2>
                    <p class="text-center titlee m-4 px-5">Your Ultimate Software Hub! Discover, upload, download diverse range of applications and create customized software. Empowering developers and fostering a vibrant tech community. Join us today for innovative software experiences!</p>
                </div>

                <div class="photo-card">
                    <div class="container">

                        <!--                        <div class="row align-items-center">
                                                    <div class="col-md-6 p-0">
                                                        <div class="photo-background-l" style="background-image: url('img/product-aeon-feature.jpg');">
                                                            
                                                            <div class="hover hover-2 text-white photo-background-l"><img src="img/product-aeon-feature.jpg" alt="">
                                  <div class="hover-overlay"></div>
                                  <div class="hover-2-content px-5 py-4">
                                    <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">Image </span>Caption</h3>
                                    <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                                  </div>
                                </div>
                                                            
                                                        </div>
                                                            
                                                    </div>
                                                    <div class="col-md-6 photo-details">
                                                        <h1>User</h1><br>
                                                        <p>Our platform offers user registration for personalized experiences and access to exclusive features. Users can manage profiles, preferences, and account settings.</p>
                                                        <div class="photo-tags">
                                                            <ul><li><a href="#" data-bs-toggle="modal" data-bs-target="#user">read more...</a></li></ul>
                                                        </div></div>
                                                </div>
                        
                                                <div class="row align-items-center">
                                                    <div class="col-md-6 photo-details">
                                                        <h1>Developer</h1><br>
                                                        <p>On our Softdex website, developers can create a profile, which typically includes information about a software developer's background, skills, experience, and projects they have worked on.</p>
                                                        <div class="photo-tags">
                                                            <ul><li><a href="#" data-bs-toggle="modal" data-bs-target="#developer">read more...</a></li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 p-0"><div class="photo-background-r" style="background-image: url('img/product-aeon-feature.jpg');"></div></div>
                                                </div>
                        
                                                <div class="row align-items-center">
                                                    <div class="col-md-6 p-0">
                                                        <div class="photo-background-l" style="background-image: url('img/product-aeon-feature.jpg');">
                                                            
                                                        </div>
                                                            
                                                    </div>
                                                    <div class="col-md-6 photo-details">
                                                        <h1>Software</h1><br>
                                                        <p>Embark on a seamless journey of discovering, downloading, and utilizing premium and free software that elevates your digital experience.</p>
                                                        <div class="photo-tags">
                                                            <ul><li><a href="#" data-bs-toggle="modal" data-bs-target="#sw">read more...</a></li></ul>
                                                        </div></div>
                                                </div>
                        
                                                <div class="row align-items-center">
                                                    <div class="col-md-6 photo-details  d-flex flex-column psd-right1">
                                                        <h1>Customized Software</h1><br>
                                                        <p>where we empower you with the unique ability to create fully customized software solutions that cater to your specific needs.</p>
                                                        <div class="photo-tags">
                                                            <ul>
                                                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#csw">read more...</a></li>
                                                            </ul>
                                                        </div></div>
                                                    <div class="col-md-6 p-0 d-flex flex-row intro-card-2"><div class="photo-background-r"><img class="howto-img photo-background-r" src="img/product-aeon-feature.jpg" width="100%" height="100%"></div></div>
                                                </div>
                                                
                                                
                        -->

                        <div class="row align-items-center">
                            <div class="hovere hover-2 text-white col-12 col-sm-6 d-flex flex-row intro-card-1 photo-background-l px-0">
                                <img class="photo-background-l" src="img/product-aeon-feature.jpg" width="100%" height="100%">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <a class="hover-2-title text-uppercase font-weight-bold mb-0" href="pages.php?page=Search.php"> <button type="button" class="btn btn-secondary" >Join</button></a>
                                    <p class="hover-2-description text-uppercase mb-0">Click here to .</p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 d-flex flex-column psd-left1 photo-details">
                                <h1>User</h1><br>
                                <p>Our platform offers user registration for personalized experiences and access to exclusive features. Users can manage profiles, preferences, and account settings.</p>
                                <div class="photo-tags">
                                    <ul><li><a href="#" data-bs-toggle="modal" data-bs-target="#user">read more...</a></li></ul>
                                </div>                            
                            </div>
                        </div>

                        <div class="row align-items-center flex-column-reverse flex-sm-row">
                            <div class="col-12 col-sm-6 d-flex flex-column psd-right1 photo-details">
                                <h1>Developer</h1><br>
                                <p>On our Softdex website, developers can create a profile, which typically includes information about a software developer's background, skills, experience, and projects they have worked on.</p>
                                <div class="photo-tags">
                                    <ul><li><a href="#" data-bs-toggle="modal" data-bs-target="#developer">read more...</a></li></ul>
                                </div>                           
                            </div>
                            <div class="hovere hover-2 text-white col-12 col-sm-6 d-flex photo-background-r px-0">
                                <img class="photo-background-r" src="img/product-aeon-feature.jpg" width="100%" height="100%">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <a class="hover-2-title text-uppercase font-weight-bold mb-0" href=""> <button type="button" class="btn btn-secondary" >Become a Developer</button></a>
                                    <p class="hover-2-description text-uppercase mb-0">Click here to .</p>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="hovere hover-2 text-white col-12 col-sm-6 d-flex flex-row intro-card-1 photo-background-l px-0">
                                <img class="photo-background-l" src="img/product-aeon-feature.jpg" width="100%" height="100%">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <a class="hover-2-title text-uppercase font-weight-bold mb-0" href=""> <button type="button" class="btn btn-secondary" >Browse</button></a>
                                    <p class="hover-2-description text-uppercase mb-0">Click here to .</p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 d-flex flex-column psd-left1 photo-details">
                                <h1>Software</h1><br>
                                <p>Embark on a seamless journey of discovering, downloading, and utilizing premium and free software that elevates your digital experience.</p>
                                <div class="photo-tags">
                                    <ul><li><a href="#" data-bs-toggle="modal" data-bs-target="#sw">read more...</a></li></ul>
                                </div>                            
                            </div>
                        </div>

                        <div class="row align-items-center flex-column-reverse flex-sm-row">
                            <div class="col-12 col-sm-6 d-flex flex-column psd-right1 photo-details">
                                <h1>Customized Software</h1><br>
                                <p>where we empower you with the unique ability to create fully customized software solutions that cater to your specific needs.</p>
                                <div class="photo-tags">
                                    <ul>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#csw">read more...</a></li>
                                    </ul>
                                </div>                            
                            </div>
                            <div class="hovere hover-2 text-white col-12 col-sm-6 d-flex photo-background-r px-0">
                                <img class="photo-background-r" src="img/product-aeon-feature.jpg" width="100%" height="100%">
                                <div class="hover-overlay"></div>
                                <div class="hover-2-content px-5 py-4">
                                    <a class="hover-2-title text-uppercase font-weight-bold mb-0" href=""> <button type="button" class="btn btn-secondary" >Create Your own Software</button></a>
                                    <p class="hover-2-description text-uppercase mb-0">Click here to .</p>
                                </div>
                            </div>
                        </div>


                        <br>    
                    </div></div>

























                <!-- Modal -->
                <div class="modal fade" id="user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
                        <div class="modal-content w-150">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Our platform offers user registration for personalized experiences and access to exclusive features. Users can manage profiles, preferences, and account settings.
                                <br><br>Personalized software recommendations are provided based on activities. Stay informed with software updates and benefit from enhanced support options. Request customized software from developers and purchase it after uploading according to requirements. 
                                <br><br>Only registered users can rate, review, and report spam for downloaded applications. Users can also rate developers who create personalized software. 
                                <br><br>Additionally, users can submit tutorials for software, which require developer approval before being added to the website. Enjoy a comprehensive software ecosystem tailored to individual needs.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="developer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
                        <div class="modal-content w-150">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Developer</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                On our Softdex website, developers can create a profile, which typically includes information about a software developer's background, skills, experience, and projects they have worked on.
                                <br><br>They can add free or premium software as well as provide updates for their software.
                                <br><br>Our web site provides a platform to create customized software according to user requests. If the user's request is accepted, the developer can chat with the user and build the system according to the user's requirements. 
                                <br><br>In addition to that, Developers can directly add a tutorial about their own software and approve a tutorial that is done by a user. 
                                <br><br>Developers can rate user activities. Which means if the client did not buy the product or was chatting with the developer without having any intention of buying a product, they should get a review from the relevant developer so that other developers can know about the client’s background.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="sw" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
                        <div class="modal-content w-150">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Software</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Embark on a seamless journey of discovering, downloading, and utilizing premium and free software that elevates your digital experience.
                                <br><br>Our platform offers a diverse and comprehensive selection of premium and free software, catering to the needs of all users. Upon registration, users gain access to a wide range of software options. 
                                <br><br>Simultaneously, free software library is equally extensive, providing high-quality tools without any cost. These free options cover various categories, from productivity to creativity, ensuring that every user can find the perfect software for their requirements.
                                <br><br>Softdex regularly updates its offerings, adding new premium and free software based on user feedback and the latest industry trends. With user ratings and reviews, making informed decisions about software choices becomes effortles.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="csw" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
                        <div class="modal-content w-150">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Customized Software</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Where we empower you with the unique ability to create fully customized software solutions that cater to your specific needs. 
                                <br><br>Our platform takes software recommendations to the next level, providing you with tailored suggestions based on your activities and preferences, ensuring you find the perfect fit for your requirements.
                                <br><br>If you can't find the software you envision,You can now request project files from all developers or choose to collaborate with specialized developers to bring your dream software to life. Once the customized software is prepared according to your requirements, you can conveniently purchase it through our secure payment gateway.
                                <br><br>Additionally, if you have experienced the creation of customized software through a developer, you can also rate the developer, helping others find the right talent for their projects.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--model end-->            





                <!--                <div class="row">
                       DEMO 2 Item
                      <div class="col-lg-6 mb-3 mb-lg-0">
                        <div class="hover hover-2 text-white rounded"><img src="https://res.cloudinary.com/mhmd/image/upload/v1570786258/hoverSet-2_lt7geh.jpg" alt="">
                          <div class="hover-overlay"></div>
                          <div class="hover-2-content px-5 py-4">
                            <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">Image </span>Caption</h3>
                            <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                          </div>
                        </div>
                      </div>
                
                       DEMO 2 Item
                      <div class="col-lg-6">
                        <div class="hover hover-2 text-white rounded"><img src="https://res.cloudinary.com/mhmd/image/upload/v1570786261/hoverSet-1_pha5qe.jpg" alt="">
                          <div class="hover-overlay"></div>
                          <div class="hover-2-content px-5 py-4">
                            <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">Image </span>Caption</h3>
                            <p class="hover-2-description text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit.</p>
                          </div>
                        </div>
                      </div>
                    </div>-->




            </section>





        </main>

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
