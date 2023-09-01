<?php

use Classes\admin;

require_once '../Classes/DbConnector.php';
require_once '../Classes/admin.php';

use Classes\DbConnector as MyDbConnector;

$dbConnector = new MyDbConnector();
$connection = $dbConnector->getConnection();


$users = admin::viewuserdetails($connection);
$softwares= admin::viewallsoftware($connection);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
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
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Feedback</span>
                    </a>
                </li>

                

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
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
                        <div class="numbers">30</div>
                        <div class="cardName">Users</div>
                    </div>

                    <div >
                        <img src="../img/user.png" alt=""  width="50px" height="50px">
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">11</div>
                        <div class="cardName">Devolpers</div>
                    </div>

                    <div >
                        <img src="../img/devoloper.png" alt=""  width="60px" height="60px">
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">59</div>
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

            <!-- ================ Order Details List ================= -->
                <div class="details" >
                    <div class="recentOrders" id="Softwaretable1" style="display: none;">
                        <div class="cardHeader">
                            <h2>Softwares</h2>

                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Price</td>
                                    <td>Devolper Name</td>
                                    <td>license</td>
                                    <td>platform<td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                foreach ($softwares as $software){
                                ?>
                                <tr>
                                    <td><?=$software->getName()?></td>
                                    <td><?=$software->getAmount()?></td>
                                    <td><?=$software->getDeveloper()?></td>
                                    <td><?=$software->getLicense()?></td>
                                    <td><?=$software->getPlatform()?></td>
                                    
                                    
                                    <td><button type="button" class="btn btn-primary">Remove</button></td>
                                </tr>
                                 <?php
                                }
                                ?>
                               
                            </tbody>
                        </table>
                    </div>

                <!-- ================= New Customers ================ -->
                    <div class="recentCustomers" id="RecentCustomertable">
                        <div class="cardHeader">
                            <h2>Recent Customers</h2>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Username</td>
                                    <td>Country</td>
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
                                    </tr>
                                    <?php
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                 <!-- ================= Downloads ================ -->
                    <div class="recentCustomers" id="Softwaretable2" style="display: none;">
                        <div class="cardHeader">
                            <h2>Downloads</h2>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <td>Software name</td>
                                    <td>Devolper Name</td>
                                    <td>Free/Paid</td>

                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Star Refrigerator</td>
                                    <td>$1200</td>
                                    <td>Paid</td>

                                </tr>

                                <tr>
                                    <td>Dell Laptop</td>
                                    <td>$110</td>
                                    <td>Due</td>

                                </tr>

                                <tr>
                                    <td>Apple Watch</td>
                                    <td>$1200</td>
                                    <td>Paid</td>

                                </tr>

                                <tr>
                                    <td>Addidas Shoes</td>
                                    <td>$620</td>
                                    <td>Due</td>

                                </tr>

                                <tr>
                                    <td>Star Refrigerator</td>
                                    <td>$1200</td>
                                    <td>Paid</td>

                                </tr>

                                <tr>
                                    <td>Dell Laptop</td>
                                    <td>$110</td>
                                    <td>Due</td>

                                </tr>

                                <tr>
                                    <td>Apple Watch</td>
                                    <td>$1200</td>
                                    <td>Paid</td>

                                </tr>

                                <tr>
                                    <td>Addidas Shoes</td>
                                    <td>$620</td>
                                    <td>Due</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
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

      });

      // Show the Software table when the "Software mangement" button is clicked
      $("#SoftwareManagementbutton").click(function () {
        $("#Softwaretable1").show();
        $("#Softwaretable2").show();
        $("#RecentCustomertable").hide();
        

      });
      // Show the dashboard table when the "Dashboard" button is clicked
      $("#Dashboardbutton").click(function () {
        $("#Softwaretable1").hide();
        $("#Softwaretable2").hide();
        $("#RecentCustomertable").hide();
        
       
        });

      
    });
   </script>

</body>

</html>