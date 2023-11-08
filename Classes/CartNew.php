<?php

namespace Classes;

use PDOException;
use PDO;

require_once 'DbConnector.php';

use Classes\DbConnector;


class CartNew {
    private $user;
    private $softwareid;
    private $dbcon;
    
    function __construct() {
        $con = new DbConnector();
        $this->dbcon = $con->getConnection();
        
    }
    function setUser($user) {
        $this->user = $user;
    }

    function setSoftwareid($softwareid) {
        $this->softwareid = $softwareid;
    }

    public function getCartItems(){
        $query = "SELECT cart FROM user WHERE username=?";
        $pstmt = $this->dbcon->prepare($query);
        $pstmt->bindValue(1, $this->user);
        $pstmt->execute();
        
        if ($pstmt->rowCount() > 0) {
            $item = $pstmt->fetch(PDO::FETCH_OBJ);
            return $item->cart;
        } else {
            header("Location:../pages/Software_New.php?id=".$this->softwareid."&status=GetdataDbError");
        }
    }
    
    public function addItemToCart($text){
        $set_item = "";
        if ($text == null) {
            $set_item = $this->softwareid;
        } else {
            $set_item = $text." | ".$this->softwareid;
        }
        $query = "UPDATE user SET Cart=? WHERE username=?";
        $pstmt = $this->dbcon->prepare($query);
        $pstmt->bindValue(1, $set_item);
        $pstmt->bindValue(2, $this->user);
        $pstmt->execute();
        if ($pstmt->rowCount() > 0) {
            //header("Location:../pages/Software_New.php?id=".$this->softwareid."&status=UpdateDbError");
            header("Location:../Softdex.php?status=UpdateCartSuccess");
        } else {
            header("Location:../pages/Software_New.php?id=".$this->softwareid."&status=UpdateDbError&user=".$this->user."&dta=".$set_item);
        }
    }
    
    public function getSoftwareDetail($sofwId) {
        $query = "SELECT Sid,name,shortdescription,u.username,amount FROM software s JOIN developer d ON s.developer = d.Did JOIN user u ON d.user = u.Uid WHERE Sid = ?";
        $pstmt = $this->dbcon->prepare($query);
        $pstmt->bindValue(1, $sofwId);
        $pstmt->execute();
        
        if ($pstmt->rowCount() > 0) {
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
            return $result;
        }
    }
    
    public function removeItem($list) {
        $last_item_of_list = end($list);
        if (sizeof($list) > 1) {
            foreach ($list as $item){
                if ($item == $this->softwareid && $item === $last_item_of_list) {
                    $text = rtrim($text, " | ");
                }elseif ($item == $this->softwareid) {
                    continue;
                } else {
                    if ($item === $last_item_of_list) {
                        $text = $text.$item;
                    } else {
                        $text = $text.$item." | ";
                    }
                }   
            }
            $cart_value = $text;
        } else {
            $cart_value = null;
        }
        $query = "UPDATE user SET Cart=? WHERE username=?";
        $pstmt = $this->dbcon->prepare($query);
        $pstmt->bindValue(1, $cart_value);
        $pstmt->bindValue(2, $this->user);
        $pstmt->execute();
        
        if ($pstmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
