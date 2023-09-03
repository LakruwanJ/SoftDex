<?php

use Classes\AddSoftwareReg;
use Classes\DbConnector;

require_once '../Classes/AddSoftwareReg.php';


if (isset($_POST['softwareName'], $_POST['version'], $_POST['platform'], $_POST['license'], $_POST['category'], $_POST['language'], $_POST['tags'], $_POST['systemreq'], $_POST['shortDescription'], $_POST['longDescription'])) {
    if (empty($_POST['softwareName'] || $_POST['version'] || $_POST['platform'] || $_POST['license'] || $_POST['category'] || $_POST['language'] || $_POST['tags'] || $_POST['systemreq'] || $_POST['shortDescription'] || $_POST['longDescription'])) {
        header("Location:AddSoftware.php?error=1");
        exit;
    } else {
        $userame = "RoseD"; //$_POST["user"];
        $softwareName = $_POST["softwareName"];
        $version = $_POST["version"];
        $platform = $_POST["platform"];
        $license = $_POST["license"];
        if (isset($_POST['amount'])) {
            $amount = $_POST["amount"];
        } else {
            $amount = "0";
        }

        $category = $_POST["category"];
        $language = $_POST["language"];
        $tags = $_POST["tags"];
        $systemreq = $_POST["systemreq"];
        $shortDescription = $_POST["shortDescription"];
        $longDescription = $_POST["longDescription"];

        $addsoftwarereg = new AddSoftwareReg();

        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $query = "SELECT Sid FROM software ORDER BY Sid DESC LIMIT 1;";
        $pstmt = $con->prepare($query);
        $pstmt->execute();
        $uid = $pstmt->fetchAll(PDO::FETCH_OBJ);
        foreach ($uid as $value) {
            $lastid = $value->Sid;
        }
        if ($lastid == NULL) {
            $output = "sw0001";
        } else {
            $prefix = substr($lastid, 0, 2); //sw
            $number = (int) substr($lastid, 2);
            $newNumber = $number + 1;
            $output = $prefix . sprintf("%04d", $newNumber); // Combine 
        }
        $Sid = $output;


        try {
            $dbcon = new DbConnector();
            $con = $dbcon->getConnection();
            $query = "SELECT d.Did FROM developer d JOIN  user u ON u.Uid = d.user WHERE u.username = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $userame);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        foreach ($rs as $value) {
            $text = $value->Did;
        }
        $developer = $text;


        $date = date("Y-m-d");

        $addsoftwarereg->addsoftware($softwareName, $version, $platform, $license, $amount, $category, $language, $tags, $systemreq, $shortDescription, $longDescription, $developer, $date, $Sid);
        
        
    }
}
    
