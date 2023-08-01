<?php

namespace Classes;

use PDOException;
use PDO;

require 'DbConnector.php';

use Classes\DbConnector;

$limit = 10;
$filter;
$order;
class SchRes {

    public function sch($name) {
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT Sid,name,shortdescription,platform,developer,license,amount,language FROM software WHERE "
                    . "name LIKE '%" . $name . "%'"
                    . "OR category LIKE '%" . $name . "%'"
                    . "OR tags LIKE '%" . $name . "%'"
                    . "OR shortdescription LIKE '%" . $name . "%'"
                    . $filter
                    . $order
                    . "LIMIT ".$limit;
            echo $query;
            $pstmt = $con->prepare($query);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            return $rs;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
