<?php
require_once '../Classes/DbConnector.php';
require_once '../Classes/Comingsoonsw.php';

use Classes\DbConnector;
use Classes\Comingsoonsw;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $devname = $_POST["devname"];
        $swname = $_POST["swname"];
        $category = $_POST["category"];
        $details = $_POST["details"];
        $dateofrelease = $_POST["dateofrelease"];


        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (isset($_POST['submit'])) {
                if (empty($_POST['devname']) || empty($_POST['swname']) || empty($_POST['category'])  || empty($_POST['details']) || empty($_POST['dateofrelease'])) {
                    header("Location:comingsoon.php?error=3");
                } else {
                    $devname = $_POST["devname"];
                    $swname = $_POST["swname"];
                    $category = $_POST["category"];
                    $details = $_POST["details"];
                    $dateofrelease = $_POST["dateofrelease"];
                    $comingsoonswregister = new Comingsoonsw($devname, $swname,$category, $details, $dateofrelease);
                    $comingsoonswregister->comingsoonswregister();
                    header("Location:displaycomigsoon.php");
                }
            } else {
                header("Location:comingsoon.php?error=2");
            }
        } else {
            header("Location:comingsoon.php?error=1");
        }
        ?>
    </body>
</html>
