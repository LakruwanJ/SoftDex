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
            $temp = $cartObj->getcart();
            $cartObj->additemtocart($temp);
        }
    }
}

class cartCls {

    private $user;
    private $softwareid;

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
            return 1;
        } else {
            return 0;
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

}
