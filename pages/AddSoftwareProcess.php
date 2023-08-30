<?php

use Classes\AddSoftwareReg;
require_once '../Classes/AddSoftwareReg.php';


    if(isset($_POST['softwareName'] , $_POST['version'] , $_POST['platform'] , $_POST['license'] , $_POST['category'] , $_POST['language'] , $_POST['tags'] , $_POST['systemreq'] , $_POST['shortDescription'] , $_POST['longDescription'])){
        if(empty($_POST['softwareName'] || $_POST['version']|| $_POST['platform'] || $_POST['license'] || $_POST['category'] || $_POST['language'] || $_POST['tags'] || $_POST['systemreq'] || $_POST['shortDescription'] || $_POST['longDescription'])) {
        header("Location:AddSoftware.php?error=1"); 
        exit;
        
        }else{
         $softwareName = $_POST["softwareName"];
        $version = $_POST["version"];
        $platform = $_POST["platform"];
        $license = $_POST["license"];
        $amount = $_POST["amount"];
        $category = $_POST["category"];
        $language = $_POST["language"];
        $tags = $_POST["tags"];
        $systemreq = $_POST["systemreq"];
        $shortDescription = $_POST["shortDescription"];
        $longDescription = $_POST["longDescription"];
        
        $addsoftwarereg = new AddSoftwareReg($softwareName, $version, $platform, $license,$amount, $category, $language, $tags, $systemreq, $shortDescription, $longDescription);
        $addsoftwarereg->addsoftware();
                }
    }
    
