<?php
require '../Classes/Home.php';

use Classes\Home;

$home = new Home();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
    ?>



    <nav class="navbar navbar-expand-lg navbar-dark bg-color fixed-top">
        <div class="container">
            <a class="navbar-brand logog" href="../Softdex.php"><img src="../img/logo.png" alt="logo" style="height:50px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link_ active" aria-current="page" href="../Softdex.php"><i
                                class="fa-solid fa-house  icoon"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link_  " href="#"><i class="fa-solid fa-book icoon"></i>Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link_  " href="DisplayTutorials.php"><i class="fa-brands fa-leanpub icoon"></i>Tutorials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link_  " href="displaycomigsoon.php"><i class="fa-regular fa-clock icoon"></i>Comming soon</a>
                    </li>
                    <!--with login-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                            <?php
                            $imageFormats = ['png', 'jpg'];
                            $imagePath = '../img/user/' . $user . '/' . $user;

                            foreach ($imageFormats as $format) {
                                $imageUrl = $imagePath . '.' . $format;

                                if (file_exists($imageUrl)) {
                                    $imageUrl = $imageUrl;
                                } else {
                                    $imageUrl = "../../../img/user(2)";
                                }
                            }
                            echo '<img class="rounded-circle" width="40" height="40" src="' . $imageUrl . '" height="130px" alt="Logo Image" />';
                            ?>
                        </a>
                        <ul class="dropdown-menu">
                            <center><li><?php echo "Hello " . $user; ?></li></center>
                            <hr class="p-0 m-0 mt-1">
                            <li><a class="dropdown-item " href="profile.php"><i class="fas fa-user mr-2 icoon"></i>Profile</a></li>
                            <?php
                            if ($home->CheckDeveloper($user) === null) {
                                ?>
                                <li><a class="dropdown-item" href="BecomeDev.php"><i class="fa-solid fa-arrow-trend-up icoon"></i>Become a Developer</a></li>
                            <?php
                            } else {
                                
                            }
                            ?>
                            <hr class="p-0 m-0 mt-1">
                            <li><a class="dropdown-item" href="../Process/Logout.php"><i class="fa-solid fa-right-from-bracket icoon"></i>Logout</a></li>
                        </ul>
                    </li>
                <?php } else {
                    ?>
                    <!--without login-->
                    <li class="nav-item ">
                        <a class="nav-link " href="../index.php?mode=signin"><i class="fa-solid fa-right-to-bracket icoon"></i>Login</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="../index.php?mode=signup"><button class="btn btn-primary" type="button">Sign UP</button></a>

                    </li>
                    <?php
                }
                ?>


            </ul>
        </div>
    </div>
</nav>







