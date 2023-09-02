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
    }


    if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['country'], $_POST['password'], $_POST['experience'], $_POST['skills'], $_POST['user'])) {
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $password = $_POST['password'];
        $experience = $_POST['experience'];
        $skills = $_POST['skills'];
        $category = $_POST['user'];



        $con = $dbcon->getConnection();

        if ($category == 'user') {
            $sql = "INSERT INTO user2 (fname, lname, email, country, password) VALUES (?,?,?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1, $fname);
            $stmt->bindParam(2, $lname);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $country);
            $stmt->bindParam(5, $password);
            $stmt->execute();

            if (($stmt->rowCount()) > 0) {


                echo 'firstname:' . $fname;
                echo 'last name:' . $lname;
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        } else {
            $sql = "INSERT INTO user2 (fname, lname, email, country, password) VALUES (?,?,?,?,?)";
            $stmt1 = $con->prepare($sql);
            $stmt1->bindParam(1, $fname);
            $stmt1->bindParam(2, $lname);
            $stmt1->bindParam(3, $email);
            $stmt1->bindParam(4, $country);
            $stmt1->bindParam(5, $password);
            $stmt1->execute();


            $uid = $con->lastInsertId();
            $sql = "INSERT INTO developer (Uid,experience, education) VALUES (?,?,?) ";
            $stmt2 = $con->prepare($sql);
            $stmt2->bindParam(1, $uid);
            $stmt2->bindParam(2, $experience);
            $stmt2->bindParam(3, $skills);

            $stmt2->execute();

            if (($stmt1->rowCount()) > 0 || ($stmt2->rowCount()) > 0) {


                echo 'firstname:' . $fname;
                echo 'last name:' . $lname;
                echo 'email:' . $email;
                echo 'Experience:' . $experience;
                echo 'Skills:' . $skills;
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        }
    }
}
$con = null;
?>



