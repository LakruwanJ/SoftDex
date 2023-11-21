<?php

require '../Classes/DbConnector.php';

use Classes\DbConnector;

session_start();
$dbcon = new DbConnector();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $con = $dbcon->getConnection();

    // insert web review in review table
    if (isset($_POST["webrate"])) {

        $user_name = $_POST["user_name"];
        $user_rating = $_POST["web_rating_data"];
        $feedback = $_POST["user_review"];
        $datetime = time();

        $query = "INSERT INTO feedback(username, user_rating, user_review, datetime) VALUES (?, ?, ?, ?)";
        $statement = $con->prepare($query);
        $statement->bindValue(1, $user_name);
        $statement->bindValue(2, $user_rating);
        $statement->bindValue(3, $feedback);
        $statement->bindValue(4, $datetime);

        $statement->execute();
        if ($statement->rowCount() > 0) {
            $msg = "Your Review & Rating Successfully Submitted";
        } else {
            $msg = "Have some error in Database";
        }


        echo $msg;
    }

    // get user review
    if (isset($_POST["action"])) {
        $average_rating = 0;
        $total_review = 0;
        $five_star_review = 0;
        $four_star_review = 0;
        $three_star_review = 0;
        $two_star_review = 0;
        $one_star_review = 0;
        $total_user_rating = 0;
        $review_content = array();

        $query = "SELECT * FROM feedback ORDER BY Fid DESC";
        $statement = $con->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $review_content[] = array(
                'user_name' => $row["username"],
                'user_review' => $row["user_review"],
                'rating' => $row["user_rating"],
                'datetime' => date('l jS, F Y h:i:s A', $row["datetime"])
            );

            if ($row["user_rating"] == '5') {
                $five_star_review++;
            }

            if ($row["user_rating"] == '4') {
                $four_star_review++;
            }

            if ($row["user_rating"] == '3') {
                $three_star_review++;
            }

            if ($row["user_rating"] == '2') {
                $two_star_review++;
            }

            if ($row["user_rating"] == '1') {
                $one_star_review++;
            }

            $total_review++;

            $total_user_rating = $total_user_rating + $row["user_rating"];
        }

        $average_rating = $total_user_rating / $total_review;

        $output = array(
            'average_rating' => number_format($average_rating, 1),
            'total_review' => $total_review,
            'five_star_review' => $five_star_review,
            'four_star_review' => $four_star_review,
            'three_star_review' => $three_star_review,
            'two_star_review' => $two_star_review,
            'one_star_review' => $one_star_review,
            'review_data' => $review_content
        );

        echo json_encode($output);
    }
    
    // insert sw review
    if (isset($_POST['software'])) {
        $set_name = $_POST["set_name"];
        $user_name = $_POST["user_name"];
        $user_rating = $_POST["web_rating_data"];
        $feedback = $_POST["user_review"];
        $datetime = time();
        
       //echo "$set_name , $user_name, $user_rating, $feedback, $datetime";
        $query = "INSERT INTO ratesw(sw_name, username, user_rating, user_review, datetime) VALUES (?,?,?,?,?)";
        $statement = $con->prepare($query);
        $statement->bindValue(1, $set_name);
        $statement->bindValue(2, $user_name);
        $statement->bindValue(3, $user_rating);
        $statement->bindValue(4, $feedback);
        $statement->bindValue(5, $datetime);

        $statement->execute();
        if ($statement->rowCount() > 0) {
            $msg = "Your Review & Rating Successfully Submitted";
        } else {
            $msg = "Have some error in Database";
        }
     
        echo $msg;
        
    }
    
    
    //SW_R view 
    if (isset($_POST["action_sw"])) {
        $average_rating = 0;
        $total_review = 0;
        $five_star_review = 0;
        $four_star_review = 0;
        $three_star_review = 0;
        $two_star_review = 0;
        $one_star_review = 0;
        $total_user_rating = 0;
        $review_content = array();

        $query = "SELECT * FROM ratesw ORDER BY id DESC";
        $statement = $con->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $review_content[] = array(
                'user_name' => $row["username"],
                'user_review' => $row["user_review"],
                'rating' => $row["user_rating"],
                'datetime' => date('l jS, F Y h:i:s A', $row["datetime"])
            );

            if ($row["user_rating"] == '5') {
                $five_star_review++;
            }

            if ($row["user_rating"] == '4') {
                $four_star_review++;
            }

            if ($row["user_rating"] == '3') {
                $three_star_review++;
            }

            if ($row["user_rating"] == '2') {
                $two_star_review++;
            }

            if ($row["user_rating"] == '1') {
                $one_star_review++;
            }

            $total_review++;

            $total_user_rating = $total_user_rating + $row["user_rating"];
        }

        $average_rating = $total_user_rating / $total_review;

        $output = array(
            'average_rating' => number_format($average_rating, 1),
            'total_review' => $total_review,
            'five_star_review' => $five_star_review,
            'four_star_review' => $four_star_review,
            'three_star_review' => $three_star_review,
            'two_star_review' => $two_star_review,
            'one_star_review' => $one_star_review,
            'review_data' => $review_content
        );

        echo json_encode($output);
    }
    
    // insert dev review 
    if (isset($_POST['dev'])) {
        $dev_name = $_POST["dev_name"];
        $user_name = $_POST["user_name"];
        $user_rating = $_POST["web_rating_data"];
        $feedback = $_POST["user_review"];
        $datetime = time();
        
       echo "$set_name , $user_name, $user_rating, $feedback, $datetime";
        $query = "INSERT INTO `ratedev` (`dev_name`, `username`, `user_rating`, `user_review`, `datetime`) VALUES (?,?,?,?,?)";
        $statement = $con->prepare($query);
        $statement->bindValue(1, $dev_name);
        $statement->bindValue(2, $user_name);
        $statement->bindValue(3, $user_rating);
        $statement->bindValue(4, $feedback);
        $statement->bindValue(5, $datetime);

        $statement->execute();
        if ($statement->rowCount() > 0) {
            $msg = "Your Review & Rating Successfully Submitted";
        } else {
            $msg = "Have some error in Database";
        }
     
        echo $msg;
        
    }
}
