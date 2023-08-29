<?php
require_once '../Classes/DbConnector.php'; // Adjust the path as needed
use Classes\DbConnector;
$dbConnector = new DbConnector();

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
                    <a  href="#">
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
                        <div class="numbers">1,504</div>
                        <div class="cardName">Users</div>
                    </div>

                    <div >
                        <img src="../img/user.png" alt=""  width="50px" height="50px">
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Devolpers</div>
                    </div>

                    <div >
                        <img src="../img/devoloper.png" alt=""  width="60px" height="60px">
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Softwares</div>
                    </div>

                    <div>
                        <img src="../img/software.png" alt=""  width="50px" height="50px">
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">7,842</div>
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
                                try {
                                $dbConnection = $dbConnector->getConnection();
                                $softwareQuery = "SELECT * FROM software";
                                $spstmt = $dbConnection->prepare($softwareQuery);
                                $spstmt->execute();
                                $rs = $spstmt->fetchAll(PDO::FETCH_OBJ);
                                foreach ($rs as $software){
                                ?>
                                <tr>
                                    <td><?php echo $software->name; ?></td>
                                    <td><?php echo $software->amount; ?></td>
                                    <td><?php echo $software->developer; ?></td>
                                    <td><?php echo $software->license; ?></td>
                                    <td><?php echo $software->platform; ?></td>
                                     <td><button type="button" class="btn btn-primary">Remove</button></td>
                                </tr>
                                  <?php
                                }
                                } catch (PDOException $exc) {
                                echo $exc->getMessege();
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
                                try {
                                $dbConnection = $dbConnector->getConnection();
                                $userQuery = "SELECT * FROM user";
                                $upstmt = $dbConnection->prepare($userQuery);
                                $upstmt->execute();
                                $rs = $upstmt->fetchAll(PDO::FETCH_OBJ);
                                foreach ($rs as $user){
                                ?>
                                <tr>
                                    <td><?php echo $user->fname." ".$user->lname; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo $user->username; ?></td>
                                    <td><?php echo $user->country; ?></td>
                                     <td><button type="button" class="btn btn-primary">edit</button></td>
                                </tr>
                                  <?php
                                }
                                } catch (PDOException $exc) {
                                echo $exc->getMessege();
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
    <script src="assets/js/main.js"></script>

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

      // Show the travelers table when the "User management" button is clicked
      $("#Usermanagementbutton").click(function () {
        $("#RecentCustomertable").show();
        $("#Softwaretable1").hide();
        $("#Softwaretable2").hide();

      });

      // Show the agencies table when the "Software mangement" button is clicked
      $("#SoftwareManagementbutton").click(function () {
        $("#Softwaretable1").show();
        $("#Softwaretable2").show();
        $("#RecentCustomertable").hide();
        

      });

      
    });
   </script>

</body>

</html>