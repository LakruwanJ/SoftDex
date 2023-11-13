<?php

namespace Classes;

use PDOException;
use PDO;

require 'DbConnector.php';

use Classes\DbConnector;

class cusomizedsw{ 
    private $Did;
    private $title;
    private $description;
    private $specialReq;

    function __construct($title, $description, $specialReq) {
        $this->title = $title;
        $this->description = $description;
        $this->specialReq = $specialReq;
    }

    public function selecDev() {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
          /*$query = "SELECT u.username FROM user u JOIN developer d ON u.Uid = d.Uid WHERE d.Did = ?";*/
            $query ="SELECT Did FROM developer";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->Did);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            return $rs;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function request() {
      $dbcon = new DbConnector();
      $con = $dbcon->getConnection();
        try {
            $query = "INSERT INTO customizedSW(Title,Description, SpecialReq) VALUES(?,?,?)";
            $pstmt = $con->prepare($query);
           
         
            $pstmt->bindValue(1, $this->title);
            $pstmt->bindValue(2, $this->description);
            $pstmt->bindValue(3, $this->specialReq);
            $pstmt->execute();
            return ($pstmt->rowCount() > 0);
        } catch (PDOException $exc) {
            die("Error in Customized Software: " . $exc->getMessage());
        }
    }

}
