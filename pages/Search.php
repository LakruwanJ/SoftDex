<?php
require '../Classes/SchRes.php';
require '../Classes/Home.php';

use Classes\DbConnector;
use Classes\Home;
use Classes\SchRes;

$dbcon = new DbConnector();
$home = new Home();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["searchbar"]) && !empty($_POST["searchbar"])) {
        $sword = $_POST["searchbar"];
    } else {
        $sword = null;
    }
    $_SESSION["sword"] = $_POST["searchbar"];
    echo $sword;
    echo $_SESSION["sword"];
} else {
    $sword = $_SESSION["sword"];
}
$srt = isset($_GET['srt']) ? $_GET['srt'] : 'date ASC';
$opP = isset($_GET['opP']) ? $_GET['opP'] : NULL;
$opL = isset($_GET['opL']) ? $_GET['opL'] : NULL;
$opLA = isset($_GET['opLA']) ? $_GET['opLA'] : NULL;
$rows = 10;
$pageNum = isset($_GET['pagecount']) ? $_GET['pagecount'] : 1;

$schR = new SchRes();
$rs = $schR->sch($sword, $pageNum, $rows, $opP, $opL, $opLA, $srt);

$star = [254, 20, 6, 15, 63, 150];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="stylesheet" href="../css/Footer.css">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                            <a class="nav-link nav-link_  active" href="#"><i class="fa-solid fa-book icoon"></i>Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link_  active" href="#"><i class="fa-regular fa-clock icoon"></i>Comming soon</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " href="#"><i class="fa-solid fa-right-to-bracket icoon"></i>Login</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " href="#"><button class="btn btn-primary" type="button">Sign UP</button></a>

                        </li>
                    </ul>
                </div>
            </div>
        </nav><br><br>
        <!------------------------------------------------------------ nav bar end -----------------------------------------------------------><input type="submit" value="" />

        <div class="container">

            <br><br>

            <!----------------------------------------------------------- search area start ---------------------------------------------------------->
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card" style="border: 0px;">
                        <div class="card-body">
                            <form class="d-flex align-items-center" action="Search.php" method="POST">
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


            <!----------------------------------------------------------- Search result area start ----------------------------------------------------------->
            <section>
                <br>
                <h1>Search result for <?php echo $sword; ?></h1><br>
                <div class="row">
                    <div class="col-md-3">
                        <?php
                        $phpself1 = $_SERVER['PHP_SELF'];
                        $queryString = $_SERVER['QUERY_STRING'];
                        $phpself = $phpself1 . "?" . $queryString;
                        ?>

                        <h3>short by</h3>
                        <a href="<?php echo $phpself; ?>&srt=date ASC"><button class="btn btn-outline-secondary round m-1" type="button">Recenly added</button></a>                        
                        <a href="<?php echo $phpself; ?>&srt=date DESC"><button class="btn btn-outline-secondary round m-1" type="button">Older</button></a>
                        <a href="<?php echo $phpself; ?>&srt=r"><button class="btn btn-outline-secondary round m-1" type="button">Rating</button></a>
                        <a href="<?php echo $phpself; ?>&srt=d"><button class="btn btn-outline-secondary round m-1" type="button">Download</button></a>

                        <br><br><h3>Platforms</h3> 
                        <a href="<?php echo $phpself; ?>&opP="><button class="btn btn-outline-secondary round m-1" type="button">All</button></a>
                        <a href="<?php echo $phpself; ?>&opP=Windows"><button class="btn btn-outline-secondary round m-1" type="button">Windows</button></a>
                        <a href="<?php echo $phpself; ?>&opP=Linux"><button class="btn btn-outline-secondary round m-1" type="button">Linux</button></a>
                        <a href="<?php echo $phpself; ?>&opP=Mac"><button class="btn btn-outline-secondary round m-1" type="button">Mac</button></a>
                        <a href="<?php echo $phpself; ?>&opP=Android"><button class="btn btn-outline-secondary round m-1" type="button">Android</button></a>
                        <a href="<?php echo $phpself; ?>&opP=Iso"><button class="btn btn-outline-secondary round m-1" type="button">Iso</button></a>

                        <br><br><h3>License</h3>
                        <a href="<?php echo $phpself; ?>&opL="><button class="btn btn-outline-secondary round m-1" type="button">All</button></a>
                        <a href="<?php echo $phpself; ?>&opL=Free"><button class="btn btn-outline-secondary round m-1" type="button">Free</button></a>
                        <a href="<?php echo $phpself; ?>&opL=Paid"><button class="btn btn-outline-secondary round m-1" type="button">Paid</button></a>

                        <br><br><h3>Languages</h3>
                        <a href="<?php echo $phpself; ?>&opLA="><button class="btn btn-outline-secondary round m-1" type="button">All</button></a>
                        <a href="<?php echo $phpself; ?>&opLA=English"><button class="btn btn-outline-secondary round m-1" type="button">English</button></a>
                        <a href="<?php echo $phpself; ?>&opLA=Sinhala"><button class="btn btn-outline-secondary round m-1" type="button">Sinhala</button></a>


                    </div>
                    <div class="col-md-9">
                        <div class="card align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="card-body order-2 order-lg-1">

                                <?php
                                foreach ($rs as $sw) {
                                    $sid = $sw->Sid;
                                    $name = $sw->name;
                                    $shortdescription = $sw->shortdescription;
                                    $platform = $sw->platform;
                                    $developer = $sw->username;
                                    $license = $sw->license;
                                    $amount = $sw->amount;
                                    $language = $sw->language;
                                    ?>
                                    <table width=100%>
                                        <tr>
                                            <td class="me-1" width="180"><img class="p-0" src="../img/tempicon.png" alt="Generic placeholder image" width="150" /></td>

                                            <td class="ms-1">
                                                <h2  class="mb-0"><?php echo $name; ?></h2>
                                                <i class="text-muted font-italic"><h4><?php echo $shortdescription; ?></h4>
                                                    <?php echo " by " . $developer ?></i>
                                                <p class="mt-2 mb-0 p-0"><?php echo 'for ' . $platform; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $language; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $license; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-star text-success"></i>&nbsp;5.0</p>

                                            </td>
                                            <td align="right"></td>

                                        </tr><br><hr><br>
                                    </table>
                                    <?php
                                }
                                ?>

                            </div>
                        </div><br><br>

                        <!--buttons for back and next-->
                        <div class="text-center">

                            <?php
                            $totalRows = $schR->getTotalRows($sword, $opP, $opL, $opLA); //total number of rows
                            $lastPage = ceil($totalRows / $rows); //last page number
                            $phpself = $_SERVER['PHP_SELF'];

                            if ($totalRows == 0) {
                                $pageNum = 0;
                                $lastPage = 0;
                                $prev = ' <button class="btn btn-secondary m-1" type="button" disabled>Back</button> ';
                                $first = ' <button class="btn btn-secondary m-1" type="button" disabled>First Page</button> ';
                                $next = ' <button class="btn btn-secondary m-1" type="button" disabled>Next</button> ';
                                $last = ' <button class="btn btn-secondary m-1" type="button" disabled>Last Page</button> ';
                            } else {
// Generate pagination links
                                if ($pageNum > 1) {
                                    $page = $pageNum - 1;
                                    $prev = ' <a href="' . $phpself . '?pagecount=' . $page . '" ><button class="btn btn-secondary m-1" type="button">Back</button></a> ';
                                    $first = ' <a href="' . $phpself . '?pagecount=1" ><button class="btn btn-secondary m-1" type="button">First Page</button></a> ';
                                } else {
                                    $prev = ' <button class="btn btn-secondary m-1" type="button" disabled>Back</button> ';
                                    $first = ' <button class="btn btn-secondary m-1" type="button" disabled>First Page</button> ';
                                }

                                if ($pageNum < $lastPage) {
                                    $page = $pageNum + 1;
                                    $next = ' <a href="' . $phpself . '?pagecount=' . $page . '"><button class="btn btn-secondary m-1" type="button">Next</button></a> ';
                                    $last = ' <a href="' . $phpself . '?pagecount=' . $lastPage . '"><button class="btn btn-secondary m-1" type="button">Last Page</button></a> ';
                                } else {
                                    $next = ' <button class="btn btn-secondary m-1" type="button" disabled>Next</button> ';
                                    $last = ' <button class="btn btn-secondary m-1" type="button" disabled>Last Page</button> ';
                                }
// Display pagination links
                                echo $first . $prev . " Showing page <bold>$pageNum</bold> of <bold>$lastPage</bold> pages " . $next . $last;
                            }
                            ?>

                        </div>
                    </div>

                </div>
            </section>
            <!------------------------------------------------------------ Search result area end ------------------------------------------------------------>

            <br>
            <br>
            <br>
            <br>
        </div>

        <footer id = "myFooter">
            <div class = "container-fluid">
                <div class = "row text-center">
                    <div class = "col-12 col-sm-6 col-md-3">
                        <a href = "#"> <img src = "../img/logo2.png" alt = "logo" style = "height:150px;"> </a>
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