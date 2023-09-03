<?php
require '../Classes/DbConnector.php';

use Classes\DbConnector;

$dbcon = new DbConnector();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST["username"];
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            try {
                $con = $dbcon->getConnection();
                $query = "UPDATE user SET fname='aa', lname='aa' WHERE username=?";
                $pstmt = $con->prepare($query);
                $pstmt->bindValue(1, $fname);
                $pstmt->bindValue(2, $lname);
                $pstmt->bindValue(3, $username);

                $pstmt->execute();
                if ($pstmt->rowCount() > 0) {
                    echo "Success";
                }
            } catch (PDOException $exc) {
                die("Error:" . $exc->getMessage());
            }
        }
        ?>

    </body>

</html>
