<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ChatCls
 *
 * @author lakru
 */
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

}
