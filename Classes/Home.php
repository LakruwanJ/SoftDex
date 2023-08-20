<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Classes;

require './Classes/DbConnector.php';

use Classes\DbConnector;
use PDO;

$dbcon = new DbConnector();

class Home {

    public function selectPlat() {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT name FROM platforms ORDER BY priority LIMIT 5";
        $pstmt = $con->prepare($query);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }

    public function selectPlatSw($plat) {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT Sid, name, u.username, license,rate FROM software s JOIN developer d ON s.developer = d.Did JOIN user u ON d.user = u.Uid WHERE platform = ? LIMIT 6";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $plat);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }

}
