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
    $page = "";
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



        <!DOCTYPE html>

    <button id="myButton" onclick="disableButton()">Click me</button>
    <button id="enableButton" onclick="enableButton()">Enable Button</button>

    <script>
        // Function to disable the button
        function disableButton() {
            const myButton = document.getElementById('myButton');
            myButton.disabled = true;
        }

        // Function to enable the button
        function enableButton() {
            const myButton = document.getElementById('myButton');
            myButton.disabled = false;
        }
    </script>


<?php include_once "./pages/Headers/footer.php"; ?>

  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>