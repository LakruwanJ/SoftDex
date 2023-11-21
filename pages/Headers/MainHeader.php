<?php
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
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
                    $imageUrl = $imageUrl;                 
                }else{
                    $imageUrl = "../../img/user(2)";
                }  
            }
            echo '<img class="rounded-circle" width="40" height="40" src="' . $imageUrl . '" height="130px" alt="Logo Image" />';   
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
