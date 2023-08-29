<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Classes;

require 'DbConnector.php';

use Classes\DbConnector;
use PDO;

class Home {

    public function countSw() {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT COUNT(Sid) FROM software;";
        $pstmt = $con->prepare($query);
        $pstmt->execute();
        $count = $pstmt->fetchColumn();
        echo $count;
    }

    public function countUser() {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT COUNT(Uid) FROM user;";
        $pstmt = $con->prepare($query);
        $pstmt->execute();
        $count = $pstmt->fetchColumn();
        echo $count;
    }

    public function countDev() {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT COUNT(Did) FROM developer;";
        $pstmt = $con->prepare($query);
        $pstmt->execute();
        $count = $pstmt->fetchColumn();
        echo $count;
    }

    public function countDown() {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT COUNT(Downid) FROM downloads;";
        $pstmt = $con->prepare($query);
        $pstmt->execute();
        $count = $pstmt->fetchColumn();
        echo $count;
    }

    public function selectPlat() {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT name FROM platforms ORDER BY priority LIMIT 5";
        $pstmt = $con->prepare($query);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }

    public function selectPlatSwT($plat) {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT Sid, name, u.username, license,rate "
                . "FROM software s JOIN developer d ON s.developer = d.Did JOIN user u ON d.user = u.Uid "
                . "WHERE platform = ? ORDER BY DownCount DESC LIMIT 6";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $plat);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }

    public function selectPlatSwM($plat) {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT Sid, name, u.username, license,rate,rate * DownCount AS pop "
                . "FROM software s JOIN developer d ON s.developer = d.Did JOIN user u ON d.user = u.Uid "
                . "WHERE platform = ? ORDER BY pop DESC LIMIT 6";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $plat);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }

    public function selectTrendS() {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT s.Sid, s.name, u.username, s.license, s.rate, COUNT(q.software) AS DownloadCount "
                . "FROM software s JOIN developer d ON s.developer = d.Did JOIN user u ON d.user = u.Uid "
                . "LEFT JOIN downloads q ON s.Sid = q.software AND (q.date) >= (CURRENT_DATE - INTERVAL 30 DAY) "
                . "GROUP BY s.Sid, s.name, u.username, s.license, s.rate "
                . "ORDER BY DownloadCount DESC "
                . "LIMIT 5";
        $pstmt = $con->prepare($query);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }
    
    public function selectTrendG() {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT s.Sid, s.name, u.username, s.license, s.rate, COUNT(q.software) AS DownloadCount "
                . "FROM software s JOIN developer d ON s.developer = d.Did JOIN user u ON d.user = u.Uid "
                . "LEFT JOIN downloads q ON s.Sid = q.software AND (q.date) >= (CURRENT_DATE - INTERVAL 30 DAY) "
                . "GROUP BY s.Sid, s.name, u.username, s.license, s.rate "
                . "ORDER BY DownloadCount DESC "
                . "LIMIT 5";
        $pstmt = $con->prepare($query);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }

}
