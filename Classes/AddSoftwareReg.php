<?php

namespace Classes;
use PDOException;
use PDO;
require 'DbConnector.php';
use Classes\DbConnector;

class AddSoftwareReg{
    private $softwareName;
    private $version;
    private $platform;
    private $license;
    private $amount;
     private $category;
    private $language;
    private $tags;
    private $systemreq;
    private $shortDescription;
    private $longDescription;
    private $developer;
    private $date;
    private $size;
    private $rate;
    private $downcount;
    
    public function __construct($softwareName,$version,$platform,$license,$amount,$category,$language,$tags,$systemreq,$shortDescription,$longDescription,$developer,$date,$size,$rate,$downcount) {
        $this->softwareName=$softwareName;
        $this->version=$version;
        $this->platform=$platform;        
        $this->license=$license;
        $this->amount=$amount;
        $this->category=$category;
        $this->language=$language;
        $this->tags=$tags;        
        $this->systemreq=$systemreq;
        $this->shortDescription=$shortDescription;
        $this->longDescription=$longDescription;
        $this->developer=$developer;
        $this->date=$date;
        $this->size=$size;
        $this->rate=$rate;
        $this->downcount=$downcount;
    }
    
    public function addsoftware() {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        
        $query="INSERT INTO software(name, version, platform, license ,category ,amount, language,tags ,systemreq ,shortdescription ,description,developer,date,size,rate,DownCount) VALUES(?, ?, ?, ? ,? , ?, ? , ? , ?, ?, ?, ?, ?, ?, ?, ? )";
        
        try{
            $pstmt= $con->prepare($query);
            $pstmt->bindValue(1, $this->softwareName);
            $pstmt->bindValue(2, $this->version);
            $pstmt->bindValue(3,  $this->platform);
            $pstmt->bindValue(4, $this->license);
            $pstmt->bindValue(5, $this->amount);
            $pstmt->bindValue(6, $this->category);
            $pstmt->bindValue(7, $this->language);
            $pstmt->bindValue(8, $this->tags);
            $pstmt->bindValue(9, $this->systemreq);
            $pstmt->bindValue(10, $this->shortDescription);
            $pstmt->bindValue(11,  $this->longDescription);
            $pstmt->bindValue(12, $this->developer);
            $pstmt->bindValue(13, $this->date);
            $pstmt->bindValue(14, $this->size);
            $pstmt->bindValue(15, $this->rate);
            $pstmt->bindValue(16,  $this->downcount);
            
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

