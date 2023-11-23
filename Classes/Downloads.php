<?php

/**
 * Description of Downloads
 *
 * @author lakru
 */

namespace Classes;

require 'DbConnector.php';

//require './Classes/DbConnector.php';

use Classes\DbConnector;
use PDO;

$down = new Downloads();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $user = $_POST["user"];
            $sw = $_POST["sw"];
            $dc = $_POST["dc"];
            $sname = $_POST["name"];
            try {
                $a = $down->addDown($sw, $user);
                $b = $down->countDown($sw, $dc);
                if ($a > 0 && $b > 0) {
                    header("Location: ../img/sw/".$sw."/".$sname.".zip");
                }
            } catch (PDOException $exc) {
            }
        }

class Downloads {

    private $software;
    private $user;
    private $downcount;

    function getSoftware() {
        return $this->software;
    }

    function getUser() {
        return $this->user;
    }
    
    function getDowncount() {
        return $this->downcount;
    }

    public function addDown($software,$user) {
        $dbcon = new DbConnector();

        try {
            $con = $dbcon->getConnection();
            
            $query = "INSERT INTO downloads (software, username, date) VALUES(?, ?, ?)";
            
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $software);
            $pstmt->bindValue(2, $user);
            $pstmt->bindValue(3, date('Y-m-d'));
            $pstmt->execute();

            if ($pstmt->rowCount() > 0) {
                return 1;
            } else {
                return 0;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function countDown($software,$dc) {
        $dbcon = new DbConnector();

        try {
            $con = $dbcon->getConnection();
            
            $query = "UPDATE software SET DownCount = ? WHERE Sid = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $dc + 1);
            $pstmt->bindValue(2, $software);
            $pstmt->execute();

            if ($pstmt->rowCount() > 0) {
                return 1;
            } else {
                return 0;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
