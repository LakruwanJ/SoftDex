<?php
session_start();
include_once './ChatCls.php';
$clsChat = new ChatCls();
$sender = $_SESSION["sender"];
$reciver = $_SESSION["reciver"];

$clsChat->sendMsj($sender, $reciver, $_POST["message"]);


