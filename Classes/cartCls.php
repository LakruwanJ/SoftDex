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

$cartObj = new cartCls();
$text = NULL;



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["addtocart"])) {

        if (!empty($_POST["user"]) && !empty($_POST["sw"])) {

            $cartObj->cartCls($_POST["user"], $_POST["sw"]);
            
            if (empty($cartObj->getcart())) {
                $cartObj->additemtocart($cartObj->getcart());
            } else {
                $namesArray = explode("|", $cartObj->getcart());
                foreach ($namesArray as $value) {
                    if ($_POST["sw"]===$value){
                        header("Location: ../pages/software.php?id=".$_POST["sw"]);
                        break;
                     } else {
                        $cartObj->additemtocart($cartObj->getcart());
                    }
                }

            }
        }
    }
}

class cartCls {

    private $user;
    private $softwareid;

    public function cartCls1($user) {
        $this->user = $user;
    }
    
    public function cartCls($user, $softwareid) {
        $this->user = $user;
        $this->softwareid = $softwareid;
    }

    public function additemtocart($text) {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $sql = "UPDATE user SET cart=? WHERE username=?";
        if ($text === null) {
            $newtext = $this->softwareid;
        } else {
            $newtext = $text . " | " . $this->softwareid;
        }
        $pstmt = $con->prepare($sql);
        $pstmt->bindValue(1, $newtext);
        $pstmt->bindValue(2, $this->user);
        echo $newtext;
        echo $this->user;
        echo $sql;
        $pstmt->execute();

        if ($pstmt->rowCount() > 0) {
            header("Location:../pages/Software.php");
        } else {
            header("Location:../pages/404.php");
        }
    }

    public function getcart() {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT cart FROM user WHERE username=?";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $this->user);
        $pstmt->execute();
        $item = $pstmt->fetchAll(PDO::FETCH_OBJ);
        foreach ($item as $value) {
            $text = $value->cart;
        }
        return $text;
    }
    
    public function getcartitems($user) {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT cart FROM user WHERE username=?";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $user);
        $pstmt->execute();
        $item = $pstmt->fetchAll(PDO::FETCH_OBJ);
        foreach ($item as $value) {
            $text = $value->cart;
        }
        return $text;
    }
    
    public function getcartsw($val) {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT Sid,name,shortdescription,u.username,amount "
                    . "FROM software s JOIN developer d ON s.developer = d.Did JOIN user u ON d.user = u.Uid WHERE "
                    . "Sid = ?";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $val);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }
    
}
