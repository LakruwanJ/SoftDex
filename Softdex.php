<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require './Classes/Home.php';

use Classes\DbConnector;
use Classes\Home;

$dbcon = new DbConnector();
$home = new Home();

session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}

$rsCls = new Home();
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
        <!----------------------------------------------------------- nav bar start ---------------------------------------------------------->
        <nav class="navbar navbar-expand-lg navbar-dark bg-color fixed-top">
            <div class="container">
                <a class="navbar-brand logog" href="#"><img src="img/logo.png" alt="logo" style="height:50px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-link_ active" aria-current="page" href="#"><i
                                    class="fa-solid fa-house  icoon"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link_  " href="#"><i class="fa-solid fa-book icoon"></i>Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link_  " href="#"><i class="fa-regular fa-clock icoon"></i>Comming soon</a>
                        </li>

                        <?php
                        if (isset($_SESSION["user"])) {
                            ?>
                            <!--with login-->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    
                                    <?php
                                    $imageFormats = ['png', 'jpg'];
                                    $imagePath = 'img/user/' . $user . '/' . $user;

                                    foreach ($imageFormats as $format) {
                                        $imageUrl = $imagePath . '.' . $format;

                                        if (file_exists($imageUrl)) {
                                            echo '<img class="rounded-circle" width="40" height="40" src="' . $imageUrl . '" height="130px" alt="Logo Image" />';
                                            break;
                                        }
                                    }
                                    ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <center><li><?php echo "Hello " . $user; ?></li></center>
                                    <hr class="p-0 m-0 mt-1">
                                    <li><a class="dropdown-item " href="pages/profile.php"><i class="fas fa-user mr-2 icoon"></i>Profile</a></li>
                                    <?php
                                    if ($home->CheckDeveloper($user) === null) {
                                        ?>
                                        <li><a class="dropdown-item" href="pages/BecomeDev.php"><i class="fa-solid fa-arrow-trend-up icoon"></i>Become a Developer</a></li>
                                    <?php }
                                    ?>
                                    <hr class="p-0 m-0 mt-1">
                                    <li><a class="dropdown-item" href="Process/Logout.php"><i class="fa-solid fa-right-from-bracket icoon"></i>Logout</a></li>
                                </ul>
                            </li>
                        <?php } else {
                            ?>
                            <!--without login-->
                            <li class="nav-item ">
                                <a class="nav-link " href="index.php?mode=signin"><i class="fa-solid fa-right-to-bracket icoon"></i>Login</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="index.php?mode=signup"><button class="btn btn-primary" type="button">Sign UP</button></a>

                            </li>
                            <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </nav>
        <!------------------------------------------------------------ nav bar end ----------------------------------------------------------->

        <div style="margin-top: 70px;margin-right: 0px;margin-left: 0px;"></div>
        <!----------------------------------------------------------- carousel start ---------------------------------------------------------->
        <section id="carousel">
            <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="bg-light border rounded border-light pulse animated hero-technology carousel-hero jumbotron py-5 px-4">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="px-5 py-2 col-md-10 rounded" style="background-color: rgba(0, 0, 0, .4);">
                                        <h2>SoftDex</h2><br>
                                        <div class="row hero-subtitle ">
                                            <div class="col-sm-6 ">                                                
                                                <table width=100%>
                                                    <tr align = "center" class="p-0">
                                                        <td width=50% class="p-1">
                                                            <i class="fa-solid fa-user fa-2xl mb-4"></i>
                                                            <h5>Users</h5>
                                                            <hr style="width: 25%; height: 5px; background: blue;">
                                                            <p class="purecounter" style="font-size: 22px;" data-purecounter-start="0" data-purecounter-end="<?php $home->countUser(); ?>" data-purecounter-duration="2">
                                                                <?php $home->countUser(); ?>
                                                            </p>                                            
                                                        </td>
                                                        <td width=50% class="p-1">
                                                            <i class="fa-solid fa-laptop-code fa-2xl mb-4"></i>
                                                            <h5>Developers</h5>
                                                            <hr style="width: 25%; height: 5px; background: blue;">
                                                            <p class="purecounter" style="font-size: 22px;" data-purecounter-start="0" data-purecounter-end="<?php $home->countDev(); ?>" data-purecounter-duration="2">
                                                                <?php $home->countDev(); ?>
                                                            </p>    
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-sm-6">
                                                <table width=100%>
                                                    <tr align = "center" class="p-0">
                                                        <td width=50% class="p-1">
                                                            <i class="fa-solid fa-file-code fa-2xl mb-4"></i>
                                                            <h5>Softwares</h5>
                                                            <hr style="width: 25%; height: 5px; background: blue;">
                                                            <p class="purecounter" style="font-size: 22px;" data-purecounter-start="0" data-purecounter-end="<?php $home->countSw(); ?>" data-purecounter-duration="2">
                                                                <?php $home->countSw(); ?>
                                                            </p>                                            
                                                        </td>
                                                        <td width=50% class="p-1">
                                                            <i class="fa-solid fa-download fa-2xl mb-4"></i>
                                                            <h5>Downloads</h5>
                                                            <hr style="width: 25%; height: 5px; background: blue;">

                                                            <p class="purecounter" style="font-size: 22px;" data-purecounter-start="0" data-purecounter-end="<?php $home->countDown(); ?>" data-purecounter-duration="2">
                                                                <?php $home->countDown(); ?>
                                                            </p>   
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <script src="js/Counter.js"></script>
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
        <!------------------------------------------------------------ carousel end ----------------------------------------------------------->


        <main>
            <div class="container">

                <!----------------------------------------------------- search area start ----------------------------------------------------->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card" style="border: 0px;">
                            <div class="card-body">
                                <form class="d-flex align-items-center" action="pages/Search.php" method="POST">
                                    <i class="fa-solid fa-magnifying-glass fa-beat-fade fa-2xl" style="color: #001f8d;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-control form-control-lg flex-shrink-1 form-control-borderless" style="font-size: 17.5px" type="search" placeholder="Search Software or category" name="searchbar" />&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button class="btn btn-lg" style="background-color: #001f8d; color: white" type="submit">Search</button>
                                    &nbsp;&nbsp;&nbsp;
                                    
                                    <?php
                        if (isset($_SESSION["user"])) {
                            ?>
                            <!--with login-->
                            <span class="position-relative">
                                        <a href="pages/cart_process.php">
                                            <i class="fa-solid fa-cart-shopping fa-2xl icoon" style="color: #223f72;"></i>
                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                1<?php // add here                                ?>
                                            </span>
                                        </a>                                            
                                    </span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<h3>|</h3>&nbsp;
                                    <a href="pages/wishlist_process.php">
                                        <i class="fa-regular fa-heart fa-2xl icoon" style="color: #223f72;"></i>
                                    </a>
                        <?php } else {
                            ?>
                            <!--without login-->

                            <?php
                        }
                        ?>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div><br>
                <!------------------------------------------------------ search area end ------------------------------------------------------>

                <!---------------------------------------------- title & contenct area start ---------------------------------------------->
                <section id="title area">
                    <p class="small text-muted font-italic"></p>

                    <!---------------------------------------------- title & contenct area start ---------------------------------------------->

                    <?php
                    $title = ["pop" => "Most Popular Softwares", "topdown" => "Top Downloads"];
                    foreach ($title as $key => $value) {
                        echo '<h4>&nbsp;' . $value . '</h4><p class="small text-muted font-italic"></p>';
                        ?>
                        <div class="card">

                            <!---------------------------------------------- platform tabs start ---------------------------------------------->
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                                    <?php
                                    $result1 = $home->selectPlat();

                                    //$result1 = $rsCls->selectPlat();

                                    $x = 1;
                                    foreach ($result1 as $plat) {
                                        if ($x == 1) {
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#<?php echo $key . $plat->name; ?> " data-bs-toggle="tab"><?php echo $plat->name; ?> </a>
                                            </li>
                                        <?php } else { ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#<?php echo $key . $plat->name; ?>" data-bs-toggle="tab"><?php echo $plat->name; ?></a>
                                            </li>
                                            <?php
                                        }
                                        $x++;
                                    }
                                    ?>
                                </ul>
                            </div>
                            <!----------------------------------------------- platform tabs end ----------------------------------------------->

                            <!------------------------------------------------------------ software area start ------------------------------------------------------------>
                            <div class="card-body">
                                <div id="nav-tabContent" class="tab-content">
                                    <?php
                                    $result2 = $home->selectPlat();
                                    $x = 1;
                                    foreach ($result1 as $plat) {
                                        if ($key == "pop") {
                                            $result3 = $home->selectPlatSwM($plat->name);
                                        } else {
                                            $result3 = $home->selectPlatSwT($plat->name);
                                        }

//                                     $result2 = $rsCls->selectPlat();
//                                         $x = 1;
//                                     foreach ($result1 as $plat) {
//                                         $result3 = $rsCls->selectPlatSw($plat->name);

                                        if ($x == 1) {
                                            ?>
                                            <div id="<?php echo $key . $plat->name; ?>" class="tab-pane fade show active">
                                                <?php
                                                $x++;
                                            } else {
                                                ?>
                                                <div id="<?php echo $key . $plat->name; ?>" class="tab-pane fade show">     
                                                <?php }
                                                ?>                                                                                                       
                                                <div class="row justify-content-center m-0 mt-3" >
                                                    <?php
                                                    //print software card
                                                    foreach ($result3 as $sw) {
                                                        ?>
                                                        <div class="col-sm-6 col-md-4 col-lg-2 p-2">
                                                            <div class="card rounded shadow-sm">
                                                                <div class="card-body p-2 mt-1">
                                                                    <?php
                                                                    $imageFormats = ['png', 'jpg'];
                                                                    $imagePath = 'img/sw/' . $sw->Sid . '/logo';

                                                                    foreach ($imageFormats as $format) {
                                                                        $imageUrl = $imagePath . '.' . $format;

                                                                        if (file_exists($imageUrl)) {
                                                                            echo '<img class="d-block mx-auto mb-3 mt-3" src="' . $imageUrl . '" height="120px" alt="Logo Image" />';
                                                                            break;
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <hr>
                                                                    <p class="extra-small"></p>
                                                                    <table style="width: 100%">
                                                                        <tr>
                                                                            <td><?php echo $sw->license; ?></td>
                                                                            <td style="text-align: right"><i class="fa fa-star text-success"></i>&nbsp;<?php echo $sw->rate; ?></td>
                                                                        </tr>
                                                                    </table><p></p>
                                                                    <h5><a class="text-dark" href="pages/Software.php?id=<?php echo $sw->Sid; ?>"><?php echo $sw->name; ?></a></h5>
                                                                    <p class="small text-muted font-italic">by <?php echo $sw->username; ?></p>

                                                                                    <!--                                                                     <h5><a class="text-dark" href="pages.php?page=Software.php&id="><?php echo $sw->name; ?></a></h5>
                                                                                                                                                        <p class="small text-muted font-italic"><?php echo $sw->username; ?></p> -->
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <br><div class="text-center mb-2"><button class="btn btn-outline-secondary round px-5 py-1" type="button" align="right"><b>More</b></button></div>
                                            </div><!--Remove one Div need only 1-->

                                        <?php } ?></div></div>
                                <!------------------------------------------------------------- software area end ------------------------------------------------------------->

                            </div><br>

                            <!--------------------------------------------------------- title & contenct area end -------------------------------------------------------->   
                        <?php } ?>
                        </section><br>             


                        <!----------------------------------------------------------- software Tables start ----------------------------------------------------------->
                        <section>
                            <div class="row">

                                <div class="col-md-6 ps-5 pe-5">
                                    <h4>&nbsp;Trending Softwares</h4>
                                    <table class="table table-hover">
                                        <?php
                                        $result4 = $home->selectTrendS();
                                        foreach ($result4 as $sw) {
                                            ?>
                                            <tr valign="middle">
                                                <!--<a href="#"></a>-->
                                                <td><button class="btn" style="margin-left: 5px;" type="submit"> 
                                                        <?php
                                                        $imageFormats = ['png', 'jpg'];
                                                        $imagePath = 'img/sw/' . $sw->Sid . '/logo';

                                                        foreach ($imageFormats as $format) {
                                                            $imageUrl = $imagePath . '.' . $format;

                                                            if (file_exists($imageUrl)) {
                                                                echo '<img class="d-block mx-auto mb-1 mt-1" src="' . $imageUrl . '" height="75px" alt="Logo Image" />';
                                                                break;
                                                            }
                                                        }
                                                        ?>
                                                    </button></td>
                                                <td><?php echo $sw->name; ?><br><i class="small text-muted font-italic">by <?php echo $sw->username; ?></i></td>
                                                <td><?php echo $sw->license; ?></td>
                                                <td><i class="fa fa-star text-success"></i>&nbsp;<?php echo $sw->rate; ?></td>
                                                <td align="right"><button class="btn" style="margin-left: 5px;" type="submit"><i class="fa-solid fa-download fa-2xl"></i></button></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>

                                <div class="col-md-6 ps-5 pe-5">                                    
                                    <h4>&nbsp;Trending Games</h4>
                                    <table class="table table-hover">
                                        <?php
                                        $result4 = $home->selectTrendG();
                                        foreach ($result4 as $sw) {
                                            ?>
                                            <tr valign="middle">
                                                <!--<a href="#"></a>-->
                                                <td><button class="btn" style="margin-left: 5px;" type="submit">
                                                        <?php
                                                        $imageFormats = ['png', 'jpg'];
                                                        $imagePath = 'img/sw/' . $sw->Sid . '/logo';

                                                        foreach ($imageFormats as $format) {
                                                            $imageUrl = $imagePath . '.' . $format;

                                                            if (file_exists($imageUrl)) {
                                                                echo '<img class="d-block mx-auto mb-1 mt-1" src="' . $imageUrl . '" height="75px" alt="Logo Image" />';
                                                                break;
                                                            }
                                                        }
                                                        ?>
                                                    </button></td>
                                                <td><?php echo $sw->name; ?><br><i class="small text-muted font-italic">by <?php echo $sw->username; ?></i></td>
                                                <td><?php echo $sw->license; ?></td>
                                                <td><i class="fa fa-star text-success"></i>&nbsp;<?php echo $sw->rate; ?></td>
                                                <td align="right"><button class="btn" style="margin-left: 5px;" type="submit"><i class="fa-solid fa-download fa-2xl"></i></button></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div><br>
                        </section>
                        <!----------------------------------------------------------- software Tables end ----------------------------------------------------------->
                    </div>



                    <section>
                        <div class="photo-card">
                            <div class="container">

                                <br>
                                <h2 class="text-center text-white">What is SoftDex?</h2>
                                <p class="text-center titlee m-4 px-5 text-white">Your Ultimate Software Hub! Discover, upload, download diverse range of applications and create customized software. Empowering developers and fostering a vibrant tech community. Join us today for innovative software experiences!</p>

                                <div class="row align-items-center">
                                    <div class="hovere hover-2 text-white col-12 col-sm-6 d-flex flex-row intro-card-1 photo-background-l px-0">
                                        <img class="photo-background-l" src="img/home/user.webp" width="100%" height="100%">

<!--                     <section>

                        <div class="container">
                            <h2 class="text-center">What is SoftDex?</h2>
                            <p class="text-center titlee m-4 px-5">Your Ultimate Software Hub! Discover, upload, download diverse range of applications and create customized software. Empowering developers and fostering a vibrant tech community. Join us today for innovative software experiences!</p>
                        </div>

                        <div class="photo-card">
                            <div class="container">

                                        <!--                        <div class="row align-items-center">
                                                                    <div class="col-md-6 p-0">
                                                                        <div class="photo-background-l" style="background-image: url('img/product-aeon-feature.jpg');
                                                ">
                                                                            
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
                
                                                <div class = "row align-items-center">
                                                <div class = "col-md-6 photo-details">
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

                                        <!--                                <div class="row align-items-center">
                                                                            <div class="hovere hover-2 text-white col-12 col-sm-6 d-flex flex-row intro-card-1 photo-background-l px-0">
                                                                                <img class="photo-background-l" src="img/product-aeon-feature.jpg" width="100%" height="100%"> -->

                                        <div class="hover-overlay"></div>
                                        <div class="hover-2-content px-5 py-4">
                                            <a class="hover-2-title text-uppercase font-weight-bold mb-0" href="index.php?mode=signup"> <button type="button" class="btn btn-secondary" >Join Now</button></a>
                                            <p class="hover-2-description text-uppercase mb-0">Collaborate with SoftDex by joining forces </p>
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
                                        <div class = "photo-tags">
                                            <ul><li><a href = "#" data-bs-toggle = "modal" data-bs-target = "#developer">read more...</a></li></ul>
                                        </div>
                                    </div>
                                    <div class = "hovere hover-2 text-white col-12 col-sm-6 d-flex photo-background-r px-0">
                                        <img class = "photo-background-r" src = "img/home/dev.jpg" width = "100%" height = "100%">
                                        <div class = "hover-overlay"></div>
                                        <div class = "hover-2-content px-5 py-4">
                                            <a class = "hover-2-title text-uppercase font-weight-bold mb-0" href = "pages/BecomeDev.php"> <button type = "button" class = "btn btn-secondary" >Become a developer</button></a>
                                            <p class = "hover-2-description text-uppercase mb-0">Become a developer at SoftDex by joining our team</p>
                                        </div>
                                    </div>
                                </div>

                                <div class = "row align-items-center">
                                    <div class = "hovere hover-2 text-white col-12 col-sm-6 d-flex flex-row intro-card-1 photo-background-l px-0">
                                        <img class = "photo-background-l" src = "img/home/sw.png" width = "100%" height = "100%">
                                        <div class = "hover-overlay"></div>
                                        <div class = "hover-2-content px-5 py-4">
                                            <a class = "hover-2-title text-uppercase font-weight-bold mb-0" href = "pages/Search.php"> <button type = "button" class = "btn btn-secondary" >Browse</button></a>
                                            <p class = "hover-2-description text-uppercase mb-0">Embark on a software exploration journey with SoftDex</p>
                                        </div>
                                    </div>
                                    <div class = "col-12 col-sm-6 d-flex flex-column psd-left1 photo-details">
                                        <h1>Software</h1><br>
                                        <p>Embark on a seamless journey of discovering, downloading, and utilizing premium and free software that elevates your digital experience.</p>
                                        <div class = "photo-tags">
                                            <ul><li><a href = "#" data-bs-toggle = "modal" data-bs-target = "#sw">read more...</a></li></ul>



                                        </div>
                                    </div>
                                </div>


                                <div class = "row align-items-center flex-column-reverse flex-sm-row">
                                    <div class = "col-12 col-sm-6 d-flex flex-column psd-right1 photo-details">
                                        <h1>Customized Software</h1><br>
                                        <p>where we empower you with the unique ability to create fully customized software solutions that cater to your specific needs.</p>
                                        <div class = "photo-tags">
                                            <ul>
                                                <li><a href = "#" data-bs-toggle = "modal" data-bs-target = "#csw">read more...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class = "hovere hover-2 text-white col-12 col-sm-6 d-flex photo-background-r px-0">
                                        <img class = "photo-background-r" src = "img/home/csw.png" width = "100%" height = "100%">
                                        <div class = "hover-overlay"></div>
                                        <div class = "hover-2-content px-5 py-4">
                                            <a class = "hover-2-title text-uppercase font-weight-bold mb-0" href = ""> <button type = "button" class = "btn btn-secondary" >Create Your own Software</button></a>
                                            <p class = "hover-2-description text-uppercase mb-0">Craft tailored software solutions with the expertise of SoftDex</p>
                                        </div>
                                    </div>
                                </div>



                                <br>
                            </div></div>

                        <!--Modal -->
                        <div class = "modal fade" id = "user" data-bs-backdrop = "static" data-bs-keyboard = "false" tabindex = "-1" aria-hidden = "true">
                            <div class = "modal-dialog modal-dialog-centered modal-dialog-scrollable" >
                                <div class = "modal-content w-150">
                                    <div class = "modal-header">
                                        <h1 class = "modal-title fs-5" id = "staticBackdropLabel">User</h1>
                                        <button type = "button" class = "btn-close" data-bs-dismiss = "modal" aria-label = "Close"></button>
                                    </div>
                                    <div class = "modal-body">
                                        Our platform offers user registration for personalized experiences and access to exclusive features. Users can manage profiles, preferences, and account settings.
                                        <br><br>Personalized software recommendations are provided based on activities. Stay informed with software updates and benefit from enhanced support options. Request customized software from developers and purchase it after uploading according to requirements.
                                        <br><br>Only registered users can rate, review, and report spam for downloaded applications. Users can also rate developers who create personalized software.
                                        <br><br>Additionally, users can submit tutorials for software, which require developer approval before being added to the website. Enjoy a comprehensive software ecosystem tailored to individual needs.
                                    </div>
                                    <div class = "modal-footer">
                                        <button type = "button" class = "btn btn-secondary" data-bs-dismiss = "modal">Understood</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "modal fade" id = "developer" data-bs-backdrop = "static" data-bs-keyboard = "false" tabindex = "-1" aria-hidden = "true">
                            <div class = "modal-dialog modal-dialog-centered modal-dialog-scrollable" >
                                <div class = "modal-content w-150">
                                    <div class = "modal-header">
                                        <h1 class = "modal-title fs-5" id = "staticBackdropLabel">Developer</h1>
                                        <button type = "button" class = "btn-close" data-bs-dismiss = "modal" aria-label = "Close"></button>
                                    </div>
                                    <div class = "modal-body">
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
                                        <br><br>If you can't find the software you envision, You can now request project files from all developers or choose to collaborate with specialized developers to bring your dream software to life. Once the customized software is prepared according to your requirements, you can conveniently purchase it through our secure payment gateway.
                                        <br><br>Additionally, if you have experienced the creation of customized software through a developer, you can also rate the developer, helping others find the right talent for their projects.
                                    </div>
                                    <div class = "modal-footer">
                                        <button type = "button" class = "btn btn-secondary" data-bs-dismiss = "modal">Understood</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--model end-->

                    </section>
                    </main>

        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity = "sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin = "anonymous"></script>

                    <footer id = "myFooter">
                        <div class = "container-fluid">
                            <div class = "row text-center">
                                <div class = "col-12 col-sm-6 col-md-3">
                                    <a href = "#"> <img src = "img/logo2.png" alt = "logo" style = "height:150px;"> </a>
                                    <h5>Software Solution</h5>
                                </div>
                                <div class = "col-12 col-sm-6 col-md-2">
                                    <h5>Get started</h5>
                                    <ul>
                                        <li><a href = "#">Home</a></li>
                                        <li><a href = "#">Downloads<br /></a></li>
                                        <li><a href = "#">Sign Up</a></li>
                                        <li><a href = "#">Other Links</a></li>
                                    </ul>
                                </div>
                                <div class = "col-12 col-sm-6 col-md-2">
                                    <h5>Our Company</h5>
                                    <ul>
                                        <li><a href = "#">About Us</a></li>
                                        <li><a href = "#">Company Information<br /></a></li>
                                        <li><a href = "#">Reviews</a></li>
                                        <li><a href = "#">Contacts</a></li>
                                    </ul>
                                </div>
                                <div class = "col-sm-6 col-md-2">
                                    <h5>Support</h5>
                                    <ul>
                                        <li><a href = "#">FAQ</a></li>
                                        <li><a href = "#">Help Desk<br /></a></li>
                                        <li><a href = "#">Forums</a></li>
                                        <li><a href = "#">External Links</a></li>
                                    </ul>
                                </div>
                                <div class = "col-md-3 social-networks">
                                    <div></div><a class = "facebook" href = "#"><i class = "fa-brands fa-facebook-f fa-sm"></i></a>
                                    <a class = "twitter" href = "#"><i class = "fa-brands fa-twitter fa-sm"></i></a>
                                    <a class = "google" href = "#"><i class = "fa-brands fa-google-plus-g fa-sm"></i></a>
                                    <a class = "linkedin" href = "#"><i class = "fa-brands fa-linkedin-in fa-sm"></i></a>
                                    <button class = "btn btn-primary" style = "margin-top: 20px;" type = "button">Contact us</button>
                                </div>
                            </div>
                            <div class = "row footer-copyright"
                                 <div class = "col" style = "background-color: #090b13;">
                                    <p>© 2023 Copyright Text ~ Designed By Team SoftDex</p>
                                </div>
                            </div>
                        </div>
                    </footer>

                    </body>
                    </html>
