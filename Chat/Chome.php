<?php
session_start();
include_once './ChatCls.php';
$clsChat = new ChatCls();
include_once "../Classes/DbConnector.php";
$con = new Classes\DbConnector();
$dbcon = $con->getConnection();
if (!isset($_SESSION["user"])) {
    header("location: ../index.php");
} else {
    $clsChat->changeStatustoA($_SESSION["user"]);
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
            <section class="users">
                <header>
                    <div class="content">
                        <?php
                        if ($clsChat->CheckDev($_SESSION["user"])) {
                            foreach ($clsChat->getChatd($_SESSION["user"]) as $cuser) {
                                $sender = $cuser->Did;
                                $reciver = $cuser->username;
                                $status = $cuser->Status;
                            }
                        } else {
                            foreach ($clsChat->getChatu($_SESSION["user"]) as $cuser) {
                                $sender = $cuser->username;
                                $reciver = $cuser->Did;
                                $status = $cuser->Status;
                            }
                        }
                        $imageFormats = ['png', 'jpg'];
                        $imagePath = '../img/user/' . $sender . '/' . $sender;

                        foreach ($imageFormats as $format) {
                            $imageUrl = $imagePath . '.' . $format;

                            if (file_exists($imageUrl)) {
                                echo '<img src="' . $imageUrl . '"/>';
                                break;
                            }
                        }
                        ?>

                        <div class="details">
                            <?php if ($clsChat->CheckDev($_SESSION["user"])) { ?>
                                <span><?php echo $sender; ?></span>
                                <p><?php echo $status; ?></p>
                                <?php
                            } else {
                                ?>
                                <span><?php echo $reciver; ?></span>
                                <p><?php echo $status; ?></p>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                    <a href="CloseCht.php" class="logout">Leave Chat</a>
                </header>
                <div class="search">
                    <span class="text">Select an user to start chat</span>
                    <input type="text" placeholder="Enter name to search...">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="users-list">

                    <?php
                    $mychat = $clsChat->myChat($_SESSION["user"]);
                    if (count($mychat) > 0) {
                        //Available chats
                        $output = "";
                        foreach ($mychat as $chat) {

                            if ($clsChat->CheckDev($_SESSION["user"])) {
                                $msg = $clsChat->lastMsj($chat->username, $chat->Did);
                            } else {
                                $msg = $clsChat->lastMsj($chat->Did, $chat->udername);
                            }
                            $text = NUll;
                            foreach ($msg as $value) {
                                $text = $value->msj;
                                if ($clsChat->CheckDev($_SESSION["user"])) {
                                    $sender = $value->receiver;
                                    $receiver = $value->sender;
                                } else {

                                    $sender = $value->sender;
                                    $receiver = $value->receiver;
                                }
                            }
                            (!empty($text)) ? $result = $text : $result = "No message available";
                            (strlen($result) > 30) ? $result2 = substr($result, 0, 30) . '...' : $result2 = $result;

                            //last msj sender
                            if (isset($receiver)) {
                                if ($_SESSION["user"] == $chat->username) {
                                    ($chat->username == $receiver) ? $you = "You: " : $you = "";
                                } else {
                                    ($chat->Did == $receiver) ? $you = "You:" : $you = "";
                                }
                            } else {
                                $you = "";
                            }

                            //status
                            $offline = "";

                            //chat tab
                            if ($_SESSION["user"] == $chat->username) {
                                echo 'a';
                                $imageFormats = ['png', 'jpg'];
                                $imagePath = '../img/user/' . $chat->Did . '/' . $chat->Did;

                                foreach ($imageFormats as $format) {
                                    $imageUrl = $imagePath . '.' . $format;

                                    if (file_exists($imageUrl)) {
                                        $imageUrl = $imageUrl;
                                    } else {
                                        $imageUrl = "../img/user (2).png";
                                    }
                                }
                                $output .= '<a href="chat.php?sender=' . $chat->username . '&reciver=' . $chat->Did . '"><div class="content">
                            <img src="' . $imageUrl . '" alt=""><div class="details"><span>' . $chat->Did . '</span><p>' . $you . $result2 . '</p></div>
                        </div><div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div></a>';
                            } else {
                                echo 'b';
                                $imageFormats = ['png', 'jpg'];
                                $imagePath = '../img/user/' . $chat->username . '/' . $chat->username;

                                foreach ($imageFormats as $format) {
                                    $imageUrl = $imagePath . '.' . $format;

                                    if (file_exists($imageUrl)) {
                                        $imageUrl = $imageUrl;
                                    } else {
                                        $imageUrl = "../img/user (2).png";
                                    }
                                }
                                $output .= '<a href="chat.php?sender=' . $chat->Did . '&reciver=' . $chat->username . '"><div class="content">
                            <img src="' . $imageUrl . '" alt=""><div class="details"><span>' . $chat->username . '</span><p>' . $you . $result2 . '</p></div>
                        </div><div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div></a>';
                            }
                        }
                    } elseif (count($mychat) == 0) {
                        $output .= "No users are available to chat";
                    }
                    echo $output;
                    ?>

                </div>
            </section>
        </div>

        <script src="javascript/users.js"></script>

    </body>
</html>
