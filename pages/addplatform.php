
<?php

require_once '../Classes/DbConnector.php';
use Classes\DbConnector;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = $_POST['platformName'];

    

    try {
        
        $dbConnector = new DbConnector();
        $connection = $dbConnector->getConnection();

        
        $pstmt = $connection->prepare("INSERT INTO platforms (Name) VALUES ?");
        $pstmt->bindValue(1, $name);
        $pstmt->execute();

        
        if ($pstmt->rowCount()>0) {
            header("Location:admindashboard.php");
        }
    } catch (PDOException $e) {
        die("Error  ". $e->getMessage());
    }

   
}
?>

