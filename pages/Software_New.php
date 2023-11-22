<?php
session_start();
require_once '../Classes/Select.php';
require_once '../Classes/CartNew.php';
require_once '../Classes/WishListNew.php';

use Classes\CartNew;
use Classes\WishListNew;
use Classes\Select;

$username = "";
if (isset($_SESSION["user"])) {
    $username = $_SESSION["user"];
}

$rs = new Classes\Select();
//create cart object
$cartObj = new Classes\CartNew();
//create wishlist object
$wishListObj = new Classes\WishListNew();

// define variabele
$name = "";
$version = "";
$shortdescription = "";
$platform = "";
$developer = "";
$license = "";
$amount = "";
$date = "";
$size = "";
$language = "";
$category = "";
$tags = "";
$systemreq = "";
$description = "";
$rate = "";
$DownCount = "";
$dname = "";
$ddate = "";

//set user and id
$user = $id = $sw = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $user = $_SESSION["user"];
}




$rs1 = $rs->selectSw($id);
foreach ($rs1 as $sw) {
    $name = $sw->name;
    $version = $sw->version;
    $shortdescription = $sw->shortdescription;
    $platform = $sw->platform;
    $developer = $sw->developer;
    $license = $sw->license;
    $amount = $sw->amount;
    $date = $sw->date;
    $size = $sw->size;
    $language = $sw->language;
    $category = $sw->category;
    $tags = $sw->tags;
    $systemreq = $sw->systemreq;
    $description = $sw->description;
    $rate = $sw->rate;
    $DownCount = $sw->DownCount;
}

$rs2 = $rs->selectDev($developer);
foreach ($rs2 as $dev) {
    $dname = $dev->username;
    $ddate = $dev->datesince;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    /* ------------------- Add to cart ------------------------------------------------------------- */
    if (isset($_POST['addtocart'])) {
        $set_user = $_POST['user'];
        $set_id = $_POST['softId'];
        $cartObj->setUser($set_user);
        $cartObj->setSoftwareid($set_id);
        $text = $cartObj->getCartItems();

        //add item
        if (empty($text)) {
            $cartObj->addItemToCart($text);
        } else {
            $check = true;
            // check item is already added
            $checkArray = explode(" | ", $text);
            foreach ($checkArray as $item) {
                if ($item == $set_id) {
                    $check = false;
                    break;
                }
            }
            if ($check) {
                $cartObj->addItemToCart($text);
            } else {
                header("Location:../pages/Software_New.php?id=" . $set_id . "&status=ItemAlreadyAdded");
            }
        }
    }

    /* ----------------------- wishlist ------------------------------------------------------------------- */
    if (isset($_POST['addtowishlist'])) {
        $set_user = $_POST['user'];
        $set_id = $_POST['softId'];
        $wishListObj->setUser($set_user);
        $wishListObj->setSoftwareid($set_id);
        $text = $wishListObj->getWishListItems();

        // add item
        if (empty($text)) {
            $wishListObj->addItemToWishList($text);
        } else {
            // check item is already added
            $checkArray = explode(" | ", $text);
            foreach ($checkArray as $item) {
                if ($item === $id) {
                    header("Location:../pages/Software_New.php?id=" . $id . "&status=ItemAlreadyAdded");
                }
            }
            $wishListObj->addItemToWishList($text);
        }
    }
}

$star = [254, 20, 6, 15, 63, 150];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="stylesheet" href="../css/caro.css">
        <link rel="stylesheet" href="../css/Footer.css">
        <link rel="stylesheet" href="../css/CardImage.css">
        <link rel="stylesheet" href="../css/img-h.css">
        <link rel="stylesheet" href="../css/pages.css">
        <link rel="stylesheet" href="../css/software.css">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </head>
    <body>

        <!----------------------------------------------------------- nav bar start ---------------------------------------------------------->
        <nav class="navbar navbar-expand-lg navbar-dark bg-color fixed-top">
            <div class="container">
                <a class="navbar-brand logog" href="#"><img src="../img/logo.png" alt="logo" style="height:50px;"></a>
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
                                    $imagePath = '../img/user/' . $user . '/' . $user;

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
                                    <li><a class="dropdown-item " href="profile.php"><i class="fas fa-user mr-2 icoon"></i>Profile</a></li>
                                    <?php
                                    if ($rs->CheckDeveloper($user) === null) {
                                        ?>
                                        <li><a class="dropdown-item" href="BecomeDev.php"><i class="fa-solid fa-arrow-trend-up icoon"></i>Become a Developer</a></li>
                                    <?php }
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
        <!------------------------------------------------------------ nav bar end ----------------------------------------------------------->


        <br><br><br>

        <div class="container">

            <div class="row p-3">
                <div class="col-md-8">
                    <table width="100%">
                        <tr valign="middle">
                            <td width="25%"><button class="btn p-0" style="margin-left: 5px;" type="submit">
                                    <?php
                                    $imageFormats = ['png', 'jpg'];
                                    $imagePath = '../img/sw/' . $id . '/logo';

                                    foreach ($imageFormats as $format) {
                                        $imageUrl = $imagePath . '.' . $format;

                                        if (file_exists($imageUrl)) {
                                            echo '<img class="d-block mx-auto mb-3 mt-3" src="' . $imageUrl . '" height="130px" alt="Logo Image" />';
                                            break;
                                        }
                                    }
                                    ?>

                                </button></td>
                            <td>
                                <h2  class="mb-0"><?php echo $name; ?></h2><i class="text-muted font-italic"><?php echo " for " . $platform; ?></i><br>
                                <p class="mt-2 mb-0 p-0"><?php echo $language; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $license; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-star text-success"></i>&nbsp;<?php echo $rate; ?></p>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr valign="middle">
                            <td colspan="2" class="ms-3">
                                <i class="text-muted font-italic">Developed by</i><br>

                                <?php
                                $imageFormats = ['png', 'jpg'];
                                $imagePath = '../img/user/' . $dname . '/' . $dname;

                                foreach ($imageFormats as $format) {
                                    $imageUrl = $imagePath . '.' . $format;

                                    if (file_exists($imageUrl)) {
                                        $imageUrl = $imageUrl;
                                    } else {
                                        $imageUrl = "../img/user (2).png";
                                    }
                                }
                                echo '<img class="rounded-circle mt-2" height="40" src="' . $imageUrl . '"/>';
                                ?>

                                <?php echo $dname; ?><br>
                            </td>
                        </tr>
                    </table>
                </div>            
                <div class="col-md-4 text-center"><br><br>
                    <?php if ($license === "Paid" && isset($_SESSION["user"])) { ?>
                        <!--with login-->
                        <button type="button" class="btn btn-warning down">
                            <table width=100%>
                                <tr>
                                    <td class="p-3 text-light" ><span><h3>Buy Now</h3></span></td>
                                    <td align="right" class="p-3"><i class="fa-solid fa-download fa-beat-fade fa-2xl" style="color: #ffffff;"></i></td>
                                </tr>
                            </table>
                        </button>
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="user" value="<?php echo $user ?>" />
                            <input type="hidden" name="softId" value="<?php echo $id ?>" />
                            <button type="submit" name="addtocart" class="btn btn-outline-success border-3 down rounded-pill m-2 px-4" style="background-color: #37A573; ">
                                <table width=100%>
                                    <tr>
                                        <td class="p-1 text-light" ><span><h3>Add to cart</h3></span></td>
                                        <td align="right" class="p-3"><i class="fa-solid fa-cart-plus fa-shake fa-2xl" style="color: #ffffff;"></i></td>
                                    </tr>
                                </table>
                            </button>
                        </form>
                        <?php
                    }
                    if ($license === "Free" && isset($_SESSION["user"])) {
                        ?>
                        <!--with login-->

                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="user" value="<?php echo $user ?>" />
                            <input type="hidden" name="softId" value="<?php echo $id ?>" />
                            <button type="submit" name="addtowishlist" class="btn btn-outline-success border-3 down rounded-pill m-2 px-4" style="background-color: #37A573;">
                                <table width=100%>
                                    <tr>
                                        <td class="p-1 text-light" ><span><h3>Add to wishlist</h3></span></td>
                                        <td align="right" class="p-3"><i class="fa-regular fa-heart fa-2xl" style="color: #ffffff;"></i></td>
                                    </tr>
                                </table>
                            </button>
                        </form>
                        <!--<a href="../img/sw/sw0001/index.zip">-->
                        <button type="button" class="btn btn-success down" data-bs-toggle="modal" data-bs-target="#downloadConfirmationModal">
                            <table width=100%>
                                <tr>
                                    <td class="p-3 text-light" ><span><h3>Download</h3></span></td>
                                    <td align="right" class="p-3"><i class="fa-solid fa-download fa-beat-fade fa-2xl" style="color: #ffffff;"></i></td>
                                </tr>
                            </table>
                        </button>

                        <!-- Download Confirmation Modal -->
                        <div class="modal" tabindex="-1" id="downloadConfirmationModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Confirm Download</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to download this software?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <a href="../img/sw/<?php echo $id; ?>/<?php echo $name; ?>.zip" class="btn btn-primary">Download Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>

            <div class="row">
                <div class="col-md-8 p-5 ps-0">
                    <table width="100%">
                        <tr valign="middle">
                            <td colspan="2" class="ms-3">
                                <h4><?php echo $shortdescription; ?></h4>
                                <br>
                                <h3>Description</h3>
                                <?php
                                $paragraphs = preg_split("/\n\s*\n/", $description);
                                foreach ($paragraphs as $paragraph) {
                                    echo "<p>$paragraph</p>";
                                }
                                ?>
                                <br><br>
                                <h3>System requirement</h3>

                                <p>Before you start <?php echo $name; ?> download, make sure your PC or mobile device meets minimum system requirements.</p>
                                <?php
                                $tagsString = explode("|", $systemreq);
                                foreach ($tagsString as $tagsStrings) {
                                    echo "<li>$tagsStrings</li>";
                                }
                                ?>

                            </td>
                        </tr>

                    </table>

                </div>

                <div class="col-md-4 p-3">


                    <div class="bg-light border rounded shadow card ps-2 pt-1 ms-3">
                        <div class="card-body">
                            <h3>Deatails</h3><br>
                            <p>License :<br><b><?php echo $license; ?></b></p><hr>
                            <p>Version :<br><b><?php echo $version; ?></b></p><hr>
                            <p>Latest update :<br><b><?php echo $date; ?></b></p><hr>
                            <p>Platform :<br><b><?php echo $platform; ?></b></p><hr>
                            <p>Language :<br><b><?php echo $language; ?></b></p><hr>
                            <p>Downloads :<br><b><?php echo $DownCount; ?></b></p><hr>
                            <p>rates :<br><i class="fa fa-star text-success"></i>&nbsp;<b><?php echo $rate; ?></b></p>
                        </div>
                    </div><br>


                </div>
                <br><hr>

                <div class="row">
                    <div class="col-md-8">

                        <h3>Tutorials</h3><br>

                        <div class="row pb-5 mb-4">
                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                <div class="card shadow-sm border-0 rounded">
                                    <div class="card-body p-0"><img class="w-100 card-img-top" src="../img/tutorial.jpg" alt />
                                        <div class="p-4">
                                            <h5 class="mb-0">Title</h5>
                                            <p class="small text-muted">by author</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                <div class="card shadow-sm border-0 rounded">
                                    <div class="card-body p-0"><img class="w-100 card-img-top" src="../img/tutorial.jpg" alt />
                                        <div class="p-4">
                                            <h5 class="mb-0">Title</h5>
                                            <p class="small text-muted">by author</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                <div class="card shadow-sm border-0 rounded">
                                    <div class="card-body p-0"><img class="w-100 card-img-top" src="../img/tutorial.jpg" alt />
                                        <div class="p-4">
                                            <h5 class="mb-0">Title</h5>
                                            <p class="small text-muted">by author</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>




                    <div class="col-md-4 pt-5 ps-4">

                        <div class="border rounded card ps-2 pt-1 ms-3">
                            <div class="card-body">
                                <h5>Ad</h5><br><br><br><br><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!----------------------------------------------------------comment and *review area*----------------------------------------------->
            <hr>

            <!------------------------------------------------------------comments area------------------------------------------------->


            <div  class="row">
                <h1 class="mt-5 mb-5">Review & Rating System in Softwares</h1>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 text-center">
                                <h1 class="text-warning mt-4 mb-4">
                                    <b><span id="average_rating">0.0</span> / 5</b>
                                </h1>
                                <div class="mb-3">
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                </div>
                                <h3><span id="total_review">0</span> Review</h3>
                            </div>
                            <div class="col-sm-4">
                                <p>
                                <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                </div>
                                </p>
                                <p>
                                <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                </div>               
                                </p>
                                <p>
                                <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                </div>               
                                </p>
                                <p>
                                <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                </div>               
                                </p>
                                <p>
                                <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                </div>               
                                </p>
                            </div>
                            <div class="col-sm-4 text-center">
                                <h3 class="mt-4 mb-3">Write Review Here</h3>
                                <button type="button" name="review_sw" id="review_sw" class="btn btn-primary">Review Software</button>
                                <a href="review_dev.php?username=<?= $username ?>&devname=<?= $dname ?>">
                                    <button type="button" name="review_sw" id="review_dev" class="btn btn-primary">Review Developer</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5" id="review_content"></div>
            </div>


            <style>
                .progress-label-left
                {
                    float: left;
                    margin-right: 0.5em;
                    line-height: 1em;
                }
                .progress-label-right
                {
                    float: left;
                    margin-left: 0.3em;
                    line-height: 1em;
                }
                .star-light
                {
                    color: #e9ecef;
                }
            </style>

            <!------------------------------------------------------------------------------------------------------------------------------------------------- -->


            <section id="title area">
                <p class="small text-muted font-italic"></p>

                <!-------------------------------------------------------- title & contenct area start ------------------------------------------------------->
                <?php
                $title = ["sm" => "Similar applications", "devtop" => "Top applications fo developer"];
                foreach ($title as $key => $value) {
                    echo '<h4>&nbsp;' . $value . '</h4><p class="small text-muted font-italic"></p>';
                    ?>
                    <div class="row">
                        <?php
                        for ($i = 0; $i < 6; $i++) {
                            echo '<div class="col-sm-6 col-md-4 col-lg-2 col-6 p-2">
                                <div class="card rounded shadow-sm">
                                <div class="card-body p-2 mt-1">
                                <img class="img-fluid d-block mx-auto mb-3" src="../img/tempicon.png" alt />
                                <hr><p class="extra-small"></p>
                                <table style="width: 100%">
                                <tr><td>Free</td>
                                <td style="text-align: right"><i class="fa fa-star text-success"></i>&nbsp;5.0</td>
                                </tr></table><p></p>
                                <h5><a class="text-dark" href="#">SW Name</a></h5>
                                <p class="small text-muted font-italic">by developer</p>
                                </ul></div></div></div>';
                        }
                        ?>

                    </div><br><br>
                <?php } ?>
                <!--------------------------------------------------------- title & contenct area end -------------------------------------------------------->   
            </section><br>


        </div><!--container end-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>

<div id="review_modal_sw" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Submit Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="colse">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center mt-2 mb-4">
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                </h4>
                <div class="form-group">
                    <input type="text" name="set_name" id="set_name" class="form-control" placeholder="Enter software Name" value="<?= $name ?>"/>
                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" value="<?= $username ?>"/>
                </div>
                <div class="form-group">
                    <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                </div>
                <div class="form-group text-center mt-4">
                    <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var rating_data = 0;
        $('#review_sw').click(function () {
            $('#review_modal_sw').modal('show');
        });

        $('#colse').click(function () {
            $('#review_modal_sw').modal('hide');
        });

        $(document).on('mouseenter', '.submit_star', function () {
            var rating = $(this).data('rating');
            reset_background();
            for (var count = 1; count <= rating; count++) {
                $('#submit_star_' + count).addClass('text-warning');
            }
        });

        function reset_background() {
            for (var count = 1; count <= 5; count++) {
                $('#submit_star_' + count).addClass('star-light');
                $('#submit_star_' + count).removeClass('text-warning');
            }
        }

        $(document).on('mouseleave', '.submit_star', function () {
            reset_background();
            for (var count = 1; count <= rating_data; count++) {
                $('#submit_star_' + count).removeClass('star-light');
                $('#submit_star_' + count).addClass('text-warning');
            }
        });

        $(document).on('click', '.submit_star', function () {
            rating_data = $(this).data('rating');
        });

        $('#save_review').click(function () {
            var set_name = $('#set_name').val();
            var user_name = $('#user_name').val();
            var user_review = $('#user_review').val();
            if (user_name == '' || user_review == '') {
                alert("Please Fill Both Fields");
                return false;
            } else {
                $.ajax({
                    url: "../Process/reviewprocess.php",
                    method: "POST",
                    data: {
                        software: "",
                        web_rating_data: rating_data,
                        user_name: user_name,
                        set_name: set_name,
                        user_review: user_review
                    },
                    success: function (data) {
                        alert(data);
                        load_rating_data_sw();
                        $('#review_modal_sw').modal('hide');
                    },
                    error: function () {
                        alert("ajax_1 Error");
                    }
                });
            }
        });

        load_rating_data_sw();
        // sw data
        function load_rating_data_sw()
        {
            $.ajax({
                url: "../Process/reviewprocess.php",
                method: "POST",
                data: {
                    action_sw: 'load_data',
                    sw_name: "<?= $name ?>",
                    u_name: "<?= $username ?>"
                },
                dataType: "JSON",
                success: function (data)
                {
                    //console.log(data);
                    $('#average_rating').text(data.average_rating);
                    $('#total_review').text(data.total_review);

                    var count_star = 0;

                    $('.main_star').each(function () {
                        count_star++;
                        if (Math.ceil(data.average_rating) >= count_star)
                        {
                            $(this).addClass('text-warning');
                            $(this).addClass('star-light');
                        }
                    });

                    $('#total_five_star_review').text(data.five_star_review);

                    $('#total_four_star_review').text(data.four_star_review);

                    $('#total_three_star_review').text(data.three_star_review);

                    $('#total_two_star_review').text(data.two_star_review);

                    $('#total_one_star_review').text(data.one_star_review);

                    $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

                    $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

                    $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

                    $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

                    $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

                    if (data.review_data.length > 0)
                    {
                        var html = '';

                        for (var count = 0; count < data.review_data.length; count++)
                        {
                            html += '<div class="row mb-3">';

                            html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' + data.review_data[count].user_name.charAt(0) + '</h3></div></div>';

                            html += '<div class="col-sm-11">';

                            html += '<div class="card">';

                            html += '<div class="card-header"><b>' + data.review_data[count].user_name + '</b></div>';

                            html += '<div class="card-body">';

                            for (var star = 1; star <= 5; star++)
                            {
                                var class_name = '';

                                if (data.review_data[count].rating >= star)
                                {
                                    class_name = 'text-warning';
                                } else
                                {
                                    class_name = 'star-light';
                                }

                                html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                            }

                            html += '<br />';

                            html += data.review_data[count].user_review;

                            html += '</div>';

                            html += '<div class="card-footer text-right">On ' + data.review_data[count].datetime + '</div>';

                            html += '</div>';

                            html += '</div>';

                            html += '</div>';
                        }

                        $('#review_content').html(html);
                    }
                },
                error: function (xhr, status, errorThrown) {
                    console.log("Error", xhr.status, xhr.statusText);
                    console.log("Error msg", xhr.responseText);
                }
            });
        }

    });
</script>


