<?php

require '../Classes/DbConnector.php';

use Classes\DbConnector;

$dbcon = new DbConnector();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["BecomeaDeveloper"])) {
        
        if (!empty($_POST['lang']) || !empty($_POST['prolang']) || !empty($_POST['shortDescription']) || !empty($_POST['education']) || !empty($_POST['experience'])|| !empty($_POST['Description']) ) {//||  !empty($_POST['password']) )
            
            $languages = $_POST['lang'];
            $prolanguages = $_POST['prolang'];
            $shortDescription = $_POST['shortDescription'];
            $education = $_POST['education'];
            $experience = $_POST['experience'];
            $Description =$_POST['Description'];

            $con = $dbcon->getConnection();

            $sql = "INSERT INTO developer(languages, prolang ,shortdes,education , experience , description ) VALUES(?, ?, ?, ?, ?, ?)";
            $pstmt = $con->prepare($sql);
            $pstmt->bindValue(1, $languages);
            $pstmt->bindValue(2, $prolanguages);
            $pstmt->bindValue(3, $shortDescription);
            $pstmt->bindValue(4, $education);
            $pstmt->bindValue(5, $experience);
            $pstmt->bindValue(6, $Description);
            $pstmt->execute();

            if ($pstmt->rowCount() > 0) {
                return 1;
                
                echo 'Successfully added data';
                
            } else {
                return 0;
            }
        }
    }
    
}

