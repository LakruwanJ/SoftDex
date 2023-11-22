<?php
require_once '../Classes/customizedsoftware.php';
require_once '../Classes/DbConnector.php';

use Classes\cusomizedsw;
use Classes\DbConnector;

$customizedsws = cusomizedsw::displayCusSWDetails()
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/DisplayCustomizedSWDetails.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
        <link rel="stylesheet" href="path/to/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/b0ede3d087.js" crossorigin="anonymous"></script>



        <title>Display Customized Sw Details</title>

    </head>
    <body>
        <header>
            <!-- Navigation menu -->
        </header>
        <div class="header">
           <h1>View Customized Software Requests!</h1>
        </div>

        <!-- Display Tutorials -->
        <main>
            <section class="tutorials">

                <?php
                
                                 
                foreach ($customizedsws as $customizedsw) {
                    ?>
                
                
                    <div class="tutorial-card">
                      
                        
                   
                        <h3 class="tutorial-title"><b>Title:</b> <?= $customizedsw->getTitle() ?></h3>
                        <p class="tutorial-description"><b>Description:</b> <i><?= $customizedsw->getDescription() ?></i></p>
                        <p class="tutorial-description"><b>Special Requirements:</b> <?= $customizedsw->getSpecialReq() ?></p>

                        <!--<div class="buttons">
                            <button class="download-button">
                                <a href="">Reject</a>
                            </button>  <br><br>  <button class="download-button">
                                <a href="">Approve</a>
                            </button>
                        </div>-->
                        
                        <div class="col-sm-2">
                            <p class="text-muted mb-0">
                                <a href="" class="btn-primary">Approve</a>
                                <br><br>
                                     <a href="" class="btn-danger">Reject</a>
                            </p>
                        </div>
                        </div>

                    </div>
                    <?php
                }
                ?>


            </section>
        </main>


    </body>
</html>
