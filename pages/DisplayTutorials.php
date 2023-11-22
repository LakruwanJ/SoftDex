<?php
require_once '../Classes/UploadTutorials.php';
require_once '../Classes/DbConnector.php';

use classes\Tutorial;
use Classes\DbConnector;

$tute = Tutorial::displayTutorials();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/DisplayTutorials.css">


        <title>Display Tutorials</title>

    </head>
    <body>
        <header>
            <!-- Navigation menu -->
        </header>
        <div class="header">
            <h1>Enrich your competence through tutorial exploration!</h1>
        </div>

        <!-- Display Tutorials -->
        <main>
            <section class="tutorials">

                <?php
                
                                 
                foreach ($tute as $tutes) {
                    ?>
                
                
                    <div class="tutorial-card">
                        <?php
                        $imageFormats = ['png', 'jpg'];
                        $imagePath = '../img/Tutorials/' . $tutes->getTitle() . '/' . $tutes->getTitle();

                        foreach ($imageFormats as $format) {
                            $imageUrl = $imagePath . '.' . $format;

                            if (file_exists($imageUrl)) {
                                $imageUrl = $imageUrl;
                            } else {
                                $imageUrl = "../img/tutorial.jng";
                            }
                        }
                        ?>
                        
                        <img src="<?= $imageUrl?>" width="300">
                        <h3 class="tutorial-title"><?= $tutes->getTitle() ?></h3>
                        <p class="tutorial-description"><i><?= $tutes->getText() ?></i></p>

                        <div class="buttons">
                            <button class="download-button">
                                <a href="../img/Tutorials/<?= $tutes->getTitle() ?>/Tutorial.pdf" download>Download</a>
                            </button>
                        </div>

                    </div>
                    <?php
                }
                ?>


            </section>
        </main>


    </body>
</html>
