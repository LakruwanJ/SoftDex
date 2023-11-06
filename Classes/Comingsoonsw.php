<?php

namespace Classes;

use PDO;
use PDOException;

class Comingsoonsw {

    private $devname;
    private $swname;
    private $details;
    private $dateofrelease;

    public function __construct($devname, $swname, $details, $dateofrelease) {
        $this->devname = $devname;
        $this->swname = $swname;
        $this->details = $details;
        $this->dateofrelease = $dateofrelease;
    }

    public function getDevname() {
        return $this->devname;
    }

    public function getSwname() {
        return $this->swname;
    }

    public function getDetails() {
        return $this->details;
    }

    public function getDateofrelease() {
        return $this->dateofrelease;
    }

    public function setDevname($devname) {
        $this->devname = $devname;
    }

    public function setSwname($swname) {
        $this->swname = $swname;
    }

    public function setDetails($details) {
        $this->details = $details;
    }

    public function setDateofrelease($dateofrelease) {
        $this->dateofrelease = $dateofrelease;
    }

    public function comingsoonswregister() {
        $dbcon = new DbConnector();


        try {
            $con = $dbcon->getConnection();
            $query = "INSERT INTO comingsoon (devname, swname, details, dateofrelease) VALUES(?, ?, ?, ?)";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->devname);
            $pstmt->bindValue(2, $this->swname);
            $pstmt->bindValue(3, $this->details);
            $pstmt->bindValue(4, $this->dateofrelease);
            $pstmt->execute();

            if ($pstmt->rowCount() > 0) {
                echo "You are successfuly insert your software to comingsoon software catogory";
            } else {
                echo "Error occoured";
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public static function displaycomingsoonsw($con) {
        $comingsoonsws = array();
        try {
            $query = "SELECT * FROM comingsoon";
            $pstmt = $con->prepare($query);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            if (!empty($rs)) {
                foreach ($rs as $row) {
                    $comingsoonsw = new Comingsoonsw($row->devname, $row->swname, $row->details, $row->dateofrelease);
                    $comingsoonsws[] = $comingsoonsw;
                }
            }
        } catch (PDOException $exc) {
            die("Error occred in Comingsoonsw class's displaycoimgsoonsw method" . $exc->getMessage());
        }
        return $comingsoonsws;
    }

}
