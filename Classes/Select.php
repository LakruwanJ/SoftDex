<?php

namespace Classes;

use PDOException;
use PDO;

require 'DbConnector.php';

use Classes\DbConnector;

class Select {

    public function selectSw($id) {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT * FROM software WHERE Sid=?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $id);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            return $rs;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function CheckDeveloper($id) {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT d.Did FROM developer d JOIN  user u ON u.Uid = d.user WHERE u.Uid = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $id);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        
        foreach ($rs as $value) {
            $text = $value->wishlist;
        }
        return $text;
    }
    
    public function selectDeveloper($id) {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT * FROM developer d JOIN user u ON u.Uid = d.user WHERE u.username = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $id);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            return $rs;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function selectUser($id) {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT * FROM user WHERE username=?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $id);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            return $rs;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function selectDev($id) {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT u.username, d.datesince "
                    . "FROM user u JOIN developer d ON u.Uid = d.user "
                    . "WHERE d.Did = ?";            
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $id);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            return $rs;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    

}
