<?php

require '../Classes/DbConnector.php';

use Classes\DbConnector;
use PDO;

$dbcon = new DbConnector();
$con = $dbcon->getConnection();

if (isset($_POST['username'])) {
    $username = $_POST['username'];


    $query = "SELECT COUNT(*) FROM user WHERE username = ?";
    $pstmt = $con->prepare($query);
    $pstmt->bindValue(1, $username);
    $pstmt->execute();
    $count = $pstmt->fetchColumn();

    if ($count > 0) {
        // Username already taken
        echo 'taken';
    } else {
        // Username is available
        echo 'available';
    }
} else {
    // Handle invalid requests or no POST data
    echo 'invalid_request';
}
?>
