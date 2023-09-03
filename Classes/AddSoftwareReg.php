<?php

namespace Classes;
use PDOException;
use PDO;
require 'DbConnector.php';
use Classes\DbConnector;

class AddSoftwareReg{
    
    public function addsoftware($softwareName,$version,$platform,$license,$amount,$category,$language,$tags,$systemreq,$shortDescription,$longDescription,$developer,$date,$Sid) {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        
        $query="INSERT INTO software(name, version, platform, license ,category ,amount, language,tags ,systemreq ,shortdescription ,description,developer,date,size,rate,DownCount,Sid) VALUES(?, ?, ?, ? ,? , ?, ? , ? , ?, ?, ?, ?, ?, ?, ?, ?, ? )";

        echo 'aaaaa';
        try{
            $pstmt= $con->prepare($query);
            $pstmt->bindValue(1, $softwareName);
            $pstmt->bindValue(2, $version);
            $pstmt->bindValue(3, $platform);
            $pstmt->bindValue(4, $license);
            $pstmt->bindValue(5, $amount);
            $pstmt->bindValue(6, $category);
            $pstmt->bindValue(7, $language);
            $pstmt->bindValue(8, $tags);
            $pstmt->bindValue(9, $systemreq);
            $pstmt->bindValue(10, $shortDescription);
            $pstmt->bindValue(11, $longDescription);
            $pstmt->bindValue(12, $developer);
            $pstmt->bindValue(13, $date);
            $pstmt->bindValue(14, "1MB");
            $pstmt->bindValue(15, "0.0");
            $pstmt->bindValue(16,  "0");
            $pstmt->bindValue(17,  $Sid);
            
            $a=$pstmt->execute();
            
            if($a>0){
                echo 'Success';
            } else{
                echo 'Failure';
            }
        } catch (PDOException $e) {
            die("Failed to add your data : ").$e->getMessage();

        }
    }
}

