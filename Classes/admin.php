<?php

namespace Classes;

use PDO;
use PDOException;

class admin {

    private $fname;
    private $lname;
    private $email;
    private $username;
    private $country;
    private $name;
    private $amount;
    private $developer;
    private $license;
    private $platform;
    private $date;
    private $software;
    private $shortdes;
    private $Did;



    public function __construct($fname, $lname, $email, $username, $country, $name, $amount, $developer, $license, $platform, $date,$software,$shortdes,$Did) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->username = $username;
        $this->country = $country;
        $this->name = $name;
        $this->amount = $amount;
        $this->developer = $developer;
        $this->license = $license;
        $this->platform = $platform;
        $this->software = $software;
        $this->date = $date;
        $this->shortdes=$shortdes;
        $this->Did=$Did;
    }

    public function getFname() {
        return $this->fname;
    }

    public function getLname() {
        return $this->lname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getName() {
        return $this->name;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getDeveloper() {
        return $this->developer;
    }

    public function getLicense() {
        return $this->license;
    }

    public function getPlatform() {
        return $this->platform;
    }

    public function getDate() {
        return $this->date;
    }
    public function getSoftware() {
        return $this->software;
    }
    public function getShortdes() {
        return $this->shortdes;
    }
     public function getDid() {
        return $this->Did;
    }
    
    

    public function setFname($fname) {
        $this->fname = $fname;
    }

    public function setLname($lname) {
        $this->lname = $lname;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function setDeveloper($developer) {
        $this->developer = $developer;
    }

    public function setLicense($license) {
        $this->license = $license;
    }

    public function setPlatform($platform) {
        $this->platform = $platform;
    }

    public function setDate($date) {
        $this->date = $date;
    }
     public function setSoftware($software) {
        $this->software = $software;
    }
     public function setShortdes($shortdes) {
        $this->shortdes = $shortdes;
    }
     public function setDid($Did) {
        $this->did = $Did;
    }

    public static function viewuserdetails($con) {
        $users = array();
        try {
            $uquery = "SELECT * FROM user";
            $pstmt = $con->prepare($uquery);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            if (!empty($rs)) {
                foreach ($rs as $row) {
                    $user = new admin(
                            $row->fname, $row->lname, $row->email, $row->username, $row->country, '', '', '', '', '', '','','',''
                    );
                    $users[] = $user;
                }
            }
        } catch (PDOException $exc) {
            die("Error: " . $exc->getMessage());
        }
        return $users;
    }

    public static function viewallsoftware($con) {
        $softwares = array();
        try {
            $squery = "SELECT * FROM software";
            $pstmt = $con->prepare($squery);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            if (!empty($rs)) {
                foreach ($rs as $row) {
                    $software = new admin(
                            '', '', '', '', '', $row->name, $row->amount, $row->developer, $row->license, $row->platform, $row->date,'','',''
                    );

                    $softwares[] = $software;
                }
            }
        } catch (PDOException $exc) {
            die("Error: " . $exc->getMessage());
        }
        return $softwares;
    }

    public static function viewalldownloads($con){
        $downloads = array();
        try {
           $dquery = "SELECT * FROM  downloads";
           $pstmt = $con->prepare($dquery);
           $pstmt->execute();
           $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
           if(!empty($rs)){
               foreach ($rs as $row){
                   $download = new admin('','','','','','','','','','',$row->date,$row->software,'','');
                   $downloads [] = $download;
               } 
           }
        } catch (PDOException $exc) {
            die("Error: ". $exc->getMessage());
        }
        return $downloads;
        }
        
        
        public static function viewalldeveloper($con){
            $developer = array();
            try {
                $dequery = "SELECT * FROM developer";
                $pstmt = $con->prepare($dequery);
                $pstmt->execute();
                $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
                if(!empty($rs)){
                    foreach ($rs as $row){
                        $developer = new admin('','','','','','','','','','','','',$row->shortdes,$row->Did);
                        $developers[] = $developer;
                    }
                }
                
            } catch (PDOException $exc) {
                die("Error:". $exc->getMessage());
            }
            return $developers;
                }



}
