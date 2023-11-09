<?php

include_once "../Classes/DbConnector.php";

class ChatCls {

    public function createchat() {
        
    }

    public function changeStatustoA($user) {
        $con = new Classes\DbConnector();
        $dbcon = $con->getConnection();
        $query = "UPDATE chatusers SET status = 'Active now' WHERE username=?";
        $pstmt = $dbcon->prepare($query);
        $pstmt->bindValue(1, $user);
        $pstmt->execute();
    }

    public function changeStatustoOff($user) {
        $con = new Classes\DbConnector();
        $dbcon = $con->getConnection();
        $query = "UPDATE chatusers SET status = 'Offline' WHERE username=?";
        $pstmt = $dbcon->prepare($query);
        $pstmt->bindValue(1, $user);
        $pstmt->execute();
    }

    public function getChat($user) {
        $con = new Classes\DbConnector();
        $dbcon = $con->getConnection();
        $query = "SELECT * FROM chatusers WHERE username = ?;";
        $pstmt = $dbcon->prepare($query);
        $pstmt->bindValue(1, $user);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }

    public function myChat($user) {
        $con = new Classes\DbConnector();
        $dbcon = $con->getConnection();
        $query = "SELECT * FROM chatusers WHERE username = ? ORDER BY chatId DESC";
        $pstmt = $dbcon->prepare($query);
        $pstmt->bindValue(1, $user);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }
    
    public function myChatX($user,$patner) {
        $con = new Classes\DbConnector();
        $dbcon = $con->getConnection();
        $query = "SELECT * FROM chatusers WHERE username = ? AND Did = ? ORDER BY chatId DESC";
        $pstmt = $dbcon->prepare($query);
        $pstmt->bindValue(1, $user);
        $pstmt->bindValue(2, $patner);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }

    public function lastMsj($user, $patner) {
        $con = new Classes\DbConnector();
        $dbcon = $con->getConnection();
        $query = "SELECT * FROM messages WHERE (sender = ? AND receiver = ?) OR (receiver = ? AND sender = ?) ORDER BY Msjid DESC LIMIT 1";
        $pstmt = $dbcon->prepare($query);
        $pstmt->bindValue(1, $user);
        $pstmt->bindValue(2, $patner);
        $pstmt->bindValue(3, $user);
        $pstmt->bindValue(4, $patner);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }

}
