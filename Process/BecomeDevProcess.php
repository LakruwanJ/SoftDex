<?php

require '../Classes/DbConnector.php';

use Classes\DbConnector;

$dbcon = new DbConnector();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["BecomeaDeveloper"])) {

        if (!empty($_POST['lang']) || !empty($_POST['prolang']) || !empty($_POST['shortDescription']) || !empty($_POST['education']) || !empty($_POST['experience']) || !empty($_POST['Description'])) {//||  !empty($_POST['password']) )
            $languages = $_POST['lang'];
            $prolanguages = $_POST['prolang'];
            $shortDescription = $_POST['shortDescription'];
            $education = $_POST['education'];
            $experience = $_POST['experience'];
            $Description = $_POST['Description'];

            $con = $dbcon->getConnection();

            if ($x == 1) {

                $sql = "INSERT INTO developer(Did,user ,shortdes,education ,languages ,prolang, experience,description,datasince ) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $pstmt = $con->prepare($sql);
                $pstmt->bindValue(1, $Did);
                $pstmt->bindValue(2, $user);
                $pstmt->bindValue(3, $shortdes);
                $pstmt->bindValue(4, $education);
                $pstmt->bindValue(5, $languages);
                $pstmt->bindValue(6, $prolang);
                $pstmt->bindValue(7, $experience);
                $pstmt->bindValue(8, $description);
                $pstmt->bindValue(9, $datasince);

                $pstmt->execute();
            } else {
                $sql2 = "UPDATE developer SET shortdes=? , education=?, language=?, prolang=?, experience=?, description=?, datasince=? WHERE Did=? "; 
                $pstmt= $con->prepare($sql2);
                $pstmt->bindValue(1, $shortdes)
                       
            }

            if ($pstmt->rowCount() > 0) {
                return 1;

                echo 'Successfully added data';
            } else {
                return 0;
            }
        }
    }
}


