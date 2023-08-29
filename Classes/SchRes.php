<?php

namespace Classes;

use PDOException;
use PDO;

use Classes\DbConnector;


class SchRes {

    public function sch($name, $pageNum, $rows, $opP, $opL, $opLA, $srt) {

        $previousRows = ($pageNum - 1) * $rows;
        $filter0 = 'ORDER BY s.'.$srt;
        
        if ($opP != NULL) {
            $filter1 = 'AND platform = "'.$opP.'"';
        } else {
            $filter1=NULL;
        }
        if ($opL != NULL) {
            $filter2 = 'AND license = "'.$opL.'"';
        } else {
            $filter2=NULL;
        }
        if ($opLA != NULL) {
                $filter3 = 'AND language = "'.$opLA.'"';
        } else {
            $filter3=NULL;
        }
        
        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT Sid,name,shortdescription,platform,u.username,license,amount,language "
                    . "FROM software s JOIN developer d ON s.developer = d.Did JOIN user u ON d.user = u.Uid WHERE "
                    . "(name LIKE '%" . $name . "%'"
                    . "OR category LIKE '%" . $name . "%'"
                    . "OR tags LIKE '%" . $name . "%'"
                    . "OR shortdescription LIKE '%" . $name . "%')"
                    . $filter1 . $filter2 . $filter3 .$filter0. ' '
                    . "LIMIT $previousRows, $rows";
            echo $query;
            $pstmt = $con->prepare($query);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            return $rs;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTotalRows($name,$opP, $opL, $opLA) {
        
        if ($opP != NULL) {
            $filter1 = 'AND platform = "'.$opP.'"';
        } else {
            $filter1=NULL;
        }
        if ($opL != NULL) {
            $filter2 = 'AND license = "'.$opL.'"';
        } else {
            $filter2=NULL;
        }
        if ($opLA != NULL) {
                $filter3 = 'AND language = "'.$opLA.'"';
        } else {
            $filter3=NULL;
        }

        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT COUNT(name) AS numrows FROM software WHERE "
                    . "(name LIKE '%" . $name . "%'"
                    . "OR category LIKE '%" . $name . "%'"
                    . "OR tags LIKE '%" . $name . "%'"
                    . "OR shortdescription LIKE '%" . $name . "%')"
                    . $filter1 . $filter2 . $filter3 ;
            $pstmt = $con->prepare($query);
            $pstmt->execute();
            $row = $pstmt->fetch(PDO::FETCH_OBJ);
            return $row->numrows;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
