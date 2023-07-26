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
            $query = "SELECT * FROM software WHERE Sid='" . $id . "'";
            $pstmt = $con->prepare($query);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            return $rs;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
