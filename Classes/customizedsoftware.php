<?php

namespace Classes;

use PDOException;
use PDO;

require 'DbConnector.php';

use Classes\DbConnector;

class cusomizedsw {

    private $Did;
    private $title;
    private $description;
    private $specialReq;
    private $Price;

    function __construct($title, $description, $specialReq, $Price) {
        $this->title = $title;
        $this->description = $description;
        $this->specialReq = $specialReq;
        $this->Price = $Price;
    }

    function getDid() {
        return $this->Did;
    }

    function getTitle() {
        return $this->title;
    }

    function getDescription() {
        return $this->description;
    }

    function getSpecialReq() {
        return $this->specialReq;
    }

    function getprice() {
        return $this->Price;
    }

    function setDid($Did) {
        $this->Did = $Did;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setSpecialReq($specialReq) {
        $this->specialReq = $specialReq;
    }

    function setprice($Price) {
        $this->Price = $Price;
    }

    public function selecDev() {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            /* $query = "SELECT u.username FROM user u JOIN developer d ON u.Uid = d.Uid WHERE d.Did = ?"; */
            $query = "SELECT Did FROM developer";
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
            $query = "INSERT INTO customizedSW(Title,Description, SpecialReq,Price) VALUES(?,?,?,?)";
            $pstmt = $con->prepare($query);


            $pstmt->bindValue(1, $this->title);
            $pstmt->bindValue(2, $this->description);
            $pstmt->bindValue(3, $this->specialReq);
              $pstmt->bindValue(4, $this->Price);
            $pstmt->execute();
            return ($pstmt->rowCount() > 0);
        } catch (PDOException $exc) {
            die("Error in Customized Software: " . $exc->getMessage());
        }
    }

    public static function displayCusSWDetails() {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $customizedsws = array();
        try {
            $query = "SELECT * FROM customizedsw";
            $pstmt = $con->prepare($query);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            if (!empty($rs)) {
                foreach ($rs as $row) {
                    $customizedsw = new cusomizedsw($row->Title, $row->Description, $row->SpecialReq, $row->Price);

                    $customizedsws[] = $customizedsw;
                }
            }
        } catch (PDOException $exc) {
            die("Error in display CuztomizedSW Details: " . $exc->getMessage());
        }
        return $customizedsws;
    }

}
