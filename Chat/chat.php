<?php
session_start();
include_once './ChatCls.php';
$clsChat = new ChatCls();
$user = $_SESSION["user"];
if ((!isset($_GET['sender'])) && (!isset($_GET['reciver']))) {
    header("location: Chome.php?e=1");
} else {
    $sender = $_GET['sender'];
    $_SESSION["sender"] = $sender;
    $reciver = $_GET['reciver'];
    $_SESSION["reciver"] = $reciver;
}
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Chat| SoftDex</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    </head>
    <body>
        <div class="wrapper">
            <section class="chat-area">
                <header>
                    <?php
                    $chat = $clsChat->myChatX($sender, $reciver);
                    if (count($chat) > 0) {
                        foreach ($chat as $value) {
                            if ($value->Did == $reciver) {
                                $patner = $value->Did;
                            } else {
                                $patner = $value->username;
                            }
                            $status = $value->Status;
                        }
                    } else {
                        header("location: users.php");
                    }
                    ?>
                    <a href="Chome.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                    <?php
                    $imageFormats = ['png', 'jpg'];
                    $imagePath = '../img/user/' . $patner . '/' . $patner;

                    foreach ($imageFormats as $format) {
                        $imageUrl = $imagePath . '.' . $format;

                        if (file_exists($imageUrl)) {
                            $imageUrl = $imageUrl;
                        } else {
                            $imageUrl = "../img/user (2).png";
                        }
                    }
                    ?>

                    <img src="<?php echo $imageUrl ?>" alt="">
                    <div class="details">
                        <span><?php echo $patner ?></span>
                        <p><?php echo $status; ?></p>
                    </div>
                </header>
                <div class="chat-box">

                </div>
                <form action="#" class="typing-area">
                    <input type="text" class="sender" name="sender" value="<?php echo $user; ?>" hidden>
                    <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                    <button><i class="fab fa-telegram-plane"></i></button>
                </form>
            </section>
        </div>

        <script src="javascript/chat.js"></script>
    </body>
</html>