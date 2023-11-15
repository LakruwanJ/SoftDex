<?php
namespace classes;

use PDOException;
use PDO;
require 'DbConnector.php';
use Classes\DbConnector;


class Tutorial{
    private $Tid;
    private $Uid;
    private $title;
    private $text;
    private $Sid;
   
   function __construct( $title, $text) {
    
        $this->title = $title;
        $this->text = $text;
    }

    function getTid() {
        return $this->Tid;
    }

    function getUid() {
        return $this->Uid;
    }

    function getTitle() {
        return $this->title;
    }

    function getText() {
        return $this->text;
    }

    function getSid() {
        return $this->Sid;
    }

    function setTid($Tid) {
        $this->Tid = $Tid;
    }

    function setUid($Uid) {
        $this->Uid = $Uid;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setSid($Sid) {
        $this->Sid = $Sid;
    }

 
 public function selectSw($id) {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT name FROM software";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $id);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            return $rs;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
  public function upload() {
      $dbcon = new DbConnector();
      $con = $dbcon->getConnection();
        try {
            $query = "INSERT INTO tutorial( title, description) VALUES( ?, ?)";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->title);
            $pstmt->bindValue(2, $this->text);
            
            $pstmt->execute();
            return ($pstmt->rowCount() > 0);
        } catch (PDOException $exc) {
            die("Error in upload tutorials: " . $exc->getMessage());
        }
    }
 public static function displayTutorials(){
       $dbcon = new DbConnector();
      $con = $dbcon->getConnection();
     $tutes = array();
     try {
         $query = "SELECT * FROM tutorial";
         $pstmt = $con->prepare($query);
         $pstmt->execute();
         $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
         if(!empty($rs)){
             foreach ($rs as $row) {
                  $tute = new Tutorial($row->title, $row->description);
                
                 $tutes[] = $tute;
             }
         }
     } catch (PDOException $exc) {
         die("Error in display tutorials: ".$exc->getMessage()) ;
     }
     return $tutes;
  }
}
