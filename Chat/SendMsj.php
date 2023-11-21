<?php

session_start();
include_once './ChatCls.php';
$clsChat = new ChatCls();
if (isset($_SESSION['sender'])) {
    $sender = $_SESSION['sender'];
    $reciver = $_SESSION['reciver'];
    $message = $_POST['message'];
    if (!empty($message)) {
        $clsChat->sendMsj($sender, $reciver, $message);
    }
} else {
    header("location: ../login.php");
}
?>