<?php



require '../Classes/DbConnector.php';

use Classes\DbConnector;


if (isset($_GET['name'])) {
    
    $softwarename = $_GET['name'];

    try {
        $dbConnector = new DbConnector();
        $con = $dbConnector->getConnection();

       
        $pstmt = $con->prepare("DELETE FROM software WHERE name = ?");
        $pstmt->execute([$softwarename]);

        
        if ($pstmt->rowCount() > 0) {
            echo "Software has been removed successfully.";
        } else {
            echo "Software was not found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No software name provided in the URL.";
}
?>


