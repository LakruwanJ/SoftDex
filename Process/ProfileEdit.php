<?php

require '../Classes/DbConnector.php';

use Classes\DbConnector;

$dbcon = new DbConnector();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["createProfile"])) {
        
        if (!empty($_POST['firstname']) || !empty($_POST['lastname']) || !empty($_POST['email']) || !empty($_POST['country']) || !empty($_POST['user'])) {//||  !empty($_POST['password']) )
            $uname = $_POST['user'];
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $email = $_POST['email'];
            $country = $_POST['country'];

            $con = $dbcon->getConnection();

            $sql = "UPDATE user SET fname=?,lname=?,email=?,country=? WHERE username=?";
            $pstmt = $con->prepare($sql);
            $pstmt->bindValue(1, $fname);
            $pstmt->bindValue(2, $lname);
            $pstmt->bindValue(3, $email);
            $pstmt->bindValue(4, $country);
            $pstmt->bindValue(5, $uname);
            $pstmt->execute();

            if ($pstmt->rowCount() > 0) {
                header("Location: ../pages/CreateProfile.php?m=1");
            } else {
                header("Location: ../pages/CreateProfile.php?m=2");
            }
        }
    } else if (isset($_POST["BecomeaDeveloper"])) {
        
        if (!empty($_POST['firstname']) || !empty($_POST['lastname']) || !empty($_POST['email']) || !empty($_POST['country']) || !empty($_POST['user'])) {//||  !empty($_POST['password']) )
            $uname = $_POST['user'];
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $email = $_POST['email'];
            $country = $_POST['country'];

            $con = $dbcon->getConnection();

            $sql = "UPDATE user SET fname=?,lname=?,email=?,country=? WHERE username=?";
            $pstmt = $con->prepare($sql);
            $pstmt->bindValue(1, $fname);
            $pstmt->bindValue(2, $lname);
            $pstmt->bindValue(3, $email);
            $pstmt->bindValue(4, $country);
            $pstmt->bindValue(5, $uname);
            $pstmt->execute();

            if ($pstmt->rowCount() > 0) {
                header("Location: ../pages/CreateProfile.php?m=1");
            } else {
                header("Location: ../pages/CreateProfile.php?m=2");
            }
        }
        
    }
    
    
  
}
$con = null;
?>



