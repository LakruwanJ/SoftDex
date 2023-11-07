<?php
$message = null;
if (isset($_GET['error'])) {
    if ($_GET['error'] == 1) {
        $message = "<h6 class='text-danger'>Please submit form through post method</h6>";
    } else if ($_GET['error'] == 2) {
        $message = "<h6 class='text-danger'>Please submit the form through the submit button</h6>";
    } else if ($_GET['error'] == 3) {
        $message = "<h6 class='text-danger'>Please fill all feilds</h6>";
    }
}
?>


<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Coming Soon</title>
        <link rel="stylesheet" href="../css/comingsoon.css">


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>

    <body>



        <p class="text-center fs-1 text-primary">Coming Soon Softwares</p>


        <div class="div border-4">


            <form action="comingswregister.php" method="POST">
                <p class="text-center text-danger fs-5" id="para2" > <b> Submit your upcoming software details </b></p>

                <div class="mb-3">
                    <?= $message ?>
                    <label for="nameofdeveloper" class="form-label">Developer Name</label>
                    <input type="text" class="form-control" id="namedevelpoer" name="devname" value="">
                </div>
                <div class="mb-3">
                    <label for="nameofsoftware" class="form-label">Name of the Software</label>
                    <input type="text" class="form-control" id="nameofsoftware" name="swname" value="">
                </div>
                <div class="mb-3">
                    <label for="nameofsoftware" class="form-label">Category (Social media/Education/Multimedia)</label>
                    <input type="text" class="form-control" id="namedevelpoer" name="category" value="">

                </div>
                <div class="mb-3">
                    <label for="detailsoftware" class="form-label">Details about software</label>
                    <input type="text" class="form-control" id="detailsoftware"  name="details" value="">
                </div>
                <div class="mb-3">
                    <label for="launchdate" class="form-label">Date of launch</label>
                    <input type="datetime-local" class="form-control" id="launchdate" name="dateofrelease" value="">
                </div>
                <button  name="submit" class="btn btn-primary" >Submit</button>

            </form>
        </div>

    </body>
</html>