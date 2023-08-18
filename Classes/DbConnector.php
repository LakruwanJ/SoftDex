<?php

namespace Classes;
use PDOException;
use PDO;

class DbConnector {

    private $host = "localhost";
    private $dbname = "softdex";
    private $dbuser = "SoftDex";
    private $dbpw = "#SoftDex23";

    public function getConnection() {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";
        try {
            $con = new PDO($dsn, $this->dbuser, $this->dbpw);
            return $con;
        } catch (PDOException $exc) {
            die("ERROR: ".$exc->getMessage());
        }
    }

}
