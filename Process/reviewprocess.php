<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require '../Classes/DbConnector.php';

use Classes\DbConnector;
session_start();
$dbcon = new DbConnector();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = "";
    if(isset( $_SESSION["user"])){
        
        $username=$_SESSION["user"];
    } else {
       $username="Anonymous" ;
    }
    
            
            $email = $_POST['email'];
            $feedback = $_POST['feedback'];
            
            
             $con = $dbcon->getConnection();

            $sql = "INSERT INTO feedback (username,email,feedback) VALUES (?,?,?)";
            $pstmt = $con->prepare($sql);
            $pstmt->bindValue(1, $username);
            $pstmt->bindValue(2, $email);
            $pstmt->bindValue(3, $feedback);
            
            $pstmt->execute();

            if ($pstmt->rowCount() > 0) {
                return 1;
            } else {
                return 0;
            }
}
