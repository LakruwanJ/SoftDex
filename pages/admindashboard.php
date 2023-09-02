<?php

use Classes\admin;
use Classes\Home;

require_once '../Classes/Home.php';
require_once '../Classes/DbConnector.php';
require_once '../Classes/admin.php';

use Classes\DbConnector as MyDbConnector;

$dbConnector = new MyDbConnector();
$connection = $dbConnector->getConnection();

//create admin class
$users = admin::viewuserdetails($connection);
$softwares = admin::viewallsoftware($connection);
$downloads = admin::viewalldownloads($connection);
$developers = admin::viewalldeveloper($connection);
$home = new Home();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


        <title>Admin Dashboard</title>
        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="../css/dashboard.css">
    </head>

    <body style="height: 100%; margin: 0;">
        <!-- =============== Navigation ================ -->
        <div class="container-fluid no-padding-container">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="#">
                            <span class="icon">
                                <img src="../img/logo3.png" alt=""  width="50px" height="50px">
                            </span>
                            <span class="title">Softdex</span>
                        </a>
                    </li>

                    <li>
                        <a id="Dashboardbutton" href="#">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a id="Usermanagementbutton" href="#">
                            <span class="icon">
                                <ion-icon name="people-outline"></ion-icon>
                            </span>
                            <span class="title">User Management</span>
                        </a>
                    </li>

                    <li>
                        <a id="SoftwareManagementbutton" href="#">
                            <span class="icon">
                                <ion-icon name="settings-outline"></ion-icon>
                            </span>
                            <span class="title">Software Management</span>
                        </a>
                    </li>

                    <li>
                        <a id="DeveloperManagementbutton" href="#">
                            <span class="icon">
                                <ion-icon name="people-outline"></ion-icon>
                            </span>
                            <span class="title">Developer Management</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- ========================= Main ==================== -->
            <div class="main">
                <div class="topbar">
                    <div class="toggle">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div>



                    <div class="user">
                        <img src="../img/user (2).png" alt="">
                    </div>
                </div>

                <!-- ======================= Cards ================== -->
                <div class="cardBox">
                    <div class="card">
                        <div>
                            <div class="numbers"><?php echo $home->countUser(); ?></div>
                            <div class="cardName">Users</div>
                        </div>

                        <div >
                            <img src="../img/user.png" alt=""  width="50px" height="50px">
                        </div>
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers"><?php echo $home->countDev(); ?></div>
                            <div class="cardName">Devolpers</div>
                        </div>

                        <div >
                            <img src="../img/devoloper.png" alt=""  width="60px" height="60px">
                        </div>
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers"><?php echo $home->countSw(); ?></div>
                            <div class="cardName">Softwares</div>
                        </div>

                        <div>
                            <img src="../img/software.png" alt=""  width="50px" height="50px">
                        </div>
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">6</div>
                            <div class="cardName">Downlods</div>
                        </div>

                        <div >
                            <img src="../img/download (1).png" alt="" width="50px" height="50px">
                        </div>
                    </div>



                </div>




                <!-- ================ Software Details================= -->
                <div class="details">
                    <div class="recentOrders" id="Softwaretable1" style="display: none;">
                        <div class="cardHeader">
                            <h2>Softwares</h2>

                        </div>


                        <!------- <div>
                             <td><button type="button" class="btn btn-primary">Add Platform</button></td>
                         </div>------>



                        <!-----<div>
                            <td><button type="button" class="btn btn-primary">Add Catogory</button></td>
                        </div>---->


                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Price</td>
                                        <td>Developer</td>
                                        <td>Status</td>
                                        <td>Platform</td>
                                        <!--- add modal---->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Platform</button>

                                <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add Platform</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="POST">
                                                    <div class="mb-3">
                                                        <label for="Name" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="platformName"  name="platformName" aria-describedby="emailHelp">


                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($softwares as $software) {
                                        ?>
                                        <tr>
                                            <td><?= $software->getName() ?></td>
                                            <td><?= $software->getAmount() ?></td>
                                            <td><?= $software->getDeveloper() ?></td>
                                            <td><?= $software->getLicense() ?></td>
                                            <td><?= $software->getPlatform() ?></td>


                                            <td><img src="../img/trash-solid (1).svg" alt=""  width="25px" height="25px"></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- ================= User details ================ -->
                    <div class="recentCustomers" id="RecentCustomertable" style="display: none;">
                        <div class="cardHeader">
                            <h2>Users</h2>
                        </div>

                        <!--------- <div class="card">
                             <div>
                                 <div class="numbers">Add new Country</div>
                             </div>
                         </div>------>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Username</td>
                                        <td>Country</td>
                                        <td>Remove User</td>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($users as $user) {
                                        ?>
                                        <tr>
                                            <td><?= $user->getFname() . " " . $user->getLname() ?></td>
                                            <td><?= $user->getEmail() ?></td>
                                            <td><?= $user->getUsername() ?></td>
                                            <td><?= $user->getCountry() ?></td>
                                            <td><img src="../img/user-xmark-solid.svg" alt=""  width="50px" height="50px"></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>

                    </div>



                </div> 
                <!-- ================= Downloads ================ -->
                <div class="recentCustomers" id="Softwaretable2" style="display: none;">
                    <div class="cardHeader">
                        <h2>Downloads</h2>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <td>Software name</td>
                                    <td>Date</td>


                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($downloads as $download) {
                                    ?>
                                    <tr>
                                        <td><?= $download->getSoftware() ?></td>
                                        <td><?= $download->getDate() ?></td>



                                    </tr>
                                    <?php
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ================= Developer ================ -->
                <div class="recentCustomers" id="Developertable" style="display: none;">
                    <div class="cardHeader">
                        <h2>Developer</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>

                                <td>Devolper ID</td>
                                <td>Short Description</td>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($developers as $developer) {
                                ?>
                                <tr>
                                    <td><?= $developer->getDid() ?></td>
                                    <td><?= $developer->getShortdes() ?></td>



                                </tr>
                                <?php
                            }
                            ?>


                        </tbody>
                    </table>
                </div>

            </div>

        </div>

        <!-- =========== Scripts =========  -->
        <script src="../JS/admindashboard.js"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <!-- ==== jQuery Script ==== -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- ==== Boostrap Script ==== -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

        <script>
            $(document).ready(function () {
                $("#sidebarCollapse").on("click", function () {
                    $("#sidebar").toggleClass("active");
                });

                // Show the users table when the "User management" button is clicked
                $("#Usermanagementbutton").click(function () {
                    $("#RecentCustomertable").show();
                    $("#Softwaretable1").hide();
                    $("#Softwaretable2").hide();
                    $("#Developertable").hide();

                });

                // Show the Software table when the "Software mangement" button is clicked
                $("#SoftwareManagementbutton").click(function () {
                    $("#Softwaretable1").show();
                    $("#Softwaretable2").show();
                    $("#RecentCustomertable").hide();
                    $("#Developertable").hide();


                });
                // Show the dashboard table when the "Dashboard" button is clicked
                $("#Dashboardbutton").click(function () {
                    $("#Softwaretable1").hide();
                    $("#Softwaretable2").hide();
                    $("#RecentCustomertable").hide();
                    $("#Developertable").hide();



                });

                // Show the agencies table when the "Developer mangement" button is clicked
                $("#DeveloperManagementbutton").click(function () {
                    $("#Softwaretable1").hide();
                    $("#Softwaretable2").hide();
                    $("#RecentCustomertable").hide();
                    $("#Developertable").show();

                });


            });
        </script>

    </body>

</html>