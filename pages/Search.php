<?php
// Establish a connection to the MySQL server
$conn = new mysqli('localhost', 'root', '', 'softdex');
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require '../Classes/Select.php';

use Classes\Selecrsw;

$rs = new Classes\Select();

$rss = $rs->selectSw("sw0001");

foreach ($rss as $sw) {
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
    $maincategory = $sw->maincategory;
    $category = $sw->category;
    $tags = $sw->tags;
    $systemreq = $sw->systemreq;
    $description = $sw->description;
}

$star = [254, 20, 6, 15, 63, 150];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/caro.css">
        <link rel="stylesheet" href="css/Footer.css">
        <link rel="stylesheet" href="css/CardImage.css">
        <link rel="stylesheet" href="css/img-h.css">
        <link rel="stylesheet" href="css/pages.css">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <style>
            /* Hide scrollbar for Chrome, Safari and Opera */
            body::-webkit-scrollbar {
                display: none;
            }

            /* Hide scrollbar for IE, Edge and Firefox */
            body {
                -ms-overflow-style: none;
                /* IE and Edge */
                scrollbar-width: none;
                /* Firefox */
            }
                    </style>

    </head>
    <body>
        <div class="container">

            <br><br>

            <!----------------------------------------------------------- search area start ---------------------------------------------------------->
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card" style="border: 0px;">
                        <div class="card-body">
                            <form class="d-flex align-items-center">
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
                                                        <img class="img-fluid d-block mx-auto mb-3" src="../img/tempicon.png" alt />
                                                        <hr>
                                                        <p class="extra-small"></p>
                                                        <table style="width: 100%">
                                                            <tr>
                                                                <td>Free</td>
                                                                <td style="text-align: right"><i class="fa fa-star text-success"></i>&nbsp;5.0</td>
                                                            </tr>
                                                        </table><p></p>
                                                        <h5><a class="text-dark" href="#">SW Name</a></h5>
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
                                        <img class="p-0" src="../img/tempicon.png" height="75px" alt /></button></td>
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


            <!----------------------------------------------------------- Search result area start ----------------------------------------------------------->

            <section>
                <br>
                <h1>Search result ..................</h1><br>
                <div class="row">
                    <div class="col-md-3">

                        <h3>short by</h3>
                        <button class="btn btn-outline-secondary round m-1" type="button">Recenly added</button>
                        <button class="btn btn-outline-secondary round m-1" type="button">Rating</button>
                        <button class="btn btn-outline-secondary round m-1" type="button">Download</button>

                        <br><br><h3>Platforms</h3>
                        <button class="btn btn-outline-secondary round m-1" type="button">All</button>
                        <button class="btn btn-outline-secondary round m-1" type="button">Windows</button>
                        <button class="btn btn-outline-secondary round m-1" type="button">Linux</button>
                        <button class="btn btn-outline-secondary round m-1" type="button">Mac</button>
                        <button class="btn btn-outline-secondary round m-1" type="button">Android</button>
                        <button class="btn btn-outline-secondary round m-1" type="button">Iso</button>

                        <br><br><h3>License</h3>
                        <button class="btn btn-outline-secondary round m-1" type="button">All</button>
                        <button class="btn btn-outline-secondary round m-1" type="button">Free</button>
                        <button class="btn btn-outline-secondary round m-1" type="button">Paid</button>


                        <br><br><h3>Languages</h3>
                        <button class="btn btn-outline-secondary round m-1" type="button">All</button>
                        <button class="btn btn-outline-secondary round m-1" type="button">English</button>
                        <button class="btn btn-outline-secondary round m-1" type="button">Sinhala</button>



                    </div>
                    <div class="col-md-9">
                        <div class="card align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="card-body order-2 order-lg-1">


                                <table width=100%>
                                    <tr>
                                        <td class="me-1"><img class="p-0" src="../img/tempicon.png" alt="Generic placeholder image" width="150" /></td>

                                        <td class="ms-1">
                                            <h2  class="mb-0"><?php echo $name; ?></h2><i class="text-muted font-italic"><h4><?php echo $shortdescription; ?></h4>
                                                <?php echo " by " . $developer ?></i>
                                            <p class="mt-2 mb-0 p-0"><?php echo 'for ' . $platform; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $language; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $license; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-star text-success"></i>&nbsp;5.0</p>

                                        </td>
                                        <td align="right"></td>
                                    </tr><br><hr><br>



                                </table>


                                <table width=100%>
                                    <tr>
                                        <td class="me-1"><img class="p-0" src="../img/tempicon.png" alt="Generic placeholder image" width="150" /></td>

                                        <td class="ms-1">
                                            <h2  class="mb-0"><?php echo $name; ?></h2><i class="text-muted font-italic"><h4><?php echo $shortdescription; ?></h4>
                                                <?php echo " by " . $developer ?></i>
                                            <p class="mt-2 mb-0 p-0"><?php echo 'for ' . $platform; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $language; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $license; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-star text-success"></i>&nbsp;5.0</p>

                                        </td>
                                        <td align="right"></td>
                                    </tr><br><hr><br>



                                </table>
                            </div>
                        </div><br><br>


                        <div class="text-center">

                            <button class="btn btn-secondary m-1" type="button">All</button>

                        </div>
                    </div>

                </div>
            </section>


            <br>
            <br>
            <br>
            <br>
        </div>
    </body>
</html>
