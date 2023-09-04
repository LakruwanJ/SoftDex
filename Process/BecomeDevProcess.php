<?php

require '../Classes/Select.php';

use Classes\DbConnector;
use Classes\Select;

$dbcon = new DbConnector();
$select = new Select();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["BecomeaDeveloper"])) {
        if (!empty($_POST['lang']) || !empty($_POST['prolang']) || !empty($_POST['shortDescription']) || !empty($_POST['education']) || !empty($_POST['experience']) || !empty($_POST['Description'])) {//||  !empty($_POST['password']) )

            $user = $_POST['user'];
            $languages = $_POST['lang'];
            $prolanguages = $_POST['prolang'];
            $shortDescription = $_POST['shortDescription'];
            $education = $_POST['education'];
            $experience = $_POST['experience'];
            $description = $_POST['Description'];

            $con = $dbcon->getConnection();

            if ($select->CheckDeveloper($user)) {
                echo "a";

                $sql = "INSERT INTO developer(Did,user ,shortdes,education ,languages ,prolang, experience,description,datasince ) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $pstmt = $con->prepare($sql);
                $pstmt->bindValue(1, $Did);
                $pstmt->bindValue(2, $user);
                $pstmt->bindValue(3, $shortDescription);
                $pstmt->bindValue(4, $education);
                $pstmt->bindValue(5, $languages);
                $pstmt->bindValue(6, $prolanguages);
                $pstmt->bindValue(7, $experience);
                $pstmt->bindValue(8, $description);
                $pstmt->bindValue(9, $datasince);

                $pstmt->execute();
            } else {
                $sql = "UPDATE developer SET shortdes=? , education=?, language=?, prolang=?, experience=?, description=? WHERE Did=? "; 
                $pstmt= $con->prepare($sql);
                $pstmt->bindValue(1, $shortDescription);
                $pstmt->bindValue(2, $education);
                $pstmt->bindValue(3, $languages);
                $pstmt->bindValue(4, $prolanguages);
                $pstmt->bindValue(5, $experience);
                $pstmt->bindValue(6, $description);
                
                $pstmt->execute(); 
                       
            }

            if ($pstmt->rowCount() > 0) {
                
                //add a profile picture
                $file = $_FILES['profilepic'];



                $userFolder = '../img/developer/' . $user; // 


                if (!file_exists($userFolder)) {
                    mkdir($userFolder, 0777, true);
                }
                $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $newFilename = $user . "." . $fileExtension;

                $targetPath = $userFolder . '/' . $newFilename;
                move_uploaded_file($file['tmp_name'], $targetPath);
                if (file_exists($targetPath)) {

                    echo '<div class="profile-pic-container">';
                    echo '<img src="' . $targetPath . '" alt="Profile Picture">';
                    echo '</div>';
                }
                //return 1;

                echo 'Successfully added data';
            } else {
                return 0;
            }
        }
    }
}


