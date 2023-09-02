<?php

require '../Classes/DbConnector.php';

use Classes\DbConnector;
use PDO;

$dbcon = new DbConnector();
$con = $dbcon->getConnection();


echo $_GET["a"];
?>
