<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Classes;

use PDOException;
use PDO;

require 'DbConnector.php';

use Classes\DbConnector;

$reglog_ = new reglog();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["signIn"])) {
        if (!empty($_POST["username"]) && !empty($_POST["password"])) {
            $reglog_->reglog2($_POST["username"]);
            if ($_POST["password"] == $reglog_->login() ){
                session_start();
                $_SESSION["user"] = $_POST["username"];
                header("Location: ../Softdex.php");
            } else {
                header("Location: ../index.php?e=1&mode=signin");
            }
        } else {
            header("Location: ../index.php?e=2");
        }
    } else {
        header("Location: ../index.php?e=3");
    }

//    if (isset($_POST["signUp"])) {
//        if (!empty($_POST["username"]) && !empty($_POST["password"])) {
//            if ($_POST["password"] == $reglog_->login($username)) {
//                session_start(); 
//                $_SESSION["user"] = $_POST["username"];
//                header("Location: ../Softdex.php");                
//            }else{
//                header("Location: ../index.php?e=1");
//            }           
//        }else{
//            header("Location: ../index.php?e=2");
//        }
//    } else {
//        header("Location: ../index.php?e=3");
//    }
} else {
    header("Location: ../index.php?e=4");
}

class reglog {

    private $username;
    private $pw_;
    private $email;

    function reglog1($username, $pw, $email) {
        $this->username = $username;
        $this->pw = $pw;
        $this->email = $email;
    }

    function reglog2($username) {
        $this->username = $username;
    }

    public function login() {
        $pww = null;
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT password FROM user WHERE username = ?;";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $this->username);
        $pstmt->execute();
        $pw = $pstmt->fetchAll(PDO::FETCH_OBJ);
        foreach ($pw as $value) {
            $pww = $value->password;
        }
        return $pww;
    }

}
