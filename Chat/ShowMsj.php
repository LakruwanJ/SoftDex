<?php

session_start();
include_once './ChatCls.php';
$clsChat = new ChatCls();
$user = $_SESSION["user"];
$sender = $_SESSION["sender"];
$reciver = $_SESSION["reciver"];

// print chat
$output = "";
$msgs = $clsChat->allMsj($sender, $reciver);
if (count($msgs) > 0) {
    foreach ($msgs as $msj) {
        if ($msj->sender === $sender) {
            $output .= '<div class="chat outgoing"><div class="details"><p>' . $msj->msj . '</p></div></div>';
        } else {
            $imageFormats = ['png', 'jpg'];
            $imagePath = '../img/user/' . $msj->sender . '/' . $msj->sender;

            foreach ($imageFormats as $format) {
                $imageUrl = $imagePath . '.' . $format;

                if (file_exists($imageUrl)) {
                    $imageUrl = $imageUrl;
                } else {
                    $imageUrl = "../img/user (2).png";
                }
            }

            $output .= '<div class="chat incoming"><img src="' . $imageUrl . '" alt=""><div class="details"><p>' . $msj->msj . '</p></div></div>';
        }
    }
} else {
    $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
}
echo $output;
