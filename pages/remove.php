<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../Classes/DbConnector.php';

use Classes\DbConnector;

// Check if the software_id parameter is present in the URL
if (isset($_GET['name'])) {
    // Retrieve the software_id from the URL
    $softwarename = $_GET['name'];

    try {
        $dbConnector = new DbConnector();
        $con = $dbConnector->getConnection();

        // Prepare and execute a SQL query to delete the software record
        $pstmt = $con->prepare("DELETE FROM software WHERE name = ?");
        $pstmt->execute([$softwarename]);

        // Check if the deletion was successful
        if ($pstmt->rowCount() > 0) {
            echo "Software has been removed successfully.";
        } else {
            echo "Software was not found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No software ID provided in the URL.";
}
?>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

