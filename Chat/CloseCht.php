<?php
session_start();
include_once './ChatCls.php';
$clsChat = new ChatCls();

$clsChat->changeStatustoOff($_SESSION["user"]);

header("location: ../Softdex.php");
