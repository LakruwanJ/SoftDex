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
                        $query = "SELECT * FROM chatusers WHERE username = ?;";
                        $pstmt = $dbcon->prepare($query);
                        $pstmt->bindValue(1, $_SESSION["user"]);
                        $pstmt->execute();           
                        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
                        foreach ($rs as $cuser) {
                            $username = $cuser->username;
                            $status = $cuser->Status;
                        }
                        ?>
                        <img src="php/images/<?php echo $row['img']; ?>" alt="">
                        <div class="details">
                            <span><?php echo $username;?></span>
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

                </div>
            </section>
        </div>

        <script src="javascript/users.js"></script>

    </body>
</html>
