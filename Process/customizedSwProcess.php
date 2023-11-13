<?php

use Classes\cusomizedsw;
use Classes\DbConnector;

require_once '../Classes/customizedsoftware.php';
require_once '../Classes/DbConnector.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
         if (empty($_POST['developer']) || empty($_POST['title']) || empty($_POST['description'])||empty($_POST['specialReq'])) {
            header("Location:../pages/CustomizedSwForm.php?error=2");
            exit;
        } else {
           
            $developer = $_POST['developer'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $specialReq = $_POST['specialReq'];
            

           $request = new cusomizedsw($title, $description, $specialReq);
           $request->request();
           

            header("Location:../pages/CustomizedSwForm.php?success = 0");
        }
    } else {
        header("Location:../pages/CustomizedSwForm.php?error = 1");
    }
} else {
    header("Location:../pages/CustomizedSwForm.php?error = 0");
}
   
      

