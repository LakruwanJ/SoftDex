<?php

use classes\Tutorial;
use Classes\DbConnector;

require_once '../Classes/UploadTutorials.php';
require_once '../Classes/DbConnector.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        if (empty($_POST['SoftwareName']) || empty($_POST['title']) || empty($_POST['shortDescription'])) {
            header("Location:../pages/UploadTutorials.php?error = 2");
            exit;
        } else {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $category = $_POST['category'];
            $text = $_POST['shortDescription'];

            $upload = new Tutorial($title, $text);
            $upload->upload();

            $TutorialFile = $_FILES['uploadtutorials'];
            $imgFle = $_FILES['backimg'];

            $TuteFolder = '../img/Tutorials/' . $title;



            if (!file_exists($TuteFolder)) {
                mkdir($TuteFolder, 0777, true);
            }

            /* Background image */
            $imgExtension = pathinfo($imgFle['name'], PATHINFO_EXTENSION);
            $newimg = $title .'.'. $imgExtension;
            $imgTargetPath = $TuteFolder . '/' . $newimg;
            move_uploaded_file($imgFle['tmp_name'], $imgTargetPath);


            //upload Tutorials
            $TutorialExtension = pathinfo($TutorialFile['name'], PATHINFO_EXTENSION);
            $newTute = 'Tutorial.' . $TutorialExtension;
            $TutorialTargetPath = $TuteFolder . '/' . $newTute;
            move_uploaded_file($TutorialFile['tmp_name'], $TutorialTargetPath);




            header("Location:../pages/DisplayTutorials.php?success = 0");
        }
    } else {
        header("Location:../pages/UploadTutorials.php?error = 1");
    }
} else {
    header("Location:../pages/UploadTutorials.php?error = 0");
}
   
      