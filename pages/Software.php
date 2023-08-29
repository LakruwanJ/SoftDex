<?php
require '../Classes/Select.php';

use Classes\Select;

$rs = new Classes\Select();
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    header("Location: ../Softdex.php");
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
        <link rel="stylesheet" href="../css/software.css">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
        <br>
        <div class="container">

            <div class="row p-3">
                <div class="col-md-8">
                    <table width="100%">
                        <tr valign="middle">
                            <td width="25%"><button class="btn p-0" style="margin-left: 5px;" type="submit">
                                    <img class="mx-auto mb-1" src="../img/<?php echo $id; ?>/<?php echo $id; ?>.webp" height="130px" alt />

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
                                <a href="#"><img class="rounded-circle mt-2" src="https://mdbootstrap.com/img/new/avatars/2.jpg" height="40" alt /></a>

                                <?php echo $dname . "<b> &CenterDot; </b>"; ?> since <?php echo $ddate ?><br>
                            </td>
                        </tr>
                    </table>
                </div>            
                <div class="col-md-4 text-center"><br><br>
                    <?php
                    if ($license === "paid") {
                        ?>
                        <button type="button" class="btn btn-warning down">
                            <table width=100%>
                                <tr>
                                    <td class="p-3 text-light" ><span><h3>Download</h3></span></td>
                                    <td align="right" class="p-3"><i class="fa-solid fa-download fa-beat-fade fa-2xl" style="color: #ffffff;"></i></td>
                                </tr>
                            </table>
                        </button>
                        <?php
                    } else {
                        ?>  
                    <button type="button" class="btn btn-success down">
                            <table width=100%>
                                <tr>
                                    <td class="p-3 text-light" ><span><h3>Download</h3></span></td>
                                    <td align="right" class="p-3"><i class="fa-solid fa-download fa-beat-fade fa-2xl" style="color: #ffffff;"></i></td>
                                </tr>
                            </table>
                        </button>
                        <?php
                    }
                    ?>
                    <button type="button" class="btn btn-outline-success border-3 down rounded-pill m-2 px-4" style="background-color: #37A573; ">
                        <table width=100%>
                            <tr>
                                <td class="p-1 text-light" ><span><h3>Add ro cart</h3></span></td>
                                <td align="right" class="p-1"><i class="fa-solid fa-download fa-beat-fade fa-2xl" style="color: #ffffff;"></i></td>
                            </tr>
                        </table>
                    </button> 

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
            <div class="row">
                <div class="col-md-5 px-5 pt-3 pb-1">
                    <h3 class="p-0">Customer Reviews (<?php echo $star[0]; ?>)</h3><br>
                    <h1><i class="fa fa-star text-success"></i>
                        <?php
                        $avg = 0;
                        for ($i = 5; $i > 0; $i--) {
                            $avg += $star[$i] * $i;
                        }
                        $rate = round($avg / $star[0], 1);
                        echo $rate;
                        ?>
                    </h1>
                    <p>All reviews come from Registed users those who downloaded the application</p>
                </div>
                <div class="col-md-7 px-5 pt-3 pb-1">
                    <?php
                    for ($i = 5; $i > 0; $i--) {
                        echo '<div class="side"><div>' . $i . ' star</div></div>
                            <div class="middle"><div class="bar-container">
                            <div style="width: ' . ($star[$i] / $star[0]) * 100 . '%; height: 18px; background-color: #04AA6D;">
                            </div></div></div>
                            <div class="side right"><div>' . $star[$i] . '</div></div>';
                    }
                    ?>
                </div>
            </div>




            <hr>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-outline-secondary round" type="button">All<?php echo " (" . $star[0] . ")" ?></button>
                    <?php
                    for ($J = 5; $J > 1; $J--) {
                        echo'<button class="btn btn-outline-secondary round m-2" type="button">
                        ' . $J . ' Stars (' . $star[$J] . ')
                        </button>';
                    }
                    ?>
                    <button class="btn btn-outline-secondary round" type="button">1 star<?php echo " (" . $star[1] . ")" ?></button>
                    <hr>     
                </div>



            </div>



            <!------------------------------------------------------------comments area------------------------------------------------->
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <table>
                        <tr>
                            <td><a href="#"><img class="rounded-circle" src="https://mdbootstrap.com/img/new/avatars/2.jpg" height="40" alt /></a></td>
                            <td class="ps-3"><?php echo $developer; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="ps-3"><i class="fa fa-star text-success"></i>&nbsp;<?php echo $rate; ?>
                                &nbsp;&nbsp;&centerdot;&nbsp;&nbsp;<?php echo "1 month ago"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="ps-3"><p>Janvi is easy to communicate with, she responds fast. Just tell her how you want the output to be and her team will revise it based from your feedback. I like how they worked on the logo design for my brand. They also did my social media kit but I did not expect it to be just the logo with a white background. I'd say it was not their strong suite, but Janvi still welcomed my suggestions and applied it on the design. I appreciate their work and their effort. Overall, I am quite satisfied because Janvi welcomed my suggestions and revision requests. I'd say, great customer service.</p></td>
                        </tr>
                    </table><hr>     
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table>
                        <tr>
                            <td><a href="#"><img class="rounded-circle" src="https://mdbootstrap.com/img/new/avatars/2.jpg" height="40" alt /></a></td>
                            <td class="ps-3"><?php echo $developer; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="ps-3"><i class="fa fa-star text-success"></i>&nbsp;<?php echo $rate; ?>
                                &nbsp;&nbsp;&centerdot;&nbsp;&nbsp;<?php echo "1 month ago"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="ps-3"><p>The team delivered great work, I received a lot of initial designs to choose from. Revisions took a lot longer than I liked, even with the time difference. I did not receive the revision on the logo exactly as I asked but I still like the final product and would recommend their service to others.</p></td>
                        </tr>
                    </table><hr>
                </div>
            </div><br>


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
