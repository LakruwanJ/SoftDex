<?php
require_once '../Classes/DbConnector.php';
require_once '../Classes/Comingsoonsw.php';

use Classes\DbConnector as DbConnector;
use Classes\Comingsoonsw;

$dbConnector = new DbConnector();
$connection = $dbConnector->getConnection();

$comingsoonsws = Comingsoonsw::displaycomingsoonsw($connection);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Coming Soon Softwares</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/comingsoon.css">
    </head>
    <body>
        <p class="text-center fs-1 fw-bold">Upcoming Softwares</p>
        <div class="row">
            <?php foreach ($comingsoonsws as $comingsoonsw) : 
                ?>
                <div class="col-md-3 mb-4">
                    <div class="card border border-black" style="width: 18rem; margin: 15px; padding: 5px;">
                        <img src="https://media.istockphoto.com/id/835644534/photo/new-release.jpg?s=612x612&w=0&k=20&c=IS3jkr0f-phJHkaV_7vcZ0bLYx_iWqYoihVYjtMayKk="
                             class="card-img-top border border-dark" alt="...">
                        <div class="card-body">
                            <p class="card-text" id="para1">Developer Name:<b> <?= $comingsoonsw->getDevname() ?></b></p>
                            <p class="card-text" id="para1">Name of the Software:<b> <?= $comingsoonsw->getSwname() ?></b></p>
                            <p class="card-text" id="para1">Details about software:<b> <?= $comingsoonsw->getDetails() ?></b></p>
                            <p class="card-text text-danger" id="para1">Date of launch:<b data-launch-date= "<?= date('c', strtotime($comingsoonsw->getDateofrelease())) ?>"> <?= $comingsoonsw->getDateofrelease() ?></b></p>





                            <p class="card-text fs-2 fw-bolder countdown"></p>
                            
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        



