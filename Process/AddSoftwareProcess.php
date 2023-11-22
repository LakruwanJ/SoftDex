<?php

use Classes\AddSoftwareReg;
use Classes\DbConnector;
require_once '../Classes/AddSoftwareReg.php';

    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['submit'])){
   
        if(empty($_POST['softwareName']) || empty($_POST['version'])|| empty($_POST['platform']) || empty($_POST['license']) || empty($_POST['category']) ||empty( $_POST['language']) || empty($_POST['tags']) || empty($_POST['systemreq'] )|| empty($_POST['shortDescription'] )||empty( $_POST['longDescription'])) {
        header("Location:../pages/AddSoftware.php?error=2"); 
        exit;
        
        }else{
         $userame = "RoseD";//$_POST["user"];
         $softwareName = $_POST["softwareName"];
        $version = $_POST["version"];
        $platform = $_POST["platform"];
        $license = $_POST["license"];
        if (isset($_POST['amount'])){
            $amount = $_POST["amount"];
        }else{
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
        $developer =  $text;
        
        
        $date = date("Y-m-d");
        
//        $addsoftwarereg = new AddSoftwareReg($softwareName, $version, $platform, $license, $amount, $category, $language, $tags, $systemreq, $shortDescription, $longDescription, $developer, $date, $Sid);
       $addsoftwarereg->addsoftware($softwareName,$version,$platform,$license,$amount,$category,$language,$tags,$systemreq,$shortDescription,$longDescription,$developer,$date,$Sid);
        
  
    $logoFile = $_FILES['softwareLogo'];
    $imageFiles = $_FILES['softwareImage']; 
    $softwareFile = $_FILES['software'];
   
    $userFolder = '../img/sw/' . $Sid;
    

    
    if (!file_exists($userFolder)) {
        mkdir($userFolder, 0777, true);
    }
    //upload ss and logo
        $logoExtension = pathinfo($logoFile['name'], PATHINFO_EXTENSION);
        $newLogo = 'logo.' . $logoExtension;
        $logoTargetPath = $userFolder . '/' . $newLogo;
        move_uploaded_file($logoFile['tmp_name'], $logoTargetPath);

      
       
        foreach ($imageFiles['tmp_name'] as $key => $tmpName) {
            $imageExtension = pathinfo($imageFiles['name'][$key], PATHINFO_EXTENSION);
            $newImage = 'ss' . ($key + 1) . '.' . $imageExtension;
            $imageTargetPath = $userFolder . '/' . $newImage;
            move_uploaded_file($tmpName, $imageTargetPath);
        }

      

        //upload software
        $softwareExtension = pathinfo($softwareFile['name'], PATHINFO_EXTENSION);
        $newSoftware = 'software.' . $softwareExtension;
        $softwareTargetPath = $userFolder . '/' . $newSoftware;
        move_uploaded_file($softwareFile['tmp_name'], $softwareTargetPath);


   

    
     header("Location:../pages/Software.php?id=".$Sid);
                }
    
        } else{
         header("Location:../pages/AddSoftware.php?error = 1");
    }
    
    } else{
    header("Location:../pages/AddSoftware.php?error = 0");
}
