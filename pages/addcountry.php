<?php

require_once '../Classes/DbConnector.php';
use Classes\DbConnector;
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = $_POST['countryName'];

    

    try {
        
        $dbConnector = new DbConnector();
        $connection = $dbConnector->getConnection();

        
        $pstmt = $connection->prepare("INSERT INTO country (Name) VALUES (?)");
        $pstmt->bindValue(1, $name);
        $pstmt->execute();

        
        if ($pstmt->rowCount()>0) {
            echo "Success";
        }
    } catch (PDOException $e) {
        die("Error  ". $e->getMessage());
    }

   
}
        ?>
    </body>
</html>
