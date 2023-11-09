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
                        foreach ($clsChat->getChat($_SESSION["user"]) as $cuser) {
                            $username = $cuser->username;
                            $dev = $cuser->Did;
                            $status = $cuser->Status;
                        }
                        ?>
                        <img src="php/images/<?php echo $row['img']; ?>" alt="">
                        <div class="details">
                            <span><?php echo $username; ?></span>
                            <p><?php echo $status; ?></p>
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
                            $msg = $clsChat->lastMsj($chat->username, $chat->Did);
                            foreach ($msg as $value) {
                                $text = $value->msj;
                                $sender = $value->sender;
                                $receiver = $value->receiver;
                            }
                            (!empty($text)) ? $result = $text : $result = "No message available";
                            (strlen($result) > 30) ? $result2 = substr($result, 0, 30) . '...' : $result2 = $result;

                            //last msj sender
                            if (isset($receiver)) {
                                ($chat->Did == $receiver) ? $you = "You: " : $you = "";
                            } else {
                                $you = "";
                            }

                            //status
                            $offline = "";

                            //chat tab
                            $output .= '<a href="chat.php?sender='.$chat->username.'&reciver='. $chat->Did. '"><div class="content">
                    <img src="php/images/a.png" alt=""><div class="details"><span>' . $chat->Did . '</span><p>' . $you . $result2 . '</p></div>
                    </div><div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div></a>';

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
