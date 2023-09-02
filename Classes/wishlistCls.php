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

$wishObj = new wishlistCls();
$text = NULL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["addtowishlist"])) {

        if (!empty($_POST["user"]) && !empty($_POST["sw"])) {

            $wishObj->wishlistCls($_POST["user"], $_POST["sw"]);
            $temp = $wishObj->getwishlist();
            $wishObj->additemtowishlist($temp);
        }
    }
}

class wishlistCls {

    private $user;
    private $softwareid;

    public function wishlistCls($user, $softwareid) {
        $this->user = $user;
        $this->softwareid = $softwareid;
    }

    public function additemtowishlist($text) {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $sql = "UPDATE user SET wishlist=? WHERE username=?";
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

    public function getwishlist() {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT wishlist FROM user WHERE username=?";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $this->user);
        $pstmt->execute();
        $item = $pstmt->fetchAll(PDO::FETCH_OBJ);
        foreach ($item as $value) {
            $text = $value->wishlist;
        }
        return $text;
    }

}
