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
                
                //add a profile picture
                 $file = $_FILES['profilepic'];
   
    
    // User-specific folder based on user's ID or username
    $userFolder = '../img/user/' . $uname; // Replace $userId with the user's identifier

    // Create the user folder if it doesn't exist
    if (!file_exists($userFolder)) {
        mkdir($userFolder, 0777, true);
    }
    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
     $newFilename = $uname."." . $fileExtension;
    // Move the uploaded file to the user's folder
    $targetPath = $userFolder . '/' . $newFilename;
    move_uploaded_file($file['tmp_name'], $targetPath);
    if (file_exists($targetPath)) {
    // Display the uploaded image in the profile picture container
    echo '<div class="profile-pic-container">';
    echo '<img src="' . $targetPath . '" alt="Profile Picture">';
    echo '</div>';
}
                
                
                
                header("Location: ../pages/CreateProfile.php?m=1");
            } else {
                header("Location: ../pages/CreateProfile.php?m=2");
            }
        }
    } 
}
?>



