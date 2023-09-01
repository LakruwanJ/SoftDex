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
            if ($_POST["password"] == $reglog_->login()) {
                session_start();
                $_SESSION["user"] = $_POST["username"];
                header("Location: ../Softdex.php");
            } else {
                header("Location: ../index.php?e=1");
            }
        } else {
            header("Location: ../index.php?e=2");
        }
        
    } else if (isset($_POST["signUp"])) {
        
        if (!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["pWord"]) && !empty($_POST["pWord2"])) {
            $reglog_->reglog1($_POST["username"], $_POST["pWord"], $_POST["email"]);
            if ($_POST["pWord"] !== $_POST["pWord2"]) {
                header("Location: ../index.php?e=3&mode=signup");
            } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                header("Location: ../index.php?e=4&mode=signup");
            } else if ($reglog_->checkUser() > 0) {
                header("Location: ../index.php?e=5&mode=signup");
            } else if ($reglog_->checkemail() > 0) {
                header("Location: ../index.php?e=6&mode=signup");
            } else {
                $reglog_->reg($reglog_->lastId());
                header("Location: ../index.php?e=7&mode=signin");
            }
        } else {
            header("Location: ../index.php?e=8&mode=signup");
        }
        
    } else {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
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

    public function checkUser() {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT COUNT(*) FROM user WHERE username = ?;";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $this->username);
        $pstmt->execute();
        $count = $pstmt->fetchColumn();
        return $count;
    }

    public function checkemail() {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT COUNT(*) FROM user WHERE email = ?;";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $this->email);
        $pstmt->execute();
        $count = $pstmt->fetchColumn();
        return $count;
    }

    public function lastId() {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT Uid FROM user ORDER BY Uid DESC LIMIT 1;";
        $pstmt = $con->prepare($query);
        $pstmt->execute();
        $uid = $pstmt->fetchAll(PDO::FETCH_OBJ);
        foreach ($uid as $value) {
            $lastid = $value->Uid;
        }

        $prefix = substr($lastid, 0, 2); //sw
        $number = (int) substr($lastid, 2);
        $newNumber = $number + 1;
        $output = $prefix . sprintf("%04d", $newNumber); // Combine

        return $output;
    }

    public function reg($id) {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "INSERT INTO user(Uid,username,password,email) VALUES (?,?,?,?)";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $id);
        $pstmt->bindValue(2, $this->username);
        $pstmt->bindValue(3, $this->pw);
        $pstmt->bindValue(4, $this->email);
        $pstmt->execute();

        if ($pstmt->rowCount() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

}
