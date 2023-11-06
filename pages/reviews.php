


<?php

require '../Classes/DbConnector.php';

use Classes\DbConnector;

$dbcon = new DbConnector();



$rs="";

$con = $dbcon ->getConnection();

$sql = "SELECT * FROM feedback";
$pstmt = $con->prepare($sql);
$pstmt->execute();

if ($pstmt->rowCount()>0){
    $rs=$pstmt->fetchAll(PDO::FETCH_OBJ);
}else{
    echo 'Query is incorrect!';
}

?>



<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="../css/Reviews.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>

        <style>
    .review p {
        overflow: hidden; /* Hide any overflowing content */
        white-space: nowrap; /* Prevent text from wrapping */
        text-overflow: ellipsis; /* Display an ellipsis (...) for truncated text */
    }
</style>

    </head>
    <body>
        
        
        
        <div class="Reviews">
            <div class="inner">
                <h2>Reviews</h2>
                
                
                <div class="border"></div>
                <div class="review-button">
        <a href="feedbackform.php">Add Your Review</a>
    </div>
              <div class="container">  
    <div class="row">
        <?php foreach ($rs as $user) {
            $imagefile = "";

            $imageFormats = ['png', 'jpg']; // List of possible image formats
            $imagePath = '../img/user/' . $user->username . "/" . $user->username; // Base path without extension

            foreach ($imageFormats as $format) {
                $imageUrl = $imagePath . '.' . $format;

                if (file_exists($imageUrl)) {
                    $imagefile = $imageUrl;
                    break; // Stop when the first valid image format is found
                }
            }
        ?>
            <div class="col-md-4 mb-4">
                <div class="review">
                    <img src="<?php echo $imagefile; ?>" alt="Person 1">
                    <div class="name"><?php echo $user->username; ?></div>
                    <p>"<?php echo $user->feedback; ?>"</p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
            </div>
        </div>

        <script>
        function scrollToFeedbackForm() {
            const feedbackForm = document.querySelector(".feedback-form");
            feedbackForm.scrollIntoView({ behavior: "smooth" });
        }
    </script>
    </body>
</html>
